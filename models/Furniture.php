<?php

require_once __DIR__ . '/Product.php';

class Furniture extends Product {
  public function __construct($args)
  {
    $this->sku = $args->sku;
    $this->name = $args->name;
    $this->price = $args->price;
    $this->type = 'Furniture';
    $this->hieght = $args->hieght;
    $this->width = $args->width;
    $this->length = $args->length;
  }
  
  public function store()
  {
    DB_Model::insert_product($this);
  }

  public function remove()
  {
    DB_Model::delete_product($this);
  }
  
  
}
