<?php
include('header.php');
include('process.php');

$conn1 = connect();

$result = viewUnitOfMeasure($conn1);

if(isset($_POST['add'])){
 $name=$_POST['name'];
 $description=$_POST['description'];
 $dp=9;
 
 addUnitOfMeasure($conn1, $name, $description, $dp);  
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
?>
  </table>
  <form method="POST">
  <legend><label>Unit of Measure</label></legend>
  
  <label>Unit</label>
  <input type="text" class="form-control" name="name">
  
  <label>Description</label>
  <input type="text" class="form-control" name="description">
  
  <label>Decimal Places</label>
  <input type="text" class="form-control" name="decimal" readonly value="User Quantity Decimals (9)" >
  <br>
  <input type="submit" class="btn btn-success" value="Add Unit of Measure" name="add">
  
  </form>
 </div>
 
<?php
include('footer.php');
?>