<?php
function getcurrentstocks($conn1, $name){
	$sql="SELECT * FROM item_status WHERE code = '$name'";
	return mysqli_query($conn1, $sql);
}
function recordsales($conn1, $name, $quantity, $date, $stock){
	$sql="INSERT INTO item_status2 (name, sales, dates, stock) VALUES ('$name', $quantity, '$date', $stock)";
	return mysqli_query($conn1, $sql);
}
function recorddemand($conn1, $name, $quantity, $date, $stock){
	$sql="INSERT INTO item_status2 (name, demand, dates, stock) VALUES ('$name', $quantity, '$date', $stock)";
	return mysqli_query($conn1, $sql);
}
function checkquantity($conn, $name){
	$sql="SELECT SUM(value) as quantity FROM item_status WHERE code = '$name'";
	return mysqli_query($conn, $sql);
}
function checkilt($connect, $code, $location){
	$sql="SELECT 1 FROM item_status WHERE code = '$code' && location = '$location'";
	return mysqli_query($connect, $sql);
}

function getaddressloc($connect, $address){
	$sql="SELECT * FROM opt_inventory_location WHERE name='$address'";
	return mysqli_query($connect, $sql);
}
function getunitprice($connect, $supplier, $item){
	$sql="SELECT * FROM purchase_pricing WHERE item_code='$item' && supplier = '$supplier'";
	return mysqli_query($connect, $sql);
}
function glofpo($connect, $id){
	$sql="SELECT * FROM list_order_items WHERE p_o_reference = $id";
	return mysqli_query($connect, $sql);
}

function getpoitem($connect, $id){
	$sql="SELECT * FROM purchase_order_entry WHERE id = $id";
	return mysqli_query($connect, $sql);
}
function getitemlist($connect, $id){
	$sql="SELECT * FROM item WHERE name='$id'";
	return mysqli_query($connect, $sql);
}
function listpurchases($connect){
	$sql="SELECT * FROM item_status";
	return mysqli_query($connect, $sql);
}
function getsupplierorder($connect, $name){
	$sql="SELECT SUM(quantity) as quantity FROM list_order_items WHERE item_id = '$name'";
	$result=mysqli_query($connect, $sql);
	return $result;
}
function getcost($connect, $name){
	$sql="SELECT * FROM standard_cost WHERE item_code = '$name'";
	return mysqli_query($connect, $sql);
}
function getquan($connect, $name){
	$sql="SELECT * FROM item_status WHERE code = '$name'";
	return mysqli_query($connect, $sql);
}

function viewItemsstatus($connect){
	$sql="SELECT *, sum(demand)as demands, sum(sales) as saless FROM item_status2 GROUP BY name, dates ORDER BY dates";
	return mysqli_query($connect, $sql);
}
function getreorderlevel($connect, $name){
	$sql="SELECT reorder_level FROM reorder_level WHERE item = '$name'";
	return mysqli_query($connect, $sql);
}
function listlocations($connect){
	$sql="SELECT * FROM opt_inventory_location";
	return mysqli_query($connect, $sql);
}

function checksc($connect, $name){
	$sql="SELECT 1 FROM standard_cost WHERE item_code = '$name'";
	return mysqli_query($connect, $sql);	
}
function checkpp($connect, $name, $supplier){
	$sql="SELECT 1 FROM purchase_pricing WHERE item_code = '$name' && supplier = '$supplier'";
	return mysqli_query($connect, $sql);
}
function checksp($connect, $name){
	$sql="SELECT 1 FROM sales_pricing WHERE item_code = '$name'";
	return mysqli_query($connect, $sql);
}

function addmovementype($connect, $name){
	$sql="INSERT INTO opt_movement_type VALUES ('','$name')";
	return mysqli_query($connect, $sql);
}

function getmovementtypes($connect){
	$sql="SELECT * FROM opt_movement_type";
	return mysqli_query($connect, $sql);
}
function edititem($conn1, $description,$category,$tax_type, $item_type, $unit_measure,$dimension,$item_status,$id){
	$sql ="UPDATE item SET description='$description', category='$category', tax_type='$tax_type', item_type='$item_type', unit_measure='$unit_measure', dimension='$dimension', item_status='$item_status' WHERE id =$id";
	return mysqli_query($conn1, $sql);
}
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

