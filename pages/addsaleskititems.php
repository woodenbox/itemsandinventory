<?php
    include('header.php');
    include('process.php');
    $connect = connect();
        
    if(!isset($_GET['id'])){
        $getskid = mysqli_fetch_assoc(getskid($connect));
        $id=$getskid['id'];
    } else {
        $id=$_GET['id'];
    }
    if(isset($_GET['remove'])){
        removeskitem($connect, $_GET['remove']);
        echo "<script>window.location = 'addsaleskititems.php?id=".$id."'</script>";
    }
    if(isset($_POST['add'])){
        $checkski = mysqli_fetch_assoc(checkski($connect, $_POST['skitem']['item'], $id));
        if($checkski['1']==1){
            echo "<script>alert('Sales Kit is already added');</script>";
        } else {
            addski($connect, $_POST['skitem'], $id);
        }
        echo "<script>window.location = 'addsaleskititems.php?id=".$id."'</script>";
    } 
    if(isset($_POST['back'])){
        echo "<script>window.location = 'saleskits.php'</script>";  
    }  
?>

<div id="page-wrapper">
    <label>Sales Kits - <?=$_SESSION['sk']['name']?></label>
        <table class="table">
        <tr>
            <td>Item</td>
            <td>Quantity</td>
            <td>Remove</td>
        </tr>
<?php $listski = listski($connect, $id); while($row=mysqli_fetch_assoc($listski)){?>
        <tr>
            <td><?=$row['item']?></td>
            <td><?=$row['quantity']?></td>
            <td><a href="addsaleskititems.php?remove=<?=$row['id']?>">Remove</a></td>
        </tr>

<?php } ?>
    </table>
    </br>    
    <form method="POST">
        Item
        <select name="skitem[item]" class="form-control">
<?php $listitems=listitems($connect); while($row=mysqli_fetch_assoc($listitems)){ ?>   
            <option value="<?=$row['name']?>"><?=$row['name']?></option>
<?php } ?>
        </select>
        Quantity
        <input type="text" class="form-control" name="skitem[quantity]" required>        
        <input type="submit" class="btn btn-success" value="Add" name="add">
    </form>
    <form method="POST"> 
        <input type="submit" class="btn btn-success" value="Back" name="back">
    </form>
</div> 
</div> <!--shuhada?-->
<?php
    include('footer.php');
?>