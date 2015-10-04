<?php

function connect(){
	include('db_config.php');
	$conn = mysqli_connect($host, $username, $password, $dbname);
	return $conn;
}

function addSuppliers($conn, $name, $shortname, $website, $currency, $bank, $credit_limit, $email, $address, $memo, $status, $phone, $fax){
		$sql="INSERT INTO supplier VALUES('', '$name', '$shortname', '$website', '$currency', '$bank', '$credit_limit', '$email', '$address', '$memo', '$status', '$phone', '$fax')";
		$result=mysqli_query($conn, $sql);
		return $result;
}

function saveEditSuppliers($conn, $name, $shortname, $website, $currency, $bank, $credit_limit, $email, $address, $memo, $status, $phone, $fax, $id){
		$sql="UPDATE supplier SET name='$name', short_name='$shortname', website='$website', currency='$currency', bank='$bank', credit_limit='$credit_limit', email='$email', address='$address', memo='$memo', status='$status', phone='$phone', fax='$fax' WHERE id=$id";
		$result=mysqli_query($conn, $sql);
		return $result;
}

function viewSuppliers($conn){
	$sql="SELECT * FROM supplier";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function editSuppliers($conn, $id){
	$sql="SELECT * FROM supplier WHERE id = $id";
	return mysqli_query($conn, $sql);
}

function addCurrency($conn, $name, $short_name, $rate){
	$sql="INSERT INTO opt_currency VALUES('', '$name', '$short_name', '$rate')";
	$result=mysqli_query($conn, $sql);
	return $result;	
}

function viewCurrencies($conn){
	$sql="SELECT * FROM opt_currency";
	$result=mysqli_query($conn, $sql);
	return $result;	
}

function addItems($conn, $item_code, $name, $description, $category, $tax_type, $item_type, $unit_measure, $dimension, $item_status){
	$sql="INSERT INTO item VALUES('', '$item_code', '$name', '$description', '$category', '$tax_type', '$item_type', '$unit_measure', '$dimension', '', '$item_status')";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function viewItems($conn){
	$sql="SELECT * FROM item";
	$result=mysqli_query($conn, $sql);
	return $result;	
}




function addItemsPOE($conn, $item_id, $id){
	$sql="INSERT INTO list_order_items VALUES ('',  '$item_id',  '',  '',  '',  '',  '$id')";
	$result=mysqli_query($conn, $sql);
	return $result;
	
	}
	
	function getID($conn){
	$sql="SELECT id FROM purchase_order_entry WHERE ID=(SELECT MAX(ID) FROM purchase_order_entry)";
	$result=mysqli_query($conn,$sql);
	return $result;	
		}
	

		
		
//Purchase Order Entry		
		
function addPurchaseOrderEntry($conn, $supplier, $order_date, $currency, $receive_into, $deliver_to, $order_status){
	$sql="INSERT INTO purchase_order_entry VALUES('', '$supplier', '$order_date', '$currency', '$receive_into', '$deliver_to', '$order_status')";
	$result=mysqli_query($conn, $sql);
	return $result;	
}


		
function viewPurchaseOrderEntry($conn){
	$sql="SELECT * FROM purchase_order_entry";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function getPurchaseId($conn){
	$sql="SELECT id FROM purchase_order_entry ORDER BY id DESC LIMIT 1";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function addListOrderItems($conn, $item_id, $quantity, $delivery_date, $pbt, $memo, $p_o_reference){
	$sql="INSERT INTO list_order_items VALUES('', '$item_id', '$quantity', '$delivery_date', '$pbt', '$memo', '$p_o_reference')";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function cancelOrderEntry($conn, $purchaseId){
	$sql="DELETE FROM purchase_order_entry WHERE id='$purchaseId'";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function viewOrderList($conn, $id){
	$sql="SELECT * FROM list_order_items WHERE p_o_reference='$id'";
	$result=mysqli_query($conn, $sql);
	return $result;
}








//////




?>