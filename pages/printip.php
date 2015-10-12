<?php 
    include ('process.php');
    date_default_timezone_set("Asia/Manila");
    $date=date("Y/m/d");
    $connect = connect();
$printoutdate=date("Y/m/d");
$printouttime=date("h:i:sa");
$category="All";
$location="All";
$productcode="101";
$productname="Electric Fan";
$customerorder="each";
$supplierorder="2";
$total="120.00";
$result=listitems($connect);

?>

<div>
	<a style="font-weight: bold; font-size: 30; font-family: Vrinda;">Inventory Planning Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px font-family: Vrinda;"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
</div>
<div>
<table style="width:100%; font-family: Vrinda;">
<tr>
	<th>Product Code</th>
	<th>Product Name</th>
	<th>Customer Order</th>
	<th>Supplier Order</th>
	
</tr><?php 	while($row=mysqli_fetch_assoc($result)){ ?>
<tr style="text-align: center; font-family: Vrinda;">
	<td><?=$row['item_code']?></th>
	<td><?=$row['name']?></th>
	<td><?php echo $customerorder?></th>
	<td><?php $getsupplierorder=mysqli_fetch_assoc(getsupplierorder($connect, $row['name'])); echo $getsupplierorder['quantity'];?></th>
	</tr>
	<?php } ?>
</table></div>




<script src="jquery-2.1.3.min.js"></script>
<script>
	$(function(){
		$(document).ready(function () {
    		window.print();
		});
	});
	window.history.back();
</script>