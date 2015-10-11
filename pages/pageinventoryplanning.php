   
        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	$result = viewItemCategory($conn1);
        	$result2 = viewInventoryLocation($conn1);
        
        ?>
       <div id="page-wrapper">
       
        
         <div class="table-responsive">
       <legend><label>Inventory Planning Report</label></legend>    	
         
        <form>
        
        <label>Inventory Category:</label>
        <select class="form-control" name="inventory_category">
  		  		  <?php
  		  while($row=mysqli_fetch_assoc($result1)){
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

	<input type="button" value="Display:Inventory Planning Report" onclick="parent.location='printip.php'">
        </select> 

        
        
        
        
        
        
        </form>


 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>