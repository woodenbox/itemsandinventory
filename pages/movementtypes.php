<?php
    include('header.php');
    include('process.php');

    $connect = connect();
        
    if(isset($_POST['add'])){
        addmovementype($connect, $_POST['name']);
        echo "<script>window.location = 'movementtypes.php'</script>";
    }
?>

<div id="page-wrapper">
    <label>Movement Types</label>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>Name</td>
            </tr>
            
<?php $getmovementtypes = getmovementtypes($connect); while($row=mysqli_fetch_assoc($getmovementtypes)){?>
            <tr>
                <td><?=$row['name']?></td>
            </tr>
<?php } ?>
        </table>
    </div>
        <form method="POST">
    <label>Add New Movement Type</label>
    <input type="text" class="form-control" name="name" required>
    <input type="submit" class="btn btn-success" value="Add" name="add">
    </form>
</div> 
</div> <!--shuhada?-->
<?php
include('footer.php');
?>  