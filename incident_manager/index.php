<?php
require('../model/database_oo.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'select_incident';
    }
}


switch ($action) {
    case 'display_customer_get':
        include('customer_get.php');
        break;
    case 'get_customer':
        $email = filter_input(INPUT_POST, 'email');
        $customer = get_customer_by_email($email);
        $products = get_products_by_customer($email);
        include('incident_create.php');
        break;
    case 'select_incident':
       
        include('incident_select.php');
        break;
    case 'select_tech_for_incident':
        include('select_tech_for_incident.php');
        break;

}
?>