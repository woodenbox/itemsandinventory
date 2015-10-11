<?php
function removeskitem($connect, $id){
	$sql="DELETE FROM sales_kit_items WHERE id = $id";
	return mysqli_query($connect, $sql);
}
function listski($connect, $id){
	$sql="SELECT * FROM sales_kit_items WHERE reference = $id";
	return mysqli_query($connect, $sql);
}
function addski($connect, $item, $id){
	$sql="INSERT INTO sales_kit_items VALUES ('','".implode("','", $item)."','".$id."')";
	return mysqli_query($connect, $sql);
}

function getskid($connect){
	$sql="SELECT id FROM sales_kits ORDER BY id DESC LIMIT 1";
	return mysqli_query($connect, $sql);
}
function checkski($connect, $name, $reference){
	$sql="SELECT 1 FROM sales_kit_items WHERE item = '$name' && reference = '$reference'";
	return mysqli_query($connect, $sql);
}

function checksk($connect, $name){
	$sql="SELECT 1 FROM sales_kits WHERE name = '$name'";
	return mysqli_query($connect, $sql);
}

function addsk($connect, $sk){
	$sql="INSERT INTO sales_kits VALUES ('','".implode("','", $sk)."')";
	return mysqli_query($connect, $sql);
}

function listsaleskits($connect){
	$sql="SELECT * FROM sales_kits";
	return mysqli_query($connect, $sql);
}

function checkfic($connect, $ean){
	$sql="SELECT 1 FROM foreign_item_codes WHERE ean = '$ean'";
	return mysqli_query($connect, $sql);
}

function addfic($connect, $fic){
	$sql="INSERT INTO foreign_item_codes VALUES ('', '".implode("','", $fic)."')";
	return mysqli_query($connect, $sql);
}

function listitems($connect){
	$sql="SELECT * FROM item";
	return mysqli_query($connect, $sql);
}

function listreorderlevels($connect){
	$sql="SELECT * FROM reorder_level";
	return mysqli_query($connect, $sql);
}

function addreorderlevel($connect, $test){
	$sql="INSERT INTO reorder_level VALUES ('','".implode("','", $test)."')";
	return mysqli_query($connect, $sql);
}

function checkorderlevel($connect, $item, $location){
	$sql="SELECT 1 FROM reorder_level WHERE item = '$item' && location='$location'";
	return mysqli_query($connect, $sql);
}

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

