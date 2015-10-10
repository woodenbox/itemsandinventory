<?php
 include('header.php');
 include('process.php');
 $conn1 = connect();
 $result = viewInventoryLocation($conn1);
 
 if(isset($_POST['add'])){
  $code=$_POST['code'];
  $name=$_POST['name'];
  $contact=$_POST['contact'];
  $address=$_POST['address'];
  $phone1=$_POST['phone1'];
  $phone2=$_POST['phone2'];
  $fax=$_POST['fax'];
  $email=$_POST['email'];
  
  if(!(int)$contact){
   if((int)$phone1){
	if((int)$phone2){
     if((int)$fax){
	  addInventoryLocation($conn1, $code, $name, $contact, $address, $phone1, $phone2, $fax, $email);
     }
     else{
	  echo "<script>alert('Please Enter an Integer Value in Facsimile Number');</script>";     
     }
	}
	else{
	 echo "<script>alert('Please Enter an Integer Value in Secondary Phone Number');</script>";     
	}
   }
   else{
	echo "<script>alert('Please Enter an Integer Value in Phone Number');</script>";     
   }
  }
  else{
   echo "<script>alert('Please Enter a Name in Contact Person');</script>";     
  }
  
 }
?>
    <div id="page-wrapper">
    
      <div class="table-responsive">
         	<table class="table table-hover"  width="100%" style="margin:auto">
         		<tr>
         			<th>Location Code</th>
         			<th>Location Name</th>
         			<th>Contact Person</th>
         			<th>Address</th>
         			<th>Phone</th>
         			<th>Secondary Phone</th>
         			<th>Fax Number</th>
         			<th>E-Mail</th>
                    <th>Edit</th>
         		</tr>
         		
         		<?php
         			while($row=mysqli_fetch_assoc($result)){
         		?>
         		
         		<tr>
         			<td><?=$row['code']?></td>
         			<td><?=$row['name']?></td>
         			<td><?=$row['contact']?></td>
         			<td><?=$row['address']?></td>
         			<td><?=$row['phone']?></td>
         			<td><?=$row['phone2']?></td>
         			<td><?=$row['fax']?></td>
         			<td><?=$row['email']?></td>
                    <td><a class="glyphicon glyphicon-pencil" href="<?php echo "edit_inventory_location.php?id=".$row['id']?>"></a></td>
         		</tr>
         		
         		<?php
     				}
         		?>
         	</table>
         </div>
         <hr>
         <form method="POST">
         <legend><label>Inventory Location Information</label></legend>
         
         <label>Location Code</label>
         <input type="text" class="form-control" name="code">
         
         <label>Location Name</label>
         <input type="text" class="form-control" name="name">
         
         <label>Contact Person</label>
         <input type="text" class="form-control" name="contact">
         
         <label>Address</label>
         <input type="text" class="form-control" name="address">
         
         <label>Phone Number</label>
         <input type="text" class="form-control" name="phone1">
         
         <label>Secondary Phone Number</label>
         <input type="text" class="form-control" name="phone2">
         
         <label>Facsimile Number</label>
         <input type="text" class="form-control" name="fax">
         
         <label>E-Mail</label>
         <input type="text" class="form-control" name="email">
         <br>
         <input type="submit" class="btn btn-success" value="Add Inventory Location" name="add">
         </form>
          
    </div>
    <!-- /#wrapper -->

<?php
 include('footer.php');
?>