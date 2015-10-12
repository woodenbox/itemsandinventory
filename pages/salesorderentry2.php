      <?php

        include('process.php');
        
        $conn1 = connect();
        $result = viewItems($conn1);

        $getLastId=getSOEid($conn1);
        $getSOEid=mysqli_fetch_assoc($getLastId);
        
        
        
        
        $showSalesOrderItems=showSalesOrderItems($conn1, $getSOEid['id']);
        
        if(isset($_POST['add'])){
	     
	        $item_code=$_POST['item_code'];
	        $quantity=$_POST['quantity'];
	        $price=$_POST['price'];
	        $discount=$_POST['discount'];
	        $sales_order_id=$getSOEid['id'];
	        
	        $addSalesOrderItems=addSalesOrderItems($conn1, $item_code, $quantity, $price, $discount, $sales_order_id);
	        
	        $bawas=bawas($conn1, $item_code, $quantity);
	        
	        
	        
	        header('Location: salesorderentry2.php');
	    	
        }
        
        if(isset($_POST['cancel'])){
	        
	        $removeSalesOrderEntry=removeSalesOrderEntry($conn1, $getSOEid['id']);
	        
	        header('Location: salesorderentry.php');
	        
        }
	        
        include('header.php');
        
        
        ?>
        
         
        
        <div id="page-wrapper">
        
        
        <div class="table-responsive">
         	<table class="table">
         	
         		<tr>
         			<td>Item</td>
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
        
        
        
        
        
        
    	<form method="POST">    
        
    	<legend><label>Purchase Order Entry : Step 2</label></legend>
        
        
         
        <label>Item/Components</label>
  		<select class="form-control" name="item_code">
  		<?php
  		while($row=mysqli_fetch_assoc($result)){
  		?>
   		       <option value="<?=$row['name']?>">[<?=$row['item_code']?>] - <?=$row['name']?></option>
    	 <?php } 
    	       ?>
        </select> 
        
        <label>Quantity</label>
         <input type="text" class="form-control" name="quantity">
         
      
         <label>Price</label>
         <input type="text" class="form-control" name="price">
         
      	 <label>Discount</label>
         <input type="text" class="form-control" name="discount">
        
        <input type="submit" class="btn btn-success" value="Cancel" name="cancel">
        
        <input type="submit" class="btn btn-success" value="Add" name="add">
        
    </form>
    
    
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>