      <?php

        include('process.php');
        
        $conn1 = connect();
        $result = viewItems($conn1);
        
        $getPurchaseId=getPurchaseId($conn1);
        $row=mysqli_fetch_assoc($getPurchaseId);
        
        
        $showOrderItemsDuringInput=showOrderItemsDuringInput($conn1);
        $lastId=mysqli_fetch_assoc($showOrderItemsDuringInput);	
        
        $id=$lastId['id'];
        
        $showList=showList($conn1, $id);
        
        
        
        $purchaseId=$row["id"];
        
        if(isset($_POST['add'])){
	         
	    	$item_id=$_POST["item_id"];
	    	$quantity=$_POST["quantity"];
	    	$delivery_date=$_POST["delivery_date"];
	    	$pbt=$_POST["pbt"];
	    	$memo=$_POST["memo"];
	    	$p_o_reference=$row["id"];
	    	
	    	$addListOrderItems=addListOrderItems($conn1, $item_id, $quantity, $delivery_date, $pbt, $memo, $p_o_reference);
	    	
	    	//header('Location: purchase.php');
	        
        }
        
        if(isset($_POST['cancel'])){
	     
	        $cancelOrderEntry=cancelOrderEntry($conn1, $purchaseId); 
	        
	        header('Location: purchase.php');
	        
        }
        include('header.php');
        
        
        ?>
        
        <div id="page-wrapper">
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
         			while($row=mysqli_fetch_assoc($showList)){
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
        
        
        
        
        
        
    <form method="POST">    
        
    	<legend><label>Purchase Order Entry : Step 2</label></legend>
        
        
         
        <label>Item/Components</label>
  		<select class="form-control" name="item_id">
  		<?php
  		while($row=mysqli_fetch_assoc($result)){
  		?>
   		       <option value="<?=$row['name']?>">[<?=$row['item_code']?>] - <?=$row['name']?></option>
    	 <?php } 
    	       ?>
        </select> 
        
        <label>Quantity</label>
         <input type="text" class="form-control" name="quantity">
         
         <label>Order Date</label>
         <input type="date" class="form-control" name="delivery_date">
         
         <label>Price</label>
         <input type="text" class="form-control" name="pbt">
         
      	 <label>Memo</label>
         <input type="text" class="form-control" name="memo">
        
        <input type="submit" class="btn btn-success" value="Cancel" name="cancel">
        <input type="submit" class="btn btn-success" value="Add" name="add">
        
    </form>
    
    
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>