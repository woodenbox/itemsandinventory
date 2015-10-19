<?php
    include('header.php');
    include('process.php');

    $connect = connect();
    $result = viewItemShuhada($connect);   	
    
?>

<div id="page-wrapper">
    <table class="table">
        <caption><b><center><h1>ToleranceLevels</h1></center></b></caption>
        <tr>
            <td>Item</td>
            <td>Current Demand</td>
            <td>Tolerance Level</td>
        </tr>
<?php
        while($row=mysqli_fetch_assoc($result)){
?>
        <tr>
            <td><?=$row['name']?></td>
            <td><?=$row['demand']?></td>
            <td><?=$row['stock']?></td>
            <td><a class="glyphicon glyphicon-pencil" href="<?php echo "toleranceedit.php?id=".$row['id']?>"></a></td>
        </tr>

<?php
        }
?>


<?php
include('footer.php');
?>