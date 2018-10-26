<?php
include ('Stripegateway.php');
$myStripe = new customer();
if(isset($_POST['btnsubmit'])){
	$data = array(
		'exp_month' => $_POST['expirymonth'],
		'exp_year' => $_POST['expiryyear'],
		'email' => $_POST['email']);
	$result = $myStripe->customer($data);
	echo "<pre>"; print_r($result);
}