   
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

	<input type="button" value="Print:Inventory Planning Report" onclick="parent.location='printip.php'">
        </select> 

        
        
        
        
        
        
        </form>


 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>