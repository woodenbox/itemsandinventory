<?php 
    date_default_timezone_set("Asia/Manila");
    $date=date("Y/m/d");
$printoutdate=date("Y/m/d");
$printouttime=date("h:i:sa");
$enddate="09/19/2015";





	include('process.php');

	$conn1 = connect();

	$costumerName=allCostumers($conn1);
	


?>

<div>
	<a style="font-weight: bold; font-size: 30; font-family: Vrinda;">Inventory Sales Report</a><br>
	<a>Print Out Date:</a><a style="margin-left: 30px; font-family: Vrinda;"> <?=$printoutdate?> </a><br>
	<a>Time:</a> <a style="margin-left: 30pxl; font-family: Vrinda;"> <?=$printouttime?></a><br>
</div>

<div>
<table style="width:100%; font-family: Vrinda;">
<tr>
	<th>Costumer</th>
	<th>Product</th>
	<th>Quantity</th>
	<th>Price<th>
	<th>Cost</th>
	<th>Contribution</th>
</tr>



<tr style="text-align: center; font-family: Vrinda;">

	<?php 
	$allCostumers=allCostumers($conn1);
	while($rowcostumers=mysqli_fetch_assoc($allCostumers)){	
		?> 
		<td><?=$rowcostumers['costumer']?></td>
		
		<?php } ?>
		
		<?php 
		while($costumer=mysqli_fetch_assoc($costumerName)){
		$costumerId=costumerId($conn1, $costumer['costumer']);
		while($id=mysqli_fetch_assoc($costumerId)){
		$selectProductQuantityPrice=selectProductQuantityPrice($conn1, $id['id']); //item_code quantity, price
			while($rowselectPQP=mysqli_fetch_assoc($selectProductQuantityPrice)){		

				?>

				<td><?=$rowselectPQP['item_code']?></td>
				<td><?php echo $rowselectPQP['quantity']; $quantityty= $rowselectPQP['quantity'];?></td>
				
		<td><?php $getitemprice=mysqli_fetch_assoc(getitemprice($conn1, $rowselectPQP['item_code'])); echo $getitemprice['price']; $priceprice = $getitemprice['price'];?></td>
		<td><?php $getitemcost=mysqli_fetch_assoc(getitemcost($conn1, $rowselectPQP['item_code'])); echo $getitemcost['standard_cost_per_unit']; $cost = $getitemcost['standard_cost_per_unit'];?></td>
		
		<?php
	}
		}
	}
			?>	
					
			

	<td><?php echo ($quantityty * $priceprice) - ($quantityty * $cost);?></td> 
	

</tr>


</table>
</div>

<div>
</br></br>

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