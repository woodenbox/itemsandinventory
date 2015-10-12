   
        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	$result = viewItemCategory($conn1);
        	$result2 = viewSuppliers($conn1);
        	$result3 = viewInventoryLocation($conn1);
        	$result4 = viewItems($conn1);
        	
        
        ?>
       <div id="page-wrapper">
       
        
         <div class="table-responsive">
       <legend><label>Inventory Valuation Report</label></legend>    	
         
        <form>
        
           <label>Start Date: </label><br>
        <input type="date" name="start_date"><br>
        
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
  		  while($row=mysqli_fetch_assoc($result3)){
	  		  ?>
   		       <option value="<?=$row['name']?>"><?=$row['id']?> - <?=$row['name']?></option>
<?php    
} ?>
         </select> 
        
             <label>Supplier:</label>
        <select class="form-control" name="suppliers">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result2)){
	  		  ?>
   		       <option value="<?=$row['name']?>"><?=$row['id']?> - <?=$row['name']?></option>
<?php    
} ?>
        </select> 
        
         <label>Items:</label>
        <select class="form-control" name="items">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result4)){
	  		  ?>
   		      <option value="<?=$row['name']?>"><?=$row['id']?> - <?=$row['name']?></option>
<?php    
} ?>
        </select> 

        <br><br>

<input type="button" value="Print:Inventory Purchasing Report" onclick="parent.location='printipr.php'">
        </select> 

        
        
        
        
        
        
        </form>


 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>