<?php
require_once('connectdb.php');

if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];
    $id = $_REQUEST['delete_id'];
    $select_stmt = $db->prepare('SELECT * FROM products WHERE ProductID = :id');
    $select_stmt->bindParam(":id", $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    
    $delete_stmt = $db->prepare('DELETE FROM products WHERE ProductID = :id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
    <div class="container">
        <div class="display-3 text-center">Products</div>

        <nav class="navbar">
            <div class="container-fluid p-0 mb-3">
                <form class="d-flex">
                    <input class="form-control me-2" name="search" type="text" id="search" placeholder="Search">
                    <input type="submit" name="btn_search" class="btn btn-primary" value="Search">
                </form>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#productaddmodal">
                    Create a new Products
                </button>

                <!-- Modal -->
                <div class="modal fade" id="productaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create a new Products</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/insert.php" method="POST">

                                    <div class="form-group">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" name="ProductName" class="form-control" placeholder="Product name.">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">URL Picture</label>
                                        <input type="text" name="Picture" class="form-control" placeholder="Paste image link.">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <input type="text" name="Category" class="form-control" placeholder="Category.">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Product Description</label>
                                        <textarea class="form-control" name="ProductDescription" rows="3" placeholder="Product description."></textarea>
                                    </div>
                                    <label class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">฿</span>
                                        <input type="number" name="Price" class="form-control" placeholder="Baht.">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Quantity Stock</label>
                                        <input type="text" name="QuantityStock" class="form-control" placeholder="Quantity Stock.">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <input type="submit" name="btn_insert" class="btn btn-success" value="Create Products">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>ProductName</th>
                    <th>Picture</th>
                    <th>Category</th>
                    <th>ProductDescription</th>
                    <th>Price</th>
                    <th>QuantityStock</th>
                    <th>EditProducts</th>
                    <th>DeleteProducts</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $text = null;
                if (isset($_POST["search"])) {
                  $text = $_POST["search"];
                }
                $query = "SELECT * FROM Products WHERE ProductName 
                          LIKE '%" . $text . "%' OR Category LIKE '%" . $text . "%' OR ProductDescription LIKE '%" . $text . "%'";

                $select_stmt = $db->prepare($query);
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $row["ProductID"]; ?></td>
                        <td><?php echo $row["ProductName"]; ?></td>
                        <td><img style='width:70px;' src="<?php echo $row["Picture"]; ?>"></td>
                        <td><?php echo $row["Category"]; ?></td>
                        <td><?php echo $row["ProductDescription"]; ?></td>
                        <td><?php echo $row["Price"]; ?></td>
                        <td><?php echo $row["QuantityStock"]; ?></td>
                        <td><a href="edit.php?update_id=<?php echo $row["ProductID"]; ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="?delete_id=<?php echo $row["ProductID"]; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>