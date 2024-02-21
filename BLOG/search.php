<?php
include("path.php")
?>
<?php include(ROOT_PATH . "/app/database/connection.php"); ?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="asset/css/style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&amp;family=Tajawal:wght@200;300;400;500;700;800;900&amp;display=swap" rel="stylesheet";400;500;700;800;900&amp;display=swap" rel="stylesheet">
    <title>كلية حريملاء التطبيقية | مجلة</title>
</head>
<body>
<?php include("app/includes/header.php") ?>

<div class="content clearfix">

<h2>نتائج البحث</h2>
<?php
if(isset($_POST['go'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $query = "select * from `posts` where `title` like '%$search%' or `content` like '%$search%' or `author` like '%$search%' or `created_at` like '%$search%' or `tag_name` like '%$search%'";
    $result = mysqli_query($conn, $query);
    $queryResult = mysqli_num_rows($result);

    if($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)){ ?>
            <div class="post">
                <div class="post-preview">
                    <h4><a href="single.php?post_id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a></h4>
                    <i class="fa-solid fa-user-pen"></i><span><?php echo $row['author']; ?></span>
                    &nbsp;
                    <i class="fa-regular fa-calendar-days"></i><span><?php echo date("Y-m-d",strtotime($row['created_at'])); ?></span>
                    &nbsp;
                    <i class="fa-solid fa-newspaper"></i><span><?php echo $row['tag_name']; ?></span>
                    <p class="preview-text"><?php echo mb_strimwidth($row['content'], 0, 150, "..."); ?></p>
                    <button name="readmore"><a href="single.php?post_id=<?php echo $row['post_id']; ?>" class="btn">استكمل القراءة</a></button>
                </div>
            </div>
        <?php }
    } else {
        header('location:index.php?fmsg=ما من نتائج تطابق ما بحثت عنه');
    }
}
?>
</div>
<?php include("app/includes/footer.php") ?>

<a class="to-top" href="#main" title="العودة إلى الأعلى">
    <i class="fa-solid fa-arrow-up"></i>
</a>
</body>
</html>