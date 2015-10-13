<?php 
    date_default_timezone_set("Asia/Manila");
    $date=date("Y/m/d");
$printoutdate=date("Y/m/d");
$printouttime=date("h:i:sa");
$enddate="09/19/2015";





	include('process.php');

	$conn1 = connect();



?>

<div>
	<a style="font-weight: bold; font-size: 30; font-family: Vrinda;">Inventory Sales Report</a><br>
	<a>Print Out Date:</a><a style="margin-left: 30px; font-family: Vrinda;"> <?=$printoutdate?> </a><br>
	<a>Time:</a> <a style="margin-left: 30pxl; font-family: Vrinda;"> <?=$printouttime?></a><br>
</div>

<div>
<table style="width:100%; font-family: Vrinda;">
<tr>
	<th>Product</th>
	<th>Quantity</th>
	<th>Price</th>
	<td></td>
	<th>Cost<th>
	<th>Costumer</th>
	<th>Contribution</th>
</tr>

<!--
<?php /*
<tr style="text-align: center; font-family: Vrinda;">

	<?php
	while($getsalesorderentry=mysqli_fetch_assoc(getsalesorderentry($conn1))){ ?>
				
	<td><?php $getsaleslist=mysqli_fetch_assoc(getsaleslist($conn1, $getsalesorderentry['id'])); $getitemdata=mysqli_fetch_assoc(getitemdata($conn1, $getsaleslist['item_code'])); echo $getitemdata['category'];?></td>
	
	<?php } ?>

</tr>

<?php */ ?>

-->

<tr style="text-align: center; font-family: Vrinda;">

	<?php
	$allCostumers=allCostumers($conn1);
	while($rowcostumers=mysqli_fetch_assoc($allCostumers)){	//id ng costumer
		$selectProductQuantityPrice=selectProductQuantityPrice($conn1, $rowcostumers['id']); 
			while($rowselectPQP=mysqli_fetch_assoc($selectProductQuantityPrice)){		//item code, quantity, price

				?>

				<td><?=$rowselectPQP['item_code']?></td>
				<td><?php echo $rowselectPQP['quantity']; $quantityty= $rowselectPQP['quantity'];?></td>
				<td><?=$rowselectPQP['price']?></td>
				
		<td><?php $getitemprice=mysqli_fetch_assoc(getitemprice($conn1, $rowselectPQP['item_code'])); echo $getitemprice['price']; $priceprice = $getitemprice['price'];?></td>
		<td><?php $getitemcost=mysqli_fetch_assoc(getitemcost($conn1, $rowselectPQP['item_code'])); echo $getitemcost['standard_cost_per_unit']; $cost = $getitemcost['standard_cost_per_unit'];?></td>
		
			
				<?php /*
				$allItem=allItem($conn1, $rowselectPQP['sales_order_id']);

					while($rowallitem=mysqli_fetch_assoc($allItem)){

						?>
						
						<td><?=$rowallitem['description']?></td>

						<?php

					}
					*/
					?>	
					
					<?php
			}
			?>

			?>
			
		<td><?=$rowcostumers['costumer']?></td>
		<?php

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