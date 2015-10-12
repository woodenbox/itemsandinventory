<?php
        include('process.php');
        $conn1 = connect();
        
        $showSalesOrderItems=showSalesOrderItems($conn1, $_GET['id']);
        
        
        $showCostumer=showCostumer($conn1, $_GET['id']);
        $costumer=mysqli_fetch_assoc($showCostumer);
        
        if(isset($_POST['deliver'])){
	     	
	        while($show=mysqli_fetch_assoc($showSalesOrderItems)){
		        $item_code=$show['item_code'];
		        $quantity=$show['quantity'];
		        
		        $bawas=bawas($conn1, $item_code, $quantity);
	        }
	        
        }
        
        if(isset($_POST['cancel'])){
	        
	        $cancel=removeSalesOrderEntry($conn1, $_GET['id']);
	        
	        header('Location: listsalesorderentry.php');
        }
        
        if(isset($_POST['back'])){
	        header('Location: listsalesorderentry.php');
        }
        
        
        include('header.php');
        ?>
        

        <div id="page-wrapper">
            	
        
        
    	<legend><label>List Sales Order Items</label></legend>
    	
    	<form method="POST">
	    
    	<label>Costumer: <?=$costumer['costumer']?></label><br>
    	<label>Date: <?=$costumer['date']?></label><br>
    	<label>Shipping Charge: <?=$costumer['shipping_charge']?></label><br>
    	<label>Status: <?=$costumer['status']?></label><br>
    
    	
    	<div class="table-responsive">
         	<table class="table">
         	
         		<tr>
         			<td>Item </td>
         			<td>Quantity</td>
         			<td>Price</td>
         			<td>Discount</td>
         			<td>Remove</td>
         		</tr>
         	
         		<?php
        			while($row=mysqli_fetch_assoc($showSalesOrderItems)){
	    		?>
         		
         		<tr>
         			<td><?=$row['item_code']?></td>
         			<td><?=$row['quantity']?></td>
         			<td><?=$row['price']?></td>
         			<td><?=$row['discount']?></td>
         			<td><a href="viewsalesorderitems.php?remove=<?=$row["id"]?>">Delete</a></td>
         		</tr>
					
         		<?php
     			}
         		
         		?>         		
         	
         	</table>
         </div>
    	
         	<input type="submit" class="btn btn-success" value="Deliver" name="deliver">
            <input type="submit" class="btn btn-success" value="Cancel Sales Order" name="cancel">
            <input type="submit" class="btn btn-success" value="Back" name="back">
            
            </form>
         
         
    	
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>