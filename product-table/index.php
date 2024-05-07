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
   <center> <div class="container">
        <h1>Add Product</h1>
        <form method = "post">
            <input type="text" placeholder="Product name" name="Pname" id=""><br>
            <input type="text" placeholder="Product price" name="Pprice" id=""><br>
            <input type="text" placeholder="Product catgory" name="Pcat" id=""><br>
            <input type="text" placeholder="Product description" name="Pdesc" id=""><br>
            <input type="submit" value="Add product" name = "addprod">
        </form>
        <?php
        if(isset($_POST['addprod'])){
            $prodName = $_POST['Pname'];
            $prodPrice = $_POST["Pprice"];
            $prodCat = $_POST['Pcat'];
            $prodDesc = $_POST['Pdesc'];
            $insertQuery = "INSERT INTO `products` (`product_Name`, `product_Price`, `product_Cat`, `product_Desc`) VALUES ('$prodName','$prodPrice','$prodCat','$prodDesc')";
            mysqli_query($conn,$insertQuery);
            ?>
            <div class="back">
    <div class="success">
            <div class="content">
            <p>Product Added Successfully!</p>
            <a href="index.php">Confirm</a>
            </div>
        </div></div>
        <?php
            
        }
        ?>
    </div></center>
    <a  class = "add-product-link" href="products.php">Show All Products</a>
</body>
</html>