function addItems($conn, $name, $description, $category, $tax_type, $item_type, $unit_measure, $dimension, $item_status){
	$sql="INSERT INTO item VALUES('', '', '$name', '$description', '$category', '$tax_type', '$item_type', '$unit_measure', '$dimension', '', '$item_status')";
	mysqli_query($conn, $sql);
	$cut=substr($category, 0, 3);
	$last_id = mysqli_insert_id($conn);
	$item_code=$cut."-".$last_id;
	$sql="UPDATE item SET item_code = '$item_code' WHERE id = $last_id";
	return mysqli_query($conn, $sql);
}

function viewItems($conn){
	$sql="SELECT * FROM item WHERE item_status = 1";
	$result=mysqli_query($conn, $sql);
	return $result;	
}

function listallitems($connect){
	$sql="SELECT * FROM item";
	return mysqli_query($connect, $sql);
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

function getitem($connect, $id){
	$sql="SELECT * FROM item WHERE id = $id";
	return mysqli_query($connect, $sql);
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
	$sql="SELECT * FROM purchase_order_entry WHERE order_status = 1";
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
function getiitem($conn1){
	$sql="SELECT * FROM item_status";
	return mysqli_query($conn1, $sql);
}
function cancelOrderEntry($conn, $purchaseId){
	$sql="DELETE FROM purchase_order_entry WHERE id='$purchaseId'";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function getkwantiforinventory($conn1, $item, $from){
	$sql="SELECT * from item_status WHERE code='$item' && location='$from'";
	return mysqli_query($conn1, $sql);
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
	$sql="DELETE FROM list_order_items WHERE id='$id'";
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

function receiveItems($conn1, $item_id, $date, $demand, $sales, $stock){
	$sql="INSERT INTO item_status2 VALUES ('','$item_id', '$date', '$demand', '$sales', '$stock')";
	return mysqli_query($conn1, $sql);
}

function receivePO($conn1, $id){
	$sql="UPDATE purchase_order_entry SET order_status = 2 WHERE id = $id";
	return mysqli_query($conn1, $sql);
}

function cancelPO($connect, $id){
	$sql="UPDATE purchase_order_entry SET order_status = 0 WHERE id = $id";
	return mysqli_query($connect, $sql);
}

function getPriceFrom($conn, $item_code){														/////ITOOO
	$sql="SELECT price FROM sales_pricing WHERE item_code='$item_code'";
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
		$sql="UPDATE purchase_pricing SET item_code='$item_code', supplier='$supplier', price='$price', supplier_unit_measure='$supplier_unit_measure', conversion_factor='$conversion_factor', supplier_code='$supplier_code' WHERE id='$id'";
		$result=mysqli_query($conn, $sql);
		return $result;
}

function editPurchasePricing($conn, $id){
	$sql="SELECT * FROM purchase_pricing WHERE id = $id";
	$result=mysqli_query($conn, $sql);
	return $result;
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


function checklistifexist($connect, $name, $id){
	$sql="SELECT 1 FROM sales_order_items WHERE sales_order_id = '$id' && item_code='$name'";
	return mysqli_query($connect, $sql);
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

function viewItemType($conn){
   $sql="SELECT * FROM opt_item_type";
   $result=mysqli_query($conn, $sql);
   return $result;
}

function viewTransferType($conn){
   $sql="SELECT * FROM opt_transfer_type";
   $result=mysqli_query($conn, $sql);
   return $result;
}

function viewInventoryLocationTransfer($conn){
   $sql="SELECT * FROM inventory_location_transfers";
   $result=mysqli_query($conn, $sql);
   return $result;
}

function updateInventoryLocation($conn, $code, $location){
	$sql="UPDATE item_status set location='$location' where code='$code'";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function addInventoryLocationTransfer($conn, $item, $from, $to, $date, $transfer_type){
   $sql="INSERT INTO inventory_location_transfers VALUES ('', '$item', '$from', '$to', '$date', '$transfer_type')";
   $result=mysqli_query($conn, $sql);
   return $result;
}

function checkInventory($conn, $item){
   $sql="SELECT * FROM inventory_location_transfers where item='$item'";
   $result=mysqli_query($conn, $sql);
   return $result;
}

function checkInventoryDate($conn, $date){
   $sql="SELECT datediff('$date', curdate()) as 'Difference'";
   $result=mysqli_query($conn, $sql);
   return $result;
}

//Sales Order Entry


function addSalesOrderEntry($conn, $costumer, $date, $shipping_charge, $status){
	$sql="INSERT INTO sales_order_entry VALUES('', '$costumer', '$date', '$shipping_charge', '$status')";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function viewSalesOrderEntry($conn){
	$sql="SELECT * FROM sales_order_entry";
	$result=mysqli_query($conn, $sql);
	return $result;	
}

function addSalesOrderItems($conn, $item_code, $quantity, $price, $discount, $sales_order_id){
	$sql="INSERT INTO sales_order_items VALUES('','$item_code', '$quantity', '$price', '$discount', '$sales_order_id')";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function getSOEid($conn){
	$sql="SELECT id FROM sales_order_entry ORDER BY id DESC LIMIT 1";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function showCostumer($conn, $id){
	$sql="SELECT * FROM sales_order_entry WHERE id='$id'";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function showSalesOrderItems($conn, $id){
	$sql="SELECT * FROM sales_order_items WHERE sales_order_id='$id'";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function removeSalesOrderEntry($conn, $id){
	$sql="DELETE FROM sales_order_entry WHERE id='$id'";
	$result=mysqli_query($conn, $sql);
	return $result;	
}

function getCustomers($conn){
	$sql="SELECT * FROM customers";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function bawas($conn, $item_code, $quantity){
	$sql="UPDATE item_status SET value = value - '$quantity' WHERE code LIKE '$item_code'";
	$result=mysqli_query($conn, $sql);
	return $result;
}



// printi sr


function allCostumers($conn){
	$sql="SELECT * FROM sales_order_entry";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function costumerId($conn, $costumer){
	$sql="SELECT id FROM sales_order_entry WHERE costumer='$costumer'";
	$result=mysqli_query($conn, $sql);
	return $result;
}



function selectProductQuantityPrice($conn, $id){
	$sql="SELECT * FROM sales_order_items WHERE sales_order_id='$id'";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function allItem($conn, $item_code){
	$sql="SELECT * FROM item WHERE name='$item_code'";
	$result = mysqli_query($conn, $sql);
	return $result;
}

function getsaleslist($connect, $id){
	$sql="SELECT * FROM sales_order_items WHERE sales_order_id = $id";
	return mysqli_query($connect, $sql);
}

function getitemdata($connect, $name){
	$sql="SELECT * FROM item WHERE name = '$name'";
	return mysqli_query($connect, $sql);
}
	
function getPrice($connect, $item_code){
	$sql="SELECT price FROM sales_pricing WHERE item_code='item_code'";
}


function getitemprice($connect, $name){
	$sql="SELECT * FROM sales_pricing WHERE item_code = '$name'";
	return mysqli_query($connect, $sql);
}

function getitemcost($connect, $name){
	$sql="SELECT * FROM standard_cost WHERE item_code = '$name'";
	return mysqli_query($connect, $sql);
}

//Item Sales Summary Report


function getProductCode($conn, $itemName){
	$sql="SELECT item_code FROM item WHERE name='$itemName'";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function getItemNameQuantityPrice($conn){
	$sql="SELECT item_code, quantity, price FROM sales_order_items";
	$result=mysqli_query($conn, $sql);
	return $result;
}

function getSumDemand($conn, $name){
	$sql="SELECT sum(quantity) as 'Demand' FROM sales_order_items where item_code='$name'";
	return mysqli_query($conn, $sql);
	}


function getSumOrder($conn, $name){
	$sql="SELECT sum(quantity) as 'Demand' FROM list_order_items where item_id='$name'";
	return mysqli_query($conn, $sql);
	}
	
function checkItems($conn, $name){
    $sql="SELECT * from item where name='$name'";
    return mysqli_query($conn, $sql);
}

function checkForeignItem($conn, $name){
	$sql="SELECT * from foreign_item_codes where item='$name'";
    return mysqli_query($conn, $sql);
}

function viewItemStatus($conn){
    $sql="SELECT * from item_status";
    return mysqli_query($conn, $sql);
}

function viewItemFinal($conn){
	$sql="SELECT * from item_status_final";
	return mysqli_query($conn, $sql);
}

//



//search for Item

function searchItem($conn, $search){
	$sql="SELECT * FROM item WHERE name LIKE '%$search%' OR description LIKE '%$search%' OR category LIKE '%$search%' OR dimension LIKE '$search' OR item_code LIKE '$search'";
	return mysqli_query($conn, $sql);
}

function viewPageItem($conn,$page,$rows){
	$start=($page-1)*$rows;
	$sql="SELECT * FROM item LIMIT $start,$rows";
	$result=mysqli_query($conn,$sql);
	return $result;
}


//search for supplier

function searchSupplier($conn, $search){
	$sql="SELECT * FROM supplier WHERE name LIKE '%$search%' OR short_name LIKE '%$search%' OR website LIKE '%$search%' OR email LIKE '%$search%' OR address LIKE '%$search%' OR status LIKE '%$search%'";
	return mysqli_query($conn, $sql);
}

function viewPageSuppliers($conn,$page,$rows){
	$start=($page-1)*$rows;
	$sql="SELECT * FROM supplier LIMIT $start,$rows";
	$result=mysqli_query($conn,$sql);
	return $result;
}

//search for Costumers


function searchCostumer($conn, $search){
	$sql="SELECT * FROM customers WHERE name LIKE '%$search%' OR shortname LIKE '%$search%' OR mailaddress LIKE '%$search%' OR billaddress LIKE '%$search%'";
	return mysqli_query($conn, $sql);
}

//for inventory location

function searchLocation($conn, $search){
	$sql="SELECT * FROM opt_inventory_location WHERE name LIKE '%$search%' OR contact LIKE '%$search%'";	
	return mysqli_query($conn, $sql);
}

//for sales pricing

function searchSales($conn, $search){
	$sql="SELECT * FROM sales_pricing WHERE item_code LIKE '%$search%' OR sale_type LIKE '%$search%'";
	return mysqli_query($conn, $sql);
}

//for purchase pricing

function searchPricing($conn, $search){
	$sql="SELECT * FROM purchase_pricing WHERE item_code LIKE '%$search%' OR supplier LIKE '%$search%' OR price='$search' OR supplier_code LIKE '%$search%'";
	return mysqli_query($conn, $sql);
}

//for standard cost

function searchCost($conn, $search){
	$sql="SELECT * FROM standard_cost WHERE item_code LIKE '%$search%'";
	return mysqli_query($conn, $sql);
}

function checkItemOrder($conn, $name){
    $sql="SELECT * FROM item_status_final where name='$name'";
    return mysqli_query($conn, $sql);
}

function checkItemShuhada($conn, $name){
    $sql = "SELECT * FROM item_status_final where name='$name'";
    return mysqli_query($conn, $sql);
}

function viewItemShuhada($conn){
    $sql = "SELECT * FROM item_status_final";
    return mysqli_query($conn, $sql);
}

function Ou($conn, $name){
	$sql = "SELECT * FROM item_status_final where name='$name'";
	return mysqli_query($conn, $sql);
}

function viewShuhadaItem($conn){
    $sql = "SELECT * FROM item_status_final";
    return mysqli_query($conn, $sql);
}

function editShuhada($conn, $level){
    $sql = "UPDATE item_status_final SET stock='$level'";
    return mysqli_query($conn, $sql);
}

function checkShuhada($conn, $name){
     $sql = "SELECT stock FROM item_status_final where name='$name'";
     return mysqli_query($conn, $sql);
}

function Shuhada($conn){
     $sql = "SELECT stock FROM item_status_final";
     return mysqli_query($conn, $sql);
}



//










//////




?>