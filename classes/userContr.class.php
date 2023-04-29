<?php

class UserContr extends User
{

    private $email;
    private $pwd;
    private $pwdVerify;
    private $time_created;

    public function __construct(
        string $email,
        string $pwd,
        $pwdVerify,
        string $time_created
    ) {
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdVerify = $pwdVerify;
        $this->time_created = $time_created;
    }

    public function signUp()
    {
        if($this->emptyInput() == false) {
            header('Location: ../signup?error=emptyinput');
            exit();
        }
        if($this->invalidEmail() == false) {
            header('Location: ../signup?error=invalidemail');
            exit();
        }
        if($this->userExists() == false) {
            header('Location: ../signup?error=userexists');
            exit();
        }
        if($this->invalidPwd() == false) {
            header('Location: ../signup?error=invalidpassword');
            exit();
        }
        if($this->pwdMatch() == false) {
            header('Location: ../signup?error=passwordmatch');
            exit();
        }

        return $this->createUser($this->email, $this->pwd, $this->time_created);
    }

    public function login() {
        if($this->emptyLoginInput() == false) {
            header('Location: ../login?error=emptyinput');
            exit();
        }

        return $this->verifyUser($this->email, $this->pwd);
    }

    /* ERROR HANDLERS */

    private function emptyLoginInput() {
        $result = true;
        if(empty($this->email) || empty($this->pwd)) {
            $result = false;
        }

        return $result;
    }

    private function emptyInput() {
        $result = true;
        if(empty($this->email) || empty($this->pwd) || empty($this->pwdVerify)) {
            $result = false;
        }

        return $result;
    }

    private function invalidEmail() {
        $result = true;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }

        return $result;
    }
    
    private function userExists() {
        $result = true;
        if($this->checkUser($this->email)) {
            $result = false;
        }
        return $result;
    }

    private function invalidPwd() {
        $result = true; //at least 8 chars, at least one letter, number, and special char
        if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&-]{8,}$/", $this->pwd)) {
            $result = false;
        }
        return $result;
    }

    private function pwdMatch() {
        $result = true;
        if($this->pwd !== $this->pwdVerify) {
            $result = false;
        }
        return $result;
    }

}