<?php
 include('header.php');
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
  $transferdate = date('Y/m/d', strtotime($_POST['date']));
  $transfer=$_POST['transfer'];
  
  date_default_timezone_set("Asia/Manila");
  $datetoday=date("Y/m/d");

  if($transferdate>=$datetoday){
      if($from==$to){
        echo "<script>alert('Current Location Cannot Be Similar with Directed Location');</script>";    
      }else{
          $checkilt=mysqli_fetch_assoc(checkilt($conn1, $item, $from));
        if($checkilt['1']==1){
          addInventoryLocationTransfer($conn1, $item, $from, $to, $_POST['date'], $transfer);
          updateInventoryLocation($conn1, $item, $to);
          echo "<script>alert('Transfer of Location Successfully Initiated');</script>";   
        } else {
          echo "<script>alert('No item could be found in that location');</script>";
        }
      }
  } else {
    echo "<script>alert('Date Could Only Be Either Today or The Coming Days');</script>";  
  }

  /*$checkdate=checkInventoryDate($conn1,$date);
  while($jason=mysqli_fetch_assoc($checkdate)){
   $earl[0]=$jason['Difference'];	  
  }

  if(mysqli_num_rows(checkInventory($conn1,$item))==0){
   if($from==$to){
	echo "<script>alert('Current Location Cannot Be Similar with Directed Location');</script>";	  
   } else{
	if($earl[0]>=0){
   addInventoryLocationTransfer($conn1, $item, $from, $to, $date, $transfer);
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
  }*/
  
  
 }
?>
     <div id="page-wrapper">

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