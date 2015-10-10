<?php
include('header.php');
include('process.php');

$conn1 = connect();

$result = viewUnitOfMeasure($conn1);
$result2 = viewSpecificUnitOfMeasure($conn1, $_GET['id']);

if(isset($_POST['edit'])){
 $name=$_POST['name'];
 $description=$_POST['description'];
 $dp=9;
 
 editUnitOfMeasure($conn1, $_GET['id'],$name, $description, $dp);  
}
?>
 <div id="page-wrapper">
  <table class="table table-hover">
  <tr>
   <th>Unit</th>
   <th>Description</th>
   <th>Decimal Places</th>
   <th>Edit</th>
  <tr>
<?php
while($row=mysqli_fetch_assoc($result)){
?>
  <tr>
   <td><?=$row['name']?></td>
   <td><?=$row['description']?></td>
   <td><?=$row['dp']?></td>
   <td><a class="glyphicon glyphicon-pencil" href="<?php  echo "edit_unitofmeasure.php?id=".$row['id']?>"></a></td>
  </tr>
<?php
}
while($row=mysqli_fetch_assoc($result2)){
?>
  </table>
  <form method="POST">
  <legend><label>Unit of Measure</label></legend>
  
  <label>Unit</label>
  <input type="text" class="form-control" name="name" value="<?=$row['name']?>">
  
  <label>Description</label>
  <input type="text" class="form-control" name="description" value="<?=$row['description']?>">
  
  <label>Decimal Places</label>
  <input type="text" class="form-control" name="decimal" readonly value="<?=$row['dp']?>">
  <br>
  <input type="submit" class="btn btn-success" value="Edit Unit of Measure" name="edit">
  
  </form>
 </div>
 
<?php
}
include('footer.php');
?>