<?php
include("path.php")
?>
<?php include(ROOT_PATH . "/app/database/connection.php"); ?>

<?php

$post_id = $_GET['post_id'];

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&amp;family=Tajawal:wght@200;300;400;500;700;800;900&amp;display=swap" rel="stylesheet">
    <title>منشور</title>
</head>
<body>

<?php include("app/includes/header.php") ?>

<!--PAGE WRAPPER-->
<div class="page-wrapper">

<!--CONTENT-->
<div class="content clearfix">

    <!--MAIN CONTENT-->
    <?php
        $post_id = $_GET['post_id'];
            $query = "SELECT `post_id`, `title`, `content`, `author`, `tag_name`, `created_at` FROM `posts` where `post_id` = '$post_id'";
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("query failed" . mysqli_error());
            } else {
                while($row = mysqli_fetch_assoc($result)){
                    ?>
    <div class="main-content">
        <h1 class="post-title"><?php echo $row['title']; ?></h1>
        <div class="icons">
        <i class="fa-solid fa-user-pen"></i><span><?php echo $row['author']; ?></span>
        &nbsp;
        <i class="fa-regular fa-calendar-days"></i><span><?php echo date("Y-m-d",strtotime($row['created_at'])); ?></span>
        &nbsp;
        <i class="fa-solid fa-newspaper"></i><span><?php echo $row['tag_name']; ?></span>
        </div>
        <div class="post-content">
        <p><?php echo $row['content']; ?></p>
        </div>
    </div>
    <?php
                }
            }
            ?>
    <!--MAIN CONTENT-->

    <!--SIDE BAR-->
    <div class="side-bar">
        <div class="mini-trial"><h4><i class="fa-solid fa-tags"></i>التصنيفات</h4></div>
        <div class="all-tags">
            <ul>
            <li class="tag-type">:النوع</li>
            <?php
            $query = "select * from `tags`";
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("query failed" . mysqli_error());
            } else {
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                <li><a href="#"><?php echo $row['tag_name']; ?></a></li>
                <?php
                }
            }
            ?>
            </ul>
        </div>
    </div>
    <!--SIDE BAR-->



</div>
<!--CONTENT-->

</div>
<!--PAGE WRAPPER-->

<?php include("app/includes/footer.php") ?>

<a class="to-top" href="#main" title="العودة إلى الأعلى">
    <i class="fa-solid fa-arrow-up"></i>
</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="asset/js/scripts.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
</html>