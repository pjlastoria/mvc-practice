<?php

class User extends Dbh
{

    protected function createUser($email, $pwd, $time_created)
    {
        $sql = "INSERT INTO users (`email`, `password_hash`, `time_created`) VALUES (?, ?, ?)";
        $db = $this->connect();
        $stmt = $db->prepare($sql);

        $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute([$email, $pwd_hash, $time_created])) {
            $stmt = null;
            header('Location: ../signup?error=stmtfailed');
            exit();
        }
        $stmt = null;

        return $db->lastInsertId();
    }

    protected function verifyUser($email, $pwd)
    {
        $sql = "SELECT password_hash FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$email])) {
            $stmt = null;
            header('Location: ../login?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header('Location: ../login?error=usernotfound');
            exit();
        }
        
        $pwdHash = $stmt->fetch()['password_hash'];
        $checkPwd = password_verify($pwd, $pwdHash);

        if($checkPwd == false) {
            $stmt = null;
            header('Location: ../login?error=wrongpassword');
            exit();
        }

        return $this->loginUser($email);
    }

    private function loginUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    protected function checkUser(string $email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute([$email])) {
            $stmt = null;
            header('Location: ../signup?error=checkuserstmtfailed');
            exit();
        }

        return ($stmt->rowCount() > 0) ? true : false ;
    }

    protected function deleteUser(int $id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

}