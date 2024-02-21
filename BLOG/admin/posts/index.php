<?php
include("../../path.php")
?>
<?php include(ROOT_PATH . "/app/database/connection.php"); ?>

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
    <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('متأكد من الحذف؟');
}
</script>
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
    <div class="content">
    <?php
    if(isset($_GET['sucmsg'])){
  echo "<h4>".$_GET['sucmsg']."</h4>";
}
?>
    <?php
    if(isset($_GET['succmsg'])){
  echo "<h4>".$_GET['succmsg']."</h4>";
}
?>
    <!--BUTTON GROUP-->
    <div class="button-group">
        <a href="create.php" class="add-btn">اكتب منشورًا</a>
    </div>
    <!--BUTTON GROUP-->

    <div class="content">
        <h2 class="page-title">إدارة المنشورات</h2>

        <table>
            <head>
                <th>الترتيب</th>
                <th>العنوان</th>
                <th>المؤلف</th>
                <th class="end-cell">الإجراء</th>
                <th class="end-cell">الإجراء</th>
                <th>الإجراء</th>
            </head>
            <tbody>

            <?php
            $query = "SELECT `post_id`, `title`, `content`, `author`, `tag_name` FROM `posts`";
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("query failed" . mysqli_error());
            } else {
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                <tr>
                    <td><?php echo $row['post_id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><a href="delete.php?post_id=<?php echo $row['post_id']; ?>" onclick="return confirm('متأكد من الحذف؟')"" class="delete">حذف</a></td>
                    <td><a href="#" class="pubish">نشر</a></td>
                    <td><a href="edit.php?post_id=<?php echo $row['post_id']; ?>" class="edit">تعديل</a></td>
                </tr>
                    <?php
                }
            }
            ?>
            
            </tbody>
        </table>
        
    <?php
    if(isset($_GET['delmsg'])){
  echo "<h4>".$_GET['delmsg']."</h4>";
}
?>

    </div>
    <!--CONTENT-->

    </div>
    <!--ADMIN CONNTENT-->

</div>
<!--ADMIN WRAPPER-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../scripts.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>
</html>