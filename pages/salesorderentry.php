<?php
        include('process.php');
        $conn1 = connect();
        
        
        
        if(isset($_POST['add'])){
	        
	       $costumer = $_POST['costumer'];
	       $date = $_POST['date'];
	       $shipping_charge = $_POST['shipping_charge'];
	       $status = 1;
	   		
	   		$addSalesOrderEntry=addSalesOrderEntry($conn1, $costumer, $date, $shipping_charge, $status);	
	    	
	        header('Location: salesorderentry2.php');


	        
        }
        include('header.php');
        
        ?>
        
        <div id="page-wrapper">

        
    	<legend><label>Sales Order Entry</label></legend>
     
    	<form method="POST"> 
    	
    
        <label>Costumer</label>
        <?php $getCustomers=getCustomers($conn1);?>
        <select class="form-control" name="costumer">
        <?php
            while($row=mysqli_fetch_assoc($getCustomers)){
        ?>
            <option value="<?=$row['name']?>"><?=$row['name']?></option>
        <?php 
            }
        ?>
   		 </select> 
   		 
   		 
        <label>Date</label>
         <input type="date" class="form-control" name="date" required>
        
        <label>Shipping Charge</label>
        <input type="text" class="form-control" name="shipping_charge" required>
        
        <!--
        <label>Status</label>
        <input type="text" class="form-control" name="status" required>
        -->
        
   
        
        <input type="submit" name="add" value="Proceed to Step 2">
        
        
        
    </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>