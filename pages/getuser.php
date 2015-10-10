<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Items and Inventory System</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','items_inventory');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM foreign_item_codes WHERE item = '".$q."'";
$result = mysqli_query($con,$sql);


echo "
<table class='table'>
    <tr>
        <td>European Article Number</td>
        <td>Quantity</td>
        <td>Unit of Measure</td>
        <td>Description</td>
        <td>Category</td>
        <td>Edit</td>
    </tr>";
$listfic = "SELECT * FROM foreign_item_codes WHERE item = '".$q."'";
$result = mysqli_query($con,$listfic); 
        while($row=mysqli_fetch_assoc($result)){
echo "            
    <tr>
        <td>".$row['ean']."</td>
        <td>".$row['quantity']."</td>
        <td>".$row['uom']."</td>
        <td>".$row['description']."</td>
        <td>".$row['category']."</td>";
        $link = "editfic.php?id=".$row['id'];
echo    "<td><a class='glyphicon glyphicon-log-in' href=".$link."></a></td>
    </tr>";
        }
echo "
</table>";

mysqli_close($con);
?>
</body>
</html>