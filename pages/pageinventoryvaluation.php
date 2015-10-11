   
        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	$result = viewItemCategory($conn1);
        	$result2 = viewInventoryLocation($conn1);
        	
        
        ?>
       <div id="page-wrapper">
       
        
         <div class="table-responsive">
       <legend><label>Inventory Valuation Report</label></legend>    	
         
        <form method="POST">
        
        <label>End Date: </label><br>
        <input type="date" name="end_date"><br>
        
        
        <label>Inventory Category:</label>
        <select class="form-control" name="inventory_category">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result)){
	  		  ?>
   		       <option value="<?=$row['name']?>"><?=$row['id']?> - <?=$row['name']?></option>
<?php    
} ?>
        </select> 
        
        
         
         <label>Location</label>
        <select class="form-control" name="location">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result2)){
	  		  ?>
   		        <option value="<?=$row['name']?>"><?=$row['id']?> - <?=$row['name']?></option>
<?php    
} ?><br><br>

	<input type="button" value="Display:Inventory Valuation Report" onclick="parent.location='printivr.php'">
        </select> 

        
        
        
        
        
        
        </form>


 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>