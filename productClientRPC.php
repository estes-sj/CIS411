<?php
require "productServerRPC.php";

if(isset($_GET['method'])){
	switch($_GET['method']){
		case "Delete"://callhttp://localhost/CIS411/BargainBites/productClientRPC.php?method=Delete
			$products = new productServerRPC();
			$data = $products->getProd();
			break;
		default:
			http_response_code(400);
			$data = array("error"=>"bad request");
			break;
		}
	} else{
		http_response_code(400);
		$data = array("error"=>"bad request");
	}
	if($data==null){
		$data = array("error"=>"product not found");
	}
	//send the data back to the user
header("Content-Type: application/json");
echo json_encode($data);
?>