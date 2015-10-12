<?php 
$printoutdate="09/19/2015";
$printouttime="12:00 pm";
$period="09/19/2015";
$category="All";
$productcode="101";
$productname="Electric Fan";
$quantity="each";
$unitprice="2";
$sales="120.00";
$total="120.00";
?>

<div>
	<a style="font-weight: bold; font-size: 30; font-family: Vrinda;">Item Sales Summary Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px; font-family: Vrinda;"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>
	<a>Period:</a><a style="margin-left: 66px; font-family: Vrinda;"> <?php echo $period?></a></br>
	<a>Category:</a><a style="margin-left: 66px; font-family: Vrinda;"> <?php echo $category?></a></br>
	
</div>
<div>
<table style="width:100%; font-family: Vrinda;">
<tr>
	<th>Product Code</th>
	<th>Product Name</th>
	<th>Quantity</th>
	<th>Unit Price</th>
	<th>Sales</th>
	
</tr>
<tr style="text-align: center; font-family: Vrinda;">
	<td><?php echo $productcode?></th>
	<td><?php echo $productname?></th>
	<td><?php echo $quantity?></th>
	<td><?php echo $unitprice?></th>
	<td><?php echo $sales?></th>
	</tr>
</table></div>


<div>
</br></br>
<a>Total:</a>
<a style="margin-left: 574px; font-family: Vrinda;"><?php echo $total?></a>
</div>



<script src="jquery-2.1.3.min.js"></script>
<script>
	$(function(){
		$(document).ready(function () {
    		window.print();
		});
	});
</script>