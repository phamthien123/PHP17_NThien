<?php
require_once 'connect.php';
require_once 'libs/Helper.php';
$query = "SELECT * FROM `rss`";
$result = $database->listRecord($query);
$html = "";
foreach ($result as $value) {
    $id     = $value['id'];
    $link   = $value['link'];
    $status = $value['status'];
    $ordering = $value['ordering'];
    // $class  = ($status == "active") ? 'btn btn-sm btn-success' : 'btn btn-sm btn-danger';
    // $icon   = ($status == "active") ? 'fas fa-check' : 'fas fa-minus';
    $status = Helper::itemStatus($id, $value['status']);
    $html .= sprintf('
<tr>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
    <td>
        <a href="form.php?id=%s" class="btn btn-sm btn-warning">Edit</a>
        <a href="delete.php?id=%s" class="btn btn-sm btn-danger btn-delete remove">Delete</a>  
    </td>
</tr>', $id, $link, $id, $status, $ordering, $id, $id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './html/head.php' ?>
</head>

<body style="background-color: #eee;">
    <div class="container pt-5">
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between">
                <a href="../index.php" class="btn btn-primary m-0">Back to website</a>
                <a href="logout.php" class="btn btn-info m-0">Logout</a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Enter search keyword...." value="">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-md btn-outline-primary m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Search</button>
                            <a href="list.php" class="btn btn-md btn-outline-danger m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Clear</a>
                        </div>
                    </div>
                    <!-- Search: -->
                    <?php
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        if ($search == "") {
                            echo "hãy nhập nào";
                        } else {
                            $sqlSearch = "SELECT * FROM `rss` WHERE `link` LIKE '" . $search . "'";
                            $s = $database->query($sqlSearch);
                            $count = mysqli_num_rows($s);
                            if ($count <= 0) {
                                echo "k tìm thấy từ khóa, <b>" . $search . "</b>";
                            } else {
                                echo "Tìm thấy $count kết quả từ khóa, <b>" . $search . "</b>";
                            }
                        }
                    } ?>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="m-0">RSS List</h4>
                <a href="add.php" class="btn btn-success m-0">Add</a>
            </div>
            <div class="card-body">
                <table class="table table-striped btn-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Link</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ordering</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $html ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once './html/script.php' ?>
</body>

</html>