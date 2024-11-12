<?php






require_once './stripe-php/init.php';
require_once './secrets.php';



function append_string ($str1, $str2) {
    
  // Using Concatenation assignment
  // operator (.=)
  $str1 .=$str2;
  
  // Returning the result 
  return $str1;
}





\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$price_list = ['price_1QIel4K1ucZlE5ZZppC6Iw1g','price_1QIelwK1ucZlE5ZZ70xnym4D'];
$charge_price = -1;
//$YOUR_DOMAIN = 'http://localhost:80';
$YOUR_DOMAIN = "http://" . $_SERVER['SERVER_ADDR'];
echo $YOUR_DOMAIN;
if(isset($_POST['variable']))
{
 $charge_price = $price_list[$_POST['variable']];
}
else{
  $charge_price = $price_list[0];
}


$success_string = 


$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    
    'price' => $charge_price,
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success_1hour.php',// . "?p=" . $charge_price ,
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
