<?php

require_once __DIR__ . '../../controllers/product_controller.php';

$data = (file_get_contents('php://input'));
$trim_data = trim($data,"[]\"\'");
$explode_data =  explode("\",\"",$trim_data);

Product_Controller::delete_products($explode_data);

