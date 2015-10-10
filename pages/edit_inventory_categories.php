<?php
        include('process.php');
        $conn1 = connect();
        $result = viewSpecificItemCategory($conn1, $_GET['id']);
        $row=mysqli_fetch_assoc($result);
	    	
        if(isset($_POST['edit'])){
	      $name=$_POST['name'];
	      $taxtype=$_POST['taxtype'];
	      $unit=$_POST['unit'];
	      
	      if((int)$unit){
	    	editItemCategory($conn1, $_GET['id'], $name, $taxtype, $unit);
	    	echo "<script>alert('Category Has Been Edited');</script>"; 
	            
	    	header('Location: inventory_categories.php');
    	   }
    	   else{
	    	echo "<script>alert('Please Enter an Integer Value in Unit of Measure');</script>";     
    	   }
        }
        
        include('header.php');
        ?>

        <div id="page-wrapper">
            	
        
       
        
    	<legend><label>Inventory Categories</label></legend>
    	<form method="POST"> 
    	
        <div class="form-group">
         <label>Category Name</label>
         <input type="text" class="form-control" name="name" value="<?=$row['name']?>">
        </div> 
        
        <label>Item Tax Type</label>
        <select class="form-control" name="taxtype">
   		       <option value="VAT 5%"  <?php if($row['item_tax_type']=="VAT 5%") echo 'selected="selected"';?>>VAT 5%</option>
    	       <option value="VAT 14%" <?php if($row['item_tax_type']=="VAT 14%") echo 'selected="selected"';?>>VAT 14%</option>
    	       <option value="VAT 20%" <?php if($row['item_tax_type']=="VAT 20%") echo 'selected="selected"';?>>VAT 20%</option>
    	       <option value="No Tax/Duty Free" <?php if($row['item_tax_type']=="No Tax/Duty Free") echo 'selected="selected"';?>>No Tax/Duty Free</option>
        </select> 
        
        <div class="form-group">
         <label>Unit of Measure(Grams)</label>
         <input type="text" class="form-control" name="unit" value="<?=$row['unit_of_measure']?>">
        </div> 
        

    	
        <input type="submit" name="edit" value="Edit This Category">
    	
        </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
 include('footer.php');
?>