<?php
        include('process.php');
        $conn1 = connect();
        
        if(isset($_POST['add'])){
	        
	        $name=$_POST['name'];
	        $taxtype=$_POST['taxtype'];
	        $unit=$_POST['unit'];
	        
	       if((int)$unit){
	    	addItemCategory($conn1, $name, $taxtype, $unit);
	    	echo "<script>alert('New Category Added');</script>"; 
	            
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
         <input type="text" class="form-control" name="name">
        </div> 
        
        <label>Item Tax Type</label>
        <select class="form-control" name="taxtype">
   		       <option value="VAT 5%">VAT 5%</option>
    	       <option value="VAT 14%">VAT 14%</option>
    	       <option value="VAT 20%">VAT 20%</option>
    	       <option value="No Tax/Duty Free">No Tax/Duty Free</option>
        </select> 
        
        <div class="form-group">
         <label>Unit of Measure(Grams)</label>
         <input type="text" class="form-control" name="unit">
        </div> 
        

    	
        <input type="submit" name="add" value="Add New Category">
    	
        </form>
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
<?php
 include('footer.php');
?>