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

function viewSuppliers($conn){
	$sql="SELECT * FROM supplier";
	$result=mysqli_query($conn);
	return $result;
}


function addCurrency($conn, $name, $short_name, $rate){
	$sql="INSERT INTO opt_currency VALUES('', '$name', '$short_name', '$rate')";
	$result=mysqli_query($conn, $sql);
	return $result;	
}

function viewCurrency($conn){
	$sql="SELECT * FROM opt_currency";
	$result=mysqli_query($conn);
	return $result;	
}




?>