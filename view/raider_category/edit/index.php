<?php
    session_start();
    include '../../../config/index.php';
    error_reporting(0);

    if (!isset($_SESSION['admin'])) {
        header('location:../../../index.php');
    }

    $categoryId = $_COOKIE['category_id'];

    $categoryData = $db->prepare('SELECT * FROM raider_category WHERE id=?');
    $categoryData->execute(array($categoryId));
    $rowCategory = $categoryData->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>

    <title>攻略管理</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <?php include '../../../include/css/mandatory/index.php' ?>

    <link href="../../../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="../../../assets/plugins/froiden-helper/helper.css" rel="stylesheet" type="text/css" />
    <?php include '../../../include/css/global/index.php' ?>
</head>

</style>
<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
<?php include '../../../include/header/index.php'; ?>
<div class="page-container">
    <?php include '../../../include/sidebar/index.php'; ?>
    <div class="page-content-wrapper">
        <div class="page-content">
            <form id="categoryUpdate" enctype="multipart/form-data">
                <div class="portlet light bordered">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input type="hidden" name="id" value="<?php echo $rowCategory['id'] ?>">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="name">攻略类别名称 : </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name" class="form-control input-sm" data-required="true"
                                    value="<?php echo $rowCategory['Category_Name'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-md-line-input form-md-floating-label">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="sort">排序 : </label>        
                            </div>
                            <div class="col-sm-9">
                                <input type="number" id="sort" name="sort" class="form-control input-sm"
                                    data-required="true" value="<?php echo $rowCategory['Sort'] ?>" min = "1" max="100">        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" onclick="back();return false">返回</button>
                    <button type="submit" class="btn green btn-outline" name="submit" onclick="updateCategory();return false">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../../../include/footer/index.php' ?>
<?php include '../../../include/footerjs/index.php' ?>
<script src="../../../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="../../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../../../assets/plugins/froiden-helper/helper.js" type="text/javascript"></script>
<script src="//cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
<script>
    
    function back() {
        window.location.href = "../table/index.php";
    }

    function updateCategory() {
        $.easyAjax({
            type: "POST",
            url: "../../../ajax/raider_category/edit/index.php",
            container: "#categoryUpdate",
            file:true,
            success: function(response) {
                if (response.status == "success") {
                    console.log("Success");
                    window.location.href = "../table/index.php";
                }
            }
        });
    }
</script>
</body>
</html>
