<?php
        include('process.php');
        $conn1 = connect();
        
        $result = viewCurrencies($conn1);
        $result2 = viewPurchaseOrderEntry($conn1);
      
        
        if(isset($_POST['add'])){
	        
	       
	   		
	   		$supplier=$_POST["supplier"];
	    	$order_date=$_POST["order_date"];
	    	$currency=$_POST["currency"];
	    	$receive_into=$_POST["receive_into"];
	    	$deliver_to=$_POST["deliver_to"];
	    	$order_status=$_POST["order_status"];
	    	
	       
	    	$addPurchaseOrderEntry=addPurchaseOrderEntry($conn1, $supplier, $order_date, $currency, $receive_into, $deliver_to, $order_status);
	    	
	    	
	    	
	        header('Location: purchase2.php');


	        
        }
        include('header.php');
        
        ?>
        
        <div id="page-wrapper">

        
    	<legend><label>Purchase Order Entry</label></legend>
     
    	<form method="POST"> 
    	
        <label>Suppplier</label>
        
        <?php $getSuppliers=getSuppliers($conn1);?>
        
  		<select class="form-control" name="supplier">
        <?php
            while($row=mysqli_fetch_assoc($getSuppliers)){
        ?>
            <option value="<?=$row['name']?>"><?=$row['name']?></option>
        <?php 
            }
        ?>
   		 </select> 
        
        <label>Order Date</label>
         <input type="date" class="form-control" name="order_date" required>
        
        <label>Currency</label>
  		<select class="form-control" name="currency">
  		
  		  <?php
  		  while($row=mysqli_fetch_assoc($result)){
	  		  ?>
   		       <option value="<?=$row['short_name']?>"> <?=$row['id']?> - <?=$row['name']?></option>
    	   <?php  
	       } ?>
	       
        </select> 
        
        
        <label>Receive into</label>
  		<select class="form-control" name="receive_into">
   		       <option value="1">a</option>
    	       <option value="2">b</option>
    	       <option value="3">c</option>
    	       <option value="4">d</option>
        </select> 
        
        <label>Deliver To</label>
         <input type="text" class="form-control" name="deliver_to">
         
        <label>Order Status</label>
  		<select class="form-control" name="order_status">
   		       <option value="1">a</option>
    	       <option value="2">b</option>
        </select>
        <hr>
        
        
        
   
        
        <input type="submit" name="add" value="Proceed to Step 2">
        
        
        
    </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>