<?php
        include('process.php');
        $conn1 = connect();
        
        $viewOrderList=vieworderList($conn1, $_GET["id"]);
        
        $viewSupplier = viewSupplier($conn1, $_GET["id"]);
        $supplier = mysqli_fetch_assoc($viewSupplier);
        include('header.php');
        ?>
        

        <div id="page-wrapper">
            	
        
       
        
    	<legend><label>List Order Items <?=$supplier['supplier']?></label></legend>
    	
    	<label>Supplier: <?=$supplier['supplier']?></label>
    
    	
    	<div class="table-responsive">
         	<table class="table">
         	
         		<tr>
         			<td>Item Id</td>
         			<td>Quantity</td>
         			<td>Delivery Date</td>
         			<td>Price</td>
         			<td>Memo</td>
         		</tr>
         	
         		<?php
         			while($row=mysqli_fetch_assoc($viewOrderList)){
         		?>
         		
         		<tr>
         			<td><?=$row['item_id']?></td>
         			<td><?=$row['quantity']?></td>
         			<td><?=$row['delivery_date']?></td>
         			<td><?=$row['pbt']?></td>
         			<td><?=$row['memo']?></td>
         		</tr>
					
         		<?php
     			}
         		
         		?>         		
         	
         	</table>
         </div>
    	
         
         
         
    	
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>