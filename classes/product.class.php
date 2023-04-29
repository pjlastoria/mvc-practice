<?php

class Product extends Dbh
{

    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function searchProducts(string $query)
    {
        $query = '%' . $query . '%';
        $sql = "SELECT * FROM products
                WHERE concat(`name`,`category`,`brand`,`description`) 
                LIKE ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$query]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getProduct(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function getWishlistProducts(int $user_id)
    {
        $sql = "SELECT * FROM products
                LEFT JOIN wish_items
                ON products.id = wish_items.product_id
                WHERE wish_items.user_id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function updateProduct(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function deleteProduct(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }
}
