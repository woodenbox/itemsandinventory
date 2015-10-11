<?php
        include('process.php');
        $conn1 = connect();
        
        $showSalesOrderItems=showSalesOrderItems($conn1, $_GET['id']);
        $showCostumer=showCostumer($conn1, $_GET['id']);
        $costumerName=mysqli_fetch_assoc($showCostumer);
        
        
        include('header.php');
        ?>
        

        <div id="page-wrapper">
            	
        
        
    	<legend><label>List Sales Order Items</label></legend>
    	
    	
	    
    	<label>Costumer: <?=$costumerName['costumer']?></label>
    
    	
    	<div class="table-responsive">
         	<table class="table">
         	
         		<tr>
         			<td>Item </td>
         			<td>Quantity</td>
         			<td>Price</td>
         			<td>Discount</td>
         		</tr>
         	
         		<?php
        			while($row=mysqli_fetch_assoc($showSalesOrderItems)){
	    		?>
         		
         		<tr>
         			<td><?=$row['item_code']?></td>
         			<td><?=$row['quantity']?></td>
         			<td><?=$row['price']?></td>
         			<td><?=$row['discount']?></td>
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