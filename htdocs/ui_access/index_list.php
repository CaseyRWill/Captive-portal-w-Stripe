
<?php


require_once './UniFi-API-client/src/Client.php';

require_once './stripe-php/init.php';

/**
 * include the config file (place your credentials etc there if not already present)
 * see the config.template.php file for an example
 */
require_once 'config.php';

/**
 * we use the default site in the initial connection
 */
$site_id = 'default';

/**
 * initialize the UniFi API connection class and log in to the controller and pull the requested data
 */
$unifi_connection = new UniFi_API\Client(
    $controlleruser,
    $controllerpassword,
    $controllerurl,
    $site_id,
    $controllerversion
);

$set_debug_mode = $unifi_connection->set_debug($debug);
$loginresults   = $unifi_connection->login();
$clients_array  = $unifi_connection->list_clients();

/**
 * output the results in JSON format
 */
header('Content-Type: application/json; charset=utf-8');
echo json_encode($clients_array);


$user_ip =  $_SERVER['REMOTE_ADDR'];

echo $user_ip;

echo ' hi';


//phpinfo();
?>