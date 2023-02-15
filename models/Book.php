<?php

require_once __DIR__ . '/Product.php';

class Book extends Product {
  public function __construct($args)
  {
    $this->sku = $args->sku;
    $this->name = $args->name;
    $this->price = $args->price;
    $this->type = 'Book';
    $this->weight = $args->weight;
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