function deletecurrency($conn, $id){
	$sql="DELETE FROM opt_currency WHERE id=$id";
	$result=mysqli_query($conn,$sql);
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
		
function getSuppliers($conn){
	$sql="SELECT * FROM supplier";
	$result=mysqli_query($conn, $sql);
	return $result;
}
		
function addPurchaseOrderEntry($conn, $supplier, $order_date, $currency, $receive_into, $deliver_to, $order_status){
	$sql="INSERT INTO purchase_order_entry VALUES('', '$supplier', '$order_date', '$currency', '$receive_into', '$deliver_to', '$order_status')";
	$result=mysqli_query($conn, $sql);
	return $result;	
}

function processPurchaseOrder($conn, $id){
	$sql="SELECT * FROM purchase_order_entry WHERE id=$id";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function getPOSupplier($conn, $id){
	$sql="SELECT name FROM supplier WHERE id=$id";
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

function viewSupplier($conn, $id){
	$sql="SELECT supplier FROM purchase_order_entry WHERE id='$id'";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function removePurchaseOrder($conn, $id){
	$sql="DELETE FROM list_order_list WHERE id='$id'";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function showOrderItemsDuringInput($conn){
	$sql="SELECT id FROM purchase_order_entry ORDER BY id DESC LIMIT 1";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function showList($conn, $id){
	$sql="SELECT * FROM list_order_items WHERE p_o_reference='$id'";
	$result=mysqli_query($conn, $sql);
	return $result;	
}

function getItems($conn){
	$sql="SELECT * FROM item";
	$result=mysqli_query($conn, $sql);
	return $result;
}





//purchase pricing

function addPurchasePricing($conn, $item_code, $supplier_name, $price, $supplier_unit_measure, $conversion_factor, $supplier_code){
	$sql="INSERT INTO purchase_pricing VALUES('', '$item_code', '$supplier_name', '$price', '$supplier_unit_measure', '$conversion_factor', '$supplier_code')";
	$result=mysqli_query($conn, $sql);
	return $result;
}
function viewPurchasePricing($conn){
	$sql="SELECT * FROM purchase_pricing";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function saveEditPurchasePricing($conn, $item_code, $supplier, $price, $supplier_unit_measure, $conversion_factor, $supplier_code, $id){
		$sql="UPDATE standard_cost SET item_code='$item_code', supplier='$supplier', price='$price', supplier_unit_measure='$supplier_unit_measure', conversion_factor='$conversion_factor', supplier_code='$supplier_code' WHERE id=$id";
		$result=mysqli_query($conn, $sql);
		return $result;
}

function editPurchasePricing($conn, $id){
	$sql="SELECT * FROM purchase_pricing WHERE id = $id";
	return mysqli_query($conn, $sql);
}



//standard cost
function addStandardCost($conn, $item_code, $standard_cost_per_unit, $labor_cost_per_unit, $overhead_cost_per_unit){
	$sql="INSERT INTO standard_cost VALUES('', '$item_code', '$standard_cost_per_unit', '$labor_cost_per_unit', '$overhead_cost_per_unit')";
	$result=mysqli_query($conn, $sql);
	return $result;
}
function viewStandardCost($conn){
	$sql="SELECT * FROM standard_cost";
	$result=mysqli_query($conn, $sql);
	return $result;
}


function saveEditStandardCost($conn, $item_code, $standard_cost_per_unit, $labor_cost_per_unit, $overhead_cost_per_unit, $id){
		$sql="UPDATE standard_cost SET item_code='$item_code', standard_cost_per_unit='$standard_cost_per_unit', labor_cost_per_unit='$labor_cost_per_unit', overhead_cost_per_unit='$overhead_cost_per_unit' WHERE id=$id";
		$result=mysqli_query($conn, $sql);
		return $result;
}

function editStandardCost($conn, $id){
	$sql="SELECT * FROM standard_cost WHERE id = $id";
	return mysqli_query($conn, $sql);
}

//sale pricing
function addSalesPricing($conn, $item_code, $currency, $sale_type, $price){
	$sql="INSERT INTO sales_pricing VALUES('',  '$item_code', '$currency', '$sale_type', '$price')";
	$result=mysqli_query($conn, $sql);
	return $result;
}
function viewSalesPricing($conn){
	$sql="SELECT * FROM sales_pricing";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function saveEditSalesPricing($conn, $item_code, $currency, $sale_type, $price, $id){
		$sql="UPDATE sales_pricing SET item_code='$item_code', currency='$currency', sale_type='$sale_type', price='$price' WHERE id=$id";
		$result=mysqli_query($conn, $sql);
		return $result;
}

function editSalesPricing($conn, $id){
	$sql="SELECT * FROM sales_pricing WHERE id = $id";
	return mysqli_query($conn, $sql);
}








function viewOPT_STATUS($conn){
	$sql="SELECT * FROM opt_status";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function addCustomer($conn, $name, $shortname, $mailaddress, $billaddress, $memo, $status){
	$sql="INSERT INTO customers VALUES ('','$name','$shortname','$mailaddress','$billaddress','$memo','$status')";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function editCustomer($conn, $id){
	$sql="SELECT * FROM customers WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
	return $result;
}

function listCustomers($conn){
	$sql="SELECT * FROM customers";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function saveEditCustomer($conn, $name, $shortname, $mailaddress, $billaddress, $memo, $status, $id){
		$sql="UPDATE customers SET name='$name', shortname='$shortname', mailaddress='$mailaddress', billaddress='$billaddress', memo='$memo', status='$status' WHERE id=$id";
		$result=mysqli_query($conn, $sql);
		return $result;
}

function addItemCategory($conn, $name, $tax_type, $unit_measure){
    $sql="INSERT INTO opt_category VALUES('', '$name', '$tax_type', '$unit_measure')";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function viewItemCategory($conn){
    $sql="SELECT * FROM opt_category";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function viewSpecificItemCategory($conn, $id){
    $sql="SELECT * FROM opt_category where id='$id'";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function editItemCategory($conn, $id, $name, $tax_type, $unit_measure){
    $sql="UPDATE opt_category SET name='$name', item_tax_type='$tax_type', unit_of_measure='$unit_measure' WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function viewInventoryLocation($conn){
    $sql="SELECT * FROM opt_inventory_location";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function viewSpecificInventoryLocation($conn, $id){
    $sql="SELECT * FROM opt_inventory_location where id='$id'";
    $result=mysqli_query($conn, $sql);
    return $result;
}


function addInventoryLocation($conn, $code, $name, $contact, $address, $phone1, $phone2, $fax, $email){
	$sql="INSERT INTO opt_inventory_location VALUES('', '$code', '$name', '$contact', '$address', '$phone1', '$phone2', '$fax', '$email')";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function editInventoryLocation($conn, $id, $name, $contact, $address, $phone1, $phone2, $fax, $email){
    $sql="UPDATE opt_inventory_location set name='$name', contact='$contact', address='$address', phone='$phone1', phone2='$phone2', fax='$fax', email='$email' where id='$id'";
    $result=mysqli_query($conn, $sql);
    return $result;
    }

function viewUnitOfMeasure($conn){
    $sql="SELECT * FROM opt_unit_of_measure";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function viewSpecificUnitOfMeasure($conn, $id){
    $sql="SELECT * FROM opt_unit_of_measure where id='$id'";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function addUnitOfMeasure($conn, $name, $description, $dp){
    $sql="INSERT INTO opt_unit_of_measure VALUES('', '$name', '$description', '$dp')";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function editUnitOfMeasure($conn, $id, $name, $description, $dp){
    $sql="UPDATE opt_unit_of_measure set name='$name', description='$description', dp='$dp' where id='$id'";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function viewTaxType($conn){
    $sql="SELECT * FROM opt_tax_type";
    $result=mysqli_query($conn, $sql);
    return $result;
}

function viewSpecificTaxType($conn, $id){
   $sql="SELECT * FROM opt_tax_type where id='$id'";
   $result=mysqli_query($conn, $sql);
   return $result;
}

function viewStatusType($conn){
   $sql="SELECT * FROM opt_status";
   $result=mysqli_query($conn, $sql);
   return $result;
}













//////




?>