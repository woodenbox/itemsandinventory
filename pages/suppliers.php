  
        <?php
        	include('header.php');
        	include('process.php');
       
        	$conn1 = connect();
        	
        	$result = viewSuppliers($conn1);
        	$result2 = viewCurrencies($conn1);
        	$result3 = viewStatusType($conn1);

        	        	
        	if(isset($_POST['add'])){
	        	
	        	
	        	$name = $_POST['name'];
	        	$shortname = $_POST['shortname'];
	        	$website = $_POST['website'];
	        	$currency = $_POST['currency'];
	        	$bank = $_POST['bank'];
	        	$credit_limit = $_POST['credit_limit'];
	        	$email = $_POST['email'];	
	        	$address = $_POST['address'];
	        	$memo = $_POST['memo'];
	        	$status = $_POST['status'];
	        	$phone = $_POST['phone'];
	        	$fax = $_POST['fax'];
	        	
	        	$addSuppliers = addSuppliers($conn1, $name, $shortname, $website, $currency, $bank, $credit_limit, $email, $address, $memo, $status, $phone, $fax);
	        	
	        	if($addSuppliers){
		        	echo "Supplier Added!";
	        	}else{
		        	echo "Failed to Add!";
	        	}
	        	
        	}
        
        
        ?>
        
        

        <div id="page-wrapper">
       
        
         <div class="table-responsive">
         	<table class="table">
         	<caption><center><h1><b>Suppliers</b></h1></center></caption>
         		<tr>
         			<th>Name</th>
         			<th>Short Name</th>
         			<th>Website</th>
         			<th>Currency</th>
         			<th>Bank</th>
         			<th>Credit Limit</th>
         			<th>Email</th>
         			<th>Address</th>
         			<th>Memo</th>
         			<th>Status</th>
         			<th>Phone</th>
         			<th>Fax</th>
                    <th>Edit</th>
         		</tr>
         		
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		
         		<tr>
         			<td><?=$row['name']?></td>
         			<td><?=$row['short_name']?></td>
         			<td><?=$row['website']?></td>
                    <td><?=$row['currency']?></td>
         			<td><?=$row['bank']?></td>
         			<td><?=$row['credit_limit']?></td>
         			<td><?=$row['email']?></td>
         			<td><?=$row['address']?></td>
         			<td><?=$row['memo']?></td>
         			<td><?=$row['status']?></td>
         			<td><?=$row['phone']?></td>
         			<td><?=$row['fax']?></td>
                    <td><a class="glyphicon glyphicon-pencil" href="<?php echo "suppliersedit.php?id=".$row['id']?>"></a></td>
         		</tr>
         		
         		<?php
     				}
         		?>
         		
         	</table>
         </div>
        
         <hr>
        
         <legend><label>Supplier Information</label></legend>    	
        
         <form method="POST">
        
         <label>Company Name</label>
         <input type="text" class="form-control" name="name">
        
        
        
         <label>Short Name</label>
         <input type="text" class="form-control" name="shortname">
        
        
         <label>Website</label>
         <input type="text" class="form-control" name="website">
       
       
         <label>Address</label>
         <input type="text" class="form-control" name="address">
       
       <label>Currency</label>
   		<select class="form-control" name="currency">
  		  <?php
  		  while($row=mysqli_fetch_assoc($result2)){
	  		  ?>
   		       <option value="<?=$row['id']?>"><?=$row['id']?> - <?=$row['name']?></option>
    	   <?php    
	       } ?>
        </select> 
        
        
              
       <div>
        <legend><label>Purchasing</label></legend>
        
        
         <label>Bank Name/Account</label>
         <input type="text" class="form-control" name="bank">
       
         <label>Credit Limit</label>
         <input type="text" class="form-control" name="credit_limit">
        
        <label>Status</label>
  		<select class="form-control" name="status">
  		<?php
  		  while($row4=mysqli_fetch_assoc($result3)){
	     ?>
   		       <option value="<?=$row4['id']?>"> <?=$row4['id']?> - <?=$row4['name']?> </option>
    	<?php    
	       } 
	    ?>
        </select> 
        
         
         
        <legend><label>Contact Information</label></legend>
        
        <label>Email</label>
         <input type="text" class="form-control" name="email">
        
        <label>Phone</label>
         <input type="text" class="form-control" name="phone">
         
         <label>Memo</label></legend>
         <input type="text" class="form-control" name="memo">
         
         <label>Fax</label>
         <input type="text" class="form-control" name="fax">
        
         <br>
         <input type="submit" class="btn btn-success" value="Add Supplier" name="add">
        
        </form>
        
        
        
        </table>
        
        

        
        

 
       </div> <!-- number 2 div->
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
 include('footer.php');
?>