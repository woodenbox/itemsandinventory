        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	
        	$result = viewSuppliers($conn1);
        	$result2 = viewCurrencies($conn1);
        	        	
        	if(isset($_POST['add'])){
	        	$name = $_POST['name'];
	        	$shortname = $_POST['shortname'];
	        	$mailaddress = $_POST['mailaddress'];
                $billaddress = $_POST['billaddress'];
	        	$memo = $_POST['memo'];
	        	$status = $_POST['status'];
	        	$addCustomer = addCustomer($conn1, $name, $shortname, $mailaddress, $billaddress, $memo, $status);
	        	
	        	if($addCustomer){
		        	echo "Supplier Added!";
	        	}else{
		        	echo "Failed to Add!";
	        	}
	        	
        	}
        
        
        ?>
        
        

        <div id="page-wrapper">
            <table class="table">
            <caption><h1><b>Customers</b></h1></caption>
                <tr>
                    <th>Name</th>
                    <th>Short name</th>
                    <th>Mailing Address</th>
                    <th>Biling Address</th>                    
                    <th>Status</td>
                </tr>
                <?php
                    $listcustomers=listcustomers($conn1);
                    while($row=mysqli_fetch_assoc($listcustomers)){
                ?>
                
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['shortname']?></td>
                    <td><?=$row['mailaddress']?></td>
                    <td><?=$row['billaddress']?></td>
                    <td><?php if($row['status']==1) echo "Enabled"; else echo "Disabled";?></td>
                    <td><a href="<?php echo "customersedit.php?id=".$row['id']?>"><img src="../images/edit.png" width="3%"></a></td>
                </tr>
                
                <?php
                    }
                ?>
            </table>
    </br>
        
        <legend><label>Add New Customer</label></legend>    	
        <form method="POST">
            <label>Customer Name</label>
            <input type="text" class="form-control" name="name">
            <label>Short Name</label>
            <input type="text" class="form-control" name="shortname">
            <label>Mailing Address</label>
            <input type="text" class="form-control" name="mailaddress">
            <label>Billing Address</label>
            <input type="text" class="form-control" name="billaddress">
            <label>Status</label>
       		<select class="form-control" name="status">
      		  <?php
              $OPT_STATUS=viewOPT_STATUS($conn1);
      		  while($row=mysqli_fetch_assoc($OPT_STATUS)){
    	  		  ?>
       		       <option value="<?=$row['id']?>"><?=$row['id']?> - <?=$row['name']?></option>
        	   <?php    
    	       } ?>
            </select> 
            <label>Memo</label></legend>
            <input type="text" class="form-control" name="memo">
            <br>
            <input type="submit" class="btn btn-success" value="Add" name="add">
        </form>
 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
 include('footer.php');
?>