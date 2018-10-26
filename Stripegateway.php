<?php
	include("./vendor/autoload.php");
	
	class Stripegateway {
		public function __construct(){
			$stripe = array(
				"secret_key" => "sk_test_KAP4PugwKRnco0sJb0DCmFZL",
				"public_key" => "pk_test_D4YPEUVl1MfHZFGSXQVgy6iR"
			);
			\Stripe\Stripe::setApiKey($stripe["secret_key"]);
		}
		public function checkout($data){
			$message ="";
			try{
				$mycard = array( 'number' => $data['number'],
								'exp_month' => $data['exp_month'],
								'exp_year' => $data['exp_year']				
				);
				$charge = \Stripe\Charge::create(array('card'=>$mycard,
														'amount'=>$data['amount'],
														'currency'=>'usd'));
				$message = $charge->status;				
			}
			catch (Exception $e){
				$message = $e->getMessage();
			}
			return $message;
		}
		
		public function customer($data){
			$message ="";
			try{
				$charge = \Stripe\Charge::create(array(
														'email'=>$data['email'],
														'description'=>$data['description']));
				$message = $charge->status;				
			}
			catch (Exception $e){
				$message = $e->getMessage();
			}
			return $message;
		}
		//tambahi fungsi customer (dari code www.stripe.com/customer)
		//buat pay.php??
	}

?>