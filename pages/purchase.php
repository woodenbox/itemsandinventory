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
	    	$order_status=1;
	    	
	       
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
        
        <label>Delivery Date</label>
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
        <select name="receive_into" class="form-control" >
<?php $listlocations=listlocations($conn1); while($row=mysqli_fetch_assoc($listlocations)){ ?>   
        <option value="<?=$row['name']?>"><?=$row['name']?></option>
<?php } ?>
    </select>
        
         <input type="hidden" class="form-control" name="deliver_to">
        <br>
        
        
        
   
        
        <input class="btn btn-success" type="submit" name="add" value="Proceed to Step 2">
        
        
        
    </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>