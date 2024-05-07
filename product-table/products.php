<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Category</th>
            <th>Product Description</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        $selectQuery = "SELECT * FROM products";
        $selectDone = mysqli_query($conn,$selectQuery);
        $data = mysqli_fetch_all($selectDone);

        foreach($data as $product){
            ?><tr>
            <td><?php
            echo $product[0]?></td>
            <td><?php
            echo $product[1]?></td>
            <td><?php
            echo $product[2]?></td>
            <td><?php
            echo $product[3]?></td>
            <td><?php
            echo $product[4]?></td>
            <td><form method="post">
                <input type="text" value="<?php echo $product[0] ?>" name="prodid" style = "display:none">
                <input type="submit" value="Delete" name = "deletebtn">
            </form></td>
            <td><form method="post">
                <input type="text" value="<?php echo $product[0] ?>" name="prodid" style = "display:none">
                <input type="submit" value="Update" name = "updatebtn">
            </form></td>
            <?php
        }
        ?>
    </table>
<?php
    if(isset($_POST['updatebtn'])){
    $updateId = $_POST['prodid']; 
    ?>
    <center><div class = "back"><div class="update-container">
        <h1>Update Product</h1>
        <form method = "post">
            <input type="hidden" Value = "<?php echo $updateId ?>" name="upId" id=""><br>
            <input type="text" placeholder="Product name" name="Pname" id=""><br>
            <input type="text" placeholder="Product price" name="Pprice" id=""><br>
            <input type="text" placeholder="Product catgory" name="Pcat" id=""><br>
            <input type="text" placeholder="Product description" name="Pdesc" id=""><br>
            <input type="submit" value="Update" name = "Update"><br>
        </form>
    </div></div></center>
    <?php
    }
    if(isset($_POST['Update'])){
        $upId=$_POST["upId"];
        $prodName = $_POST['Pname'];
        $prodPrice = $_POST["Pprice"];
        $prodCat = $_POST['Pcat'];
        $prodDesc = $_POST['Pdesc'];
        $insertQuery = "UPDATE `products` SET `product_Name`='$prodName',`product_Price`='$prodPrice',`product_Cat`='$prodCat',`product_Desc`='$prodDesc' WHERE `product_Id` = '$upId'";
        mysqli_query($conn,$insertQuery);

        ?>
        <div class="back">
        <div class="success">
            <div class="content">
            <p>Data Updated Successfully!</p>
            <a href="products.php">Confirm</a>
            </div>
        </div>
        </div>
        <?php
    }
?>
<br>
<a class = "add-product-link" href="index.php">Add product</a>
</body>
</html>

<?php
if(isset($_POST['deletebtn'])){
    $deleteId = $_POST['prodid'];
    $deleteQuery = "DELETE FROM `products` WHERE `product_Id` = '$deleteId'";
    mysqli_query($conn,$deleteQuery);
    ?>
    <div class="back">
    <div class="success">
            <div class="content">
            <p>Data deleted Successfully!</p>
            <a href="products.php">Confirm</a>
            </div>
        </div></div>
        <?php
}


?>