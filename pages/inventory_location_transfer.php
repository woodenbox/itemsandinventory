<?php
 //include('header.php');
 include('process.php');
 $conn1 = connect();
 $result = viewTransferType($conn1);
 $result2 = viewInventoryLocationTransfer($conn1);
 $result3 = getItems($conn1);
 $result4 = viewInventoryLocation($conn1);
 $result5 = viewInventoryLocation($conn1);
 
 if(isset($_POST['add'])){
	 
  $item=$_POST['item'];
  $from=$_POST['from'];
  $to=$_POST['to'];
  $date=$_POST['date'];
  $transfer=$_POST['transfer'];
  
  $checkdate=checkInventoryDate($conn1,$date);
  while($jason=mysqli_fetch_assoc($checkdate)){
   $earl[0]=$jason['Difference'];	  
  }
  
  if(mysqli_num_rows(checkInventory($conn1,$item))==0){
   if($from==$to){
	echo "<script>alert('Current Location Cannot Be Similar with Directed Location');</script>";	  
   }
   else{
	if($earl[0]>=0){
   addInventoryLocationTransfer($conn1, $item, $from, $to, $date, $transfer);
   echo $item;
   updateInventoryLocation($conn1, $item, $to);
     echo "<script>alert('Transfer of Location Successfully Initiated');</script>";	
	}
	else{
	 echo "<script>alert('Date Could Only Be Either Today or The Coming Days');</script>";	
	}
   }
  }
  else if(mysqli_num_rows(checkInventory($conn1,$item))==1){
   echo "<script>alert('Sorry, The Item's Location is Already on Progress');</script>";	   
  }
  
  
 }
?>
     <div id="page-wrapper">
        
        <div class="table-responsive">
         <table class="table table-hover">
           <tr>
            <th>Item</th>
            <th>Previous Location</th>
            <th>New Directed Location</th>
            <th>Date Delivery</th>
            <th>Transfer Type</th>
           </tr>
           <?php
            while($row=mysqli_fetch_assoc($result2)){
           ?>
            <tr>
             <td><?=$row['item']?></td>
             <td><?=$row['from_location']?></td>
             <td><?=$row['to_location']?></td>
             <td><?=$row['date']?></td>
             <td><?=$row['transfer_type']?></td>
            </tr>
           <?php
            }
           ?>
         </table>
        </div>
        <hr>
        
        <form method="POST">
         <legend>Inventory Location Transfer</legend>
         
         <label>Item Code/Name</label>
         <select class="form-control" name="item">
         <?php
          while($row3=mysqli_fetch_assoc($result3)){
         ?>
          <option value="<?=$row3['name']?>">[<?=$row3['item_code']?>] - <?=$row3['name']?></option>
         <?php
          }
         ?>
         </select>
         
         <label>Current Location Code/Name</label>
         <select class="form-control" name="from">
         <?php
          while($row4=mysqli_fetch_assoc($result4)){
         ?>
          <option value="<?=$row4['name']?>">[<?=$row4['code']?>] - <?=$row4['name']?></option>
         <?php
          }
         ?>
         </select>
         
         <label>Directed Location Code/Name</label>
         <select class="form-control" name="to">
         <?php
          while($row5=mysqli_fetch_assoc($result5)){
         ?>
          <option value="<?=$row5['name']?>">[<?=$row5['code']?>] - <?=$row5['name']?></option>
         <?php
          }
         ?>
         </select>
         
         <label>Date</label>
         <input type="date" class="form-control" name="date">
         
         <label>Transfer Type</label>
         <select class="form-control" name="transfer">
         <?php
          while($row2=mysqli_fetch_assoc($result)){
         ?>
          <option value="<?=$row2['id']?>">[<?=$row2['id']?>] - <?=$row2['name']?></option>
         <?php
          }
         ?>
         </select>
         <br>
         <input type="submit" class="btn btn-success" value="Transfer Inventory Location" name="add">
         
         
        </form
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
 include('footer.php');
?>