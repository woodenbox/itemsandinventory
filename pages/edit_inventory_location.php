<?php
 include('header.php');
 include('process.php');
 $conn1   = connect();
 $result  = viewInventoryLocation($conn1);
 $result2 = viewSpecificInventoryLocation($conn1, $_GET['id']);
  
 if(isset($_POST['edit'])){
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
	  editInventoryLocation($conn1, $_GET['id'], $code, $name, $contact, $address, $phone1, $phone2, $fax, $email);
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
         			<td>Location Code</td>
         			<td>Location Name</td>
         			<td>Contact Person</td>
         			<td>Address</td>
         			<td>Phone</td>
         			<td>Secondary Phone</td>
         			<td>Fax Number</td>
         			<td>E-Mail</td>
                    <td>Edit</td>
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
                    <td><a class="glyphicon glyphicon-pencil" href="<?php echo "suppliersedit.php?id=".$row['id']?>"></a></td>
         		</tr>
         		
         		<?php
     				}
         		?>
         	</table>
         </div>
         <hr>
         <form method="POST">
         <legend><label>Inventory Location Information</label></legend>
        <?php
         while($row=mysqli_fetch_assoc($result2)){
	    ?>
         <label>Location Code</label>
         <input type="text" class="form-control" name="code" value="<?=$row['code']?>">
         
         <label>Location Name</label>
         <input type="text" class="form-control" name="name" value="<?=$row['name']?>">
         
         <label>Contact Person</label>
         <input type="text" class="form-control" name="contact" value="<?=$row['contact']?>">
         
         <label>Address</label>
         <input type="text" class="form-control" name="address" value="<?=$row['address']?>">
         
         <label>Phone Number</label>
         <input type="text" class="form-control" name="phone1" value="<?=$row['phone']?>">
         
         <label>Secondary Phone Number</label>
         <input type="text" class="form-control" name="phone2" value="<?=$row['phone2']?>">
         
         <label>Facsimile Number</label>
         <input type="text" class="form-control" name="fax" value="<?=$row['fax']?>">
         
         <label>E-Mail</label>
         <input type="text" class="form-control" name="email" value="<?=$row['email']?>">
         <br>
         <input type="submit" class="btn btn-success" value="Edit Inventory Location" name="edit">
         </form>
          
    </div>
    <!-- /#wrapper -->

<?php
}
 include('footer.php');
?>