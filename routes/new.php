<?php

require_once __DIR__ . '../../controllers/product_controller.php';

if (isset($_POST['sku'])  && !empty($_POST['sku']))

    Product_Controller::new_product((Object)$_POST);