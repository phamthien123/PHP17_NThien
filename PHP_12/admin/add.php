<?php
require_once 'connect.php';
require_once 'libs/Form.php';
require_once 'libs/Validate.php';

    if (isset($_POST['btn-save'])) {
        $link = $_POST['link'];
        $status = $_POST['status'];
        $Ordering = $_POST['Ordering'];
        if (!empty($link) && !empty($status) && !empty($Ordering)) {
            $inSert = "INSERT INTO `rss`(`link`, `status`, `ordering`) VALUES ('$link', '$status', '$Ordering')";
            $result = $database->query($inSert);
        }
    }

$arrOptions = ['default' => '- select active -', 'active' => 'active', 'inactive' => 'inactive'];
$arrElement = [
    [
        'label' => Form::label('link'),
        'element' => Form::input('link')
    ],
    [
        'label' => Form::label('status'),
        'element' => Form::SelectBox('status', $arrOptions)
    ],
    [
        'label' => Form::label('Ordering'),
        'element' => Form::input('Ordering')
    ]
];
$inputToken = Form::hidden('token', time());
$html = '';
foreach ($arrElement as $key => $value) {
    $html .= '<div class="form-group">' . $value['label'] . $value['element'] . '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once './html/head.php' ?>

<body style="background-color: #eee;">
    <div class="container pt-5">
        <form action="" method="post">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0">ADD RSS</h4>
                </div>
                <div class="card-body">
                    <?= $html ?>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="btn-save">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <?php require_once './html/script.php' ?>
</body>

</html>