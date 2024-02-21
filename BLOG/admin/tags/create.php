<?php
include("../../path.php")
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&amp;family=Tajawal:wght@200;300;400;500;700;800;900&amp;display=swap" rel="stylesheet">
    <title>مركز الإدارة</title>
</head>
<body>

<?php include(ROOT_PATH . "/app/includes/adminHeader.php") ?>

    <!--LEFT SIDDE BAR-->
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php") ?>
    <!--LEFT SIDDE BAR-->

<!--ADMIN WRAPPER-->
<div class="admin-wrapper">

   <!--ADMIN CONNTENT-->
   <div class="admin-content">

    <!--CONTENT-->
    
    <!--BUTTON GROUP-->
    <div class="button-group">
        <a href="index.php" class="add-btn">عودة</a>
    </div>
    <!--BUTTON GROUP-->

    <div class="content">
        <h2 class="page-title">إضافة تصنيف</h2>

        <form action="tags.php" method="post">
        <div>
            <input type="hidden" name="post_id">
        </div>
    <div>
        <label for="tag_name">اسم التصنيف</label>
        <input type="text" name="tag_name" class="text-input" maxlength="20" required>
    </div>

    <div>
        <button type="submit" name="add-tags" value="add">
            تأكيد
        </button>
    </div>
    </form>
    <?php
    if(isset($_GET['dupmsg'])){
  echo "<h4>".$_GET['dupmsg']."</h4>";
}
?>
    <?php
    if(isset($_GET['sucmsg'])){
  echo "<h4>".$_GET['sucmsg']."</h4>";
}
?>
    <?php
    if(isset($_GET['fmsg'])){
  echo "<h4>".$_GET['fmsg']."</h4>";
}
?>

    </div>
    <!--CONTENT-->

    </div>
    <!--ADMIN CONNTENT-->

</div>
<!--ADMIN WRAPPER-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script src="../../scripts.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
</html>