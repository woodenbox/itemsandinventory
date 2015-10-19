<?php
 include('header.php');
 include('process.php');
 
 $conn = connect();
 $result = mysqli_fetch_assoc(viewShuhadaItem($conn, $_GET['id']));
 
 if(isset($_POST['edit'])){
  $name=$_POST['name'];
  $stock=$_POST['stock'];
  
  editShuhada($conn, $stock, $_GET['id']);
  echo "<script>window.location = 'reorderlevel.php'</script>";  
 }
?>
 <div id="page-wrapper">
 <form method="POST">
 <legend>Edit Tolerance Level</legend>
 <label>Item Name</label>
 <input type="text" class="form-control" name="name" readonly value="<?=$result['name']?>">
 
 <label>Tolerance Level</label>
 <input type="text" class="form-control" name="stock" value="<?=$result['stock']?>">
 <br>
 <input type="submit" class="btn btn-success" value="Edit Tolerance Level" name="edit">
 </form>
 </div>
<?php
 include('footer.php');
?>