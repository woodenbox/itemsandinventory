<?php
    include('header.php');
    include('process.php');

    $connect = connect();
       	
    if(isset($_POST['add'])){
        $checkorderlevel = mysqli_fetch_assoc(checkorderlevel($connect, $_POST['reorder']['item'], $_POST['reorder']['location']));
        if($checkorderlevel['1']==1){
            echo "<script>alert('Item and location is already set');</script>";
        } else {
            addreorderlevel($connect, $_POST['reorder']);
        }
        echo "<script>window.location = 'reorderlevel.php'</script>";
    }
?>

<div id="page-wrapper">
    <table class="table">
        <tr>
            <td>Item</td>
            <td>Location</td>
            <td>Order Level</td>
        </tr>
<?php
        $listreorderlevels = listreorderlevels($connect);
        while($row=mysqli_fetch_assoc($listreorderlevels)){
?>
        <tr>
            <td><?=$row['item']?></td>
            <td><?=$row['location']?></td>
            <td><?=$row['reorder_level']?></td>
        </tr>

<?php
        }
?>

    </table>
    </br>

    <legend><label>Add Reorder Levels</label></legend>    	
    <form method="POST">
        <label>Item</label>
        <select class="form-control" name="reorder[item]">
<?php
        $listitems = viewItems($connect);
        while($row=mysqli_fetch_assoc($listitems)){
?>
            <option value="<?=$row['name']?>"><?=$row['id']?> - <?=$row['name']?></option>
<?php    
        }
?>
        </select>
        <label>Re-order Level</label>
        <input type="text" class="form-control" name="reorder[level]" pattern="[0-9]+" required>
        <label>Location</label>
        <select class="form-control" name="reorder[location]">
            <option value="Mandaluyong">Mandaluyong</option>
        </select>
        <input type="submit" class="btn btn-success" value="Add" name="add">
    </form>
</div> 
</div> <!--shuhada?-->
<?php
include('footer.php');
?>