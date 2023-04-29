<?php

if (isset($_POST['search']) && is_numeric($_POST['search'])) {

    $query = ($_POST['search-select'] !== 'all') ? $_POST['search-select'] : $_POST['search-text'];

    include_once 'autoloader.inc.php';

    try {

        $product_obj = new Product();
        $matches = $product_obj->searchProducts($query);

        echo json_encode($matches);

    } catch (Error $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}
