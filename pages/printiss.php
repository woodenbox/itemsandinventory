<?php 

include('process.php');
$conn1 = connect();
    date_default_timezone_set("Asia/Manila");
    $date=date("Y/m/d");
    $connect = connect();
$printoutdate=date("Y/m/d");
$printouttime=date("h:i:sa");
$period="09/19/2015";
$category="All";


$all=getItemNameQuantityPrice($conn1);




?>

<div>
	<a style="font-weight: bold; font-size: 30; font-family: Vrinda;">Item Sales Summary Report</a></br>
	<a>Print Out Date:</a><a style="margin-left: 30px; font-family: Vrinda;"> <?php echo $printoutdate?>&nbsp<?php echo $printouttime?></a></br>	
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

<?php
while($row=mysqli_fetch_assoc($all)){
	$getProductCode=getProductCode($conn1, $row['item_code']);
	while($rowf=mysqli_fetch_assoc($getProductCode)){
?>

<tr style="text-align: center; font-family: Vrinda;">
	<td><?=$rowf['item_code']?></th>
	<?php
	}
	?>

	<?php
		$sales=$row['quantity'] * $row['price'];
	?>
	<td><?=$row['item_code']?></th>
	<td><?=$row['quantity']?></th>
	<td><?=$row['price']?></th>
	<td><?php echo $sales;?></th>
	</tr>
	
<?php

}
?>
	
</table></div>


<div>
</br></br>
<!--<a style="margin-left: 574px; font-family: Vrinda;"><?php echo "total itu?";?></a>-->
</div>



<script src="jquery-2.1.3.min.js"></script>
<script>
	$(function(){
		$(document).ready(function () {
    		window.print();
		});
	});
	window.history.back();
</script>