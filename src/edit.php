<?php

require_once('connectdb.php');

if (isset($_REQUEST['update_id'])) {
    try {
        $id = $_REQUEST['update_id'];
        $select_stmt = $db->prepare('SELECT * FROM products WHERE ProductID = :id');
        $select_stmt->bindParam(":id", $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

if (isset($_REQUEST['btn_update'])) {
    $ProductName = $_REQUEST['ProductName'];
    $Picture = $_REQUEST['Picture'];
    $Category = $_REQUEST['Category'];
    $ProductDescription = $_REQUEST['ProductDescription'];
    $Price = $_REQUEST['Price'];
    $QuantityStock = $_REQUEST['QuantityStock'];

    if (empty($ProductName) || empty($Category) || empty($ProductDescription) || empty($Price) || empty($QuantityStock)) {
        $errorMsg = "Please fill out the information completely.";
        header("refresh:1.5;index.php");
    } else {
        try {
            if (!isset($errorMsg)) {
                $update_stmt = $db->prepare("UPDATE products SET ProductName = :pdn, Picture = :pt, Category = :cg, ProductDescription = :pd, Price = :pr, QuantityStock = :qs WHERE ProductID = :id");
                $update_stmt->bindParam(':pdn', $ProductName);
                $update_stmt->bindParam(':pt', $Picture);
                $update_stmt->bindParam(':cg', $Category);
                $update_stmt->bindParam(':pd', $ProductDescription);
                $update_stmt->bindParam(':pr', $Price);
                $update_stmt->bindParam(':qs', $QuantityStock);
                $update_stmt->bindParam(':id', $ProductID);

                if ($update_stmt->execute()) {
                    $updateMsg = "Update successfully...";
                    header("refresh:1;index.php");
                }
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>

    <div class="container ">
        <div class="display-3 text-center">Edit Products</div><br>
        <?php
        if (isset($errorMsg)) {
        ?>
            <div class="alert alert-danger">
                <strong><?php echo $errorMsg; ?></strong>
            </div>
        <?php } ?>

        <?php
        if (isset($updateMsg)) {
        ?>
            <div class="alert alert-success">
                <strong><?php echo $updateMsg; ?></strong>
            </div>
        <?php } ?>

        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-sm-2 control-label">ProductName</label>
                    <div class="col-sm-9">
                        <input type="text" name="ProductName" class="form-control" value="<?php echo $ProductName; ?>">
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-sm-2 control-label">Picture</label>
                    <div class="col-sm-9">
                        <input type="text" name="Picture" class="form-control" value="<?php echo $Picture; ?>">
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-9">
                        <input type="text" name="Category" class="form-control" value="<?php echo $Category; ?>">
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-sm-2 control-label">ProductDescription</label>
                    <div class="col-sm-9">
                        <input type="text" name="ProductDescription" class="form-control" value="<?php echo $ProductDescription; ?>">
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-9">
                        <input type="text" name="Price" class="form-control" value="<?php echo $Price; ?>">
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row">
                    <label for="name" class="col-sm-2 control-label">QuantityStock</label>
                    <div class="col-sm-9">
                        <input type="text" name="QuantityStock" class="form-control" value="<?php echo $QuantityStock; ?>">
                    </div>
                </div>
            </div><br>
            <div class="form-group text-center">
                <div class="col-sm-12">
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                    <input type="submit" name="btn_update" class="btn btn-primary" value="Update">
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>