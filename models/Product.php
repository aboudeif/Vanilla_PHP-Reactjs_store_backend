<?php

require_once __DIR__ . '../../database.php';

abstract class Product {
  protected $sku;
  protected $name;
  protected $price;
  protected $type;
  protected $size;
  protected $weight;
  protected $hieght;
  protected $width;
  protected $length;

  abstract public function store();
  abstract public function remove();
  
  public static function show($sku) {
    return DB_Model::get_product_by_sku($sku);
  }
  
  public static function get_all_products() {
      return DB_Model::index_products();
  }
  
  public function __get($property) {
    if (property_exists($this, $property))
      return $this->$property;
  }
  
  public function __set($property, $value) {
    if (property_exists($this, $property))
      $this->$property = $value;
  }
  

}