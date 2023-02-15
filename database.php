<?php

require __DIR__ . '/config.php';

Class DB_model {
  private static $servername = DBHOST;
  private static $username = DBUSER;
  private static $password = DBPWD;
  private static $database = DBNAME;

  public static function create_connection() {
    return new mysqli(
      DB_model::$servername, 
      DB_model::$username,
      DB_model::$password,
      DB_model::$database,
    );
  }

  // create product table if not exist
  public static function create_table_if_not_exist($table) {
    $conn = DB_model::create_connection();
    $result = $conn->query(
      "CREATE TABLE IF NOT EXISTS ".$table."(
      sku VARCHAR(255) PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      price DECIMAL(10,2) DEFAULT 0.00,
      type ENUM('DVD', 'Book', 'Furniture') NOT NULL,
      size FLOAT,
      weight FLOAT,
      hieght FLOAT,
      width FLOAT,
      length FLOAT
      );"
    );
    $conn->close();
  }

  // to insert new product in the database
  public static function insert_product($new_product) {
  $conn = DB_model::create_connection();
  $sku = $new_product->sku;
  $name = $new_product->name;
  $price = $new_product->price;
  $type = $new_product->type;
  $size = $new_product->size ?? "null";
  $weight = $new_product->weight ?? "null";
  $hieght = $new_product->hieght ?? "null";
  $width = $new_product->width ?? "null";
  $length = $new_product->length ?? "null";

  $conn->query("INSERT INTO product(
    sku,
    name,
    price,
    type,
    size,
    weight,
    hieght,
    width,
    length
    ) VALUES(
    '".$sku."',
    '".$name."',
    ".$price.",
    '".$type."',
    ".$size.",
    ".$weight.",
    ".$hieght.",
    ".$width.",
    ".$length."
  );");
  $conn->close();
  }

  // to delete a product from the database
  public static function delete_product($product) {  
    $conn = DB_model::create_connection();
    $conn->query("DELETE FROM product WHERE sku= '".$product->sku."';");
    $conn->close();
  }

  // get all products
  public static function index_products() {
    $conn = DB_model::create_connection();
    $results = array();
    $result = $conn->query("SELECT * FROM product;");
    while($row = $result->fetch_assoc())
      array_push($results, $row) ;
    $conn->close();
    return $results;
  }

  // get product by id
  public static function get_product_by_sku($sku) {
  $conn = DB_model::create_connection();
  $result = (object)$conn->query("SELECT * FROM product WHERE sku= '".$sku."';")->fetch_assoc();
  $conn->close();
  $product = new $result->type($result);
  return $product;
}

}

DB_Model::create_table_if_not_exist('product');