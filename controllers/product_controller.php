<?php

require_once __DIR__ . '../../models/DVD.php';
require_once __DIR__ . '../../models/Book.php';
require_once __DIR__ . '../../models/Furniture.php';

class Product_Controller {
    
    public static function get_all_products() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header('Content-Type: application/json');
        $products = Product::get_all_products();
        echo (json_encode((Object)$products));
    }
  
    public static function new_product($product) {
        $new_product = new $product->type($product);
        $new_product->store();
    }
  
    public static function delete_products($SKUs) {
        foreach($SKUs as $key => $sku) {
        $product = Product::show($sku);
        if(isset($product))
            $product->remove();
        }
    }
    
}