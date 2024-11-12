
<?php


require_once './UniFi-API-client/src/Client.php';

require_once './stripe-php/init.php';

/**
 * include the config file (place your credentials etc there if not already present)
 * see the config.template.php file for an example
 */
require_once 'config.php';


function lan_ip_to_mac($clients_array, $lan_ip) {
  
    echo $clients_array[0];


    return null;
  }


/**
 * we use the default site in the initial connection
 */
$site_id = 'default';

/**
 * the MAC address of the device to authorize
 */
$mac = '66:54:5d:e1:ec:43';

/**
 * the MAC address of the Access Point the guest is currently connected to, enter null (without quotes)
 * if not known or unavailable
 *
 * NOTE:
 * although the AP MAC address is not a required parameter for the authorize_guest() function,
 * adding this parameter will speed up the initial authorization process
 */
$ap_mac = null;

/**
 * the duration to authorize the device for in minutes
 */
$duration = 5;

$lan_ip = $_SERVER['REMOTE_ADDR'];

/**
 * initialize the UniFi API connection class and log in to the controller
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
 * then we authorize the device for the requested duration
 */



lan_ip_to_mac($clients_array, $lan_ip)


//$auth_result = $unifi_connection->authorize_guest($mac, $duration, null, null, null, $ap_mac);

/**
 * provide feedback in json format
 */
//echo json_encode($auth_result, JSON_PRETTY_PRINT);
?>