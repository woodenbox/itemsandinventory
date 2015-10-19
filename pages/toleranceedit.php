<?php
 include('header.php');
 include('process.php');
 
 $conn = connect();
 $result = mysqli_fetch_assoc(viewShuhadaItem($conn));
 
 if(isset($_POST['edit'])){
  $stock=$_POST['stock'];
  
  editShuhada($conn, $stock);
  echo "<script>window.location = 'items.php'</script>";  
 }
?>
 <div id="page-wrapper">
 <form method="POST">
 <legend>Edit Tolerance Level</legend>
 <label>Tolerance Level</label>
 <input type="text" class="form-control" name="stock" value="<?=$result['stock']?>">
 <br>
 <input type="submit" class="btn btn-success" value="Edit Tolerance Level" name="edit">
 </form>
 </div>
<?php
 include('footer.php');
?>