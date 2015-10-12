<?php 

include('process.php');
$conn1 = connect();



$printoutdate="09/19/2015";
$printouttime="12:00 pm";
$period="09/19/2015";
$category="All";


$all=getItemNameQuantityPrice($conn1);


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
	<td><?=$row['item_code']?></th>
	<td><?=$row['quantity']?></th>
	<td><?=$row['price']?></th>
	<td>Di ko pa alam</th>
	</tr>
	
<?php

}
?>
	
</table></div>


<div>
</br></br>
<a>Total:</a>
<a style="margin-left: 574px; font-family: Vrinda;"><?php echo "total itu?";?></a>
</div>



<script src="jquery-2.1.3.min.js"></script>
<script>
	$(function(){
		$(document).ready(function () {
    		window.print();
		});
	});
</script>