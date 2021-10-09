<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php

    require_once('connectdb.php');

    if (isset($_REQUEST['btn_insert'])) {
        $ProductName = $_REQUEST['ProductName'];
        $Picture = $_REQUEST['Picture'];
        $Category = $_REQUEST['Category'];
        $ProductDescription = $_REQUEST['ProductDescription'];
        $Price = $_REQUEST['Price'];
        $QuantityStock = $_REQUEST['QuantityStock'];


        if (empty($ProductName) || empty($Category) || empty($ProductDescription) || empty($Price) || empty($QuantityStock)) {
            $errorMsg = "Please enter ProductName";
            echo '<script>alert("Please fill out the information completely.")</script>';
            header("refresh:0.5; index.php");
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO products(ProductName, Picture, Category, ProductDescription, Price, QuantityStock)
                    VALUES (:pdn, :pt, :cg, :pd, :pr, :qs)");
                    $insert_stmt->bindParam(':pdn', $ProductName);
                    $insert_stmt->bindParam(':pt', $Picture);
                    $insert_stmt->bindParam(':cg', $Category);
                    $insert_stmt->bindParam(':pd', $ProductDescription);
                    $insert_stmt->bindParam(':pr', $Price);
                    $insert_stmt->bindParam(':qs', $QuantityStock);

                    if ($insert_stmt->execute()) {
                        echo '<script>alert("CreateProducts Successfully...")</script>';
                        header("refresh:0.1;index.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>


</html>