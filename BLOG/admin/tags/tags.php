<?php
include("../../path.php");
include(ROOT_PATH . "/app/database/connection.php");

if(isset($_POST['add-tags'])){
    $tag_name = $_POST['tag_name'];

    $checktag = "select * from tags where tag_name = '$tag_name'";
    $result = mysqli_query($conn , $checktag);
    $duplicate = mysqli_num_rows($result);
    if($duplicate > 0) {
        header('location: ' . BASE_URL . '/admin/tags/create.php?dupmsg=أدخل اسمًا آخرًا');
    } else {
$query = "insert into `tags` (`tag_name`) values ('$tag_name')";
if($conn->query($query)){
    header('location: ' . BASE_URL . '/admin/tags/index.php?sucmsg=!أُضيف التصنيف');
} else {
    header('location: ' . BASE_URL . '/admin/tags/create.php?fmsg=ثَمَّ خطأ');
}
}
}

if(isset($_POST['edit-tags'])){

    if(isset($_GET['id_new'])){
      $id_new = $_GET['id_new'];
    }
    
    $tag_name = $_POST['tag_name'];
  
    $checktag = "select * from tags where tag_name = '$tag_name'";
    $result = mysqli_query($conn , $checktag);
    $duplicate = mysqli_num_rows($result);
    if($duplicate > 0) {
        header('location: ' . BASE_URL . '/admin/tags/create.php?dupmsg=أدخل اسمًا آخرًا');
    } else {
    $query = "update `tags` SET `tag_name` = '$tag_name' WHERE `post_id`= '$id_new'";
    $result = mysqli_query($conn, $query);
    if(!$result){
      header('location: ' . BASE_URL . '/admin/posts/edit.php?dupmsg=ثَمَّ خطأ');
    } else {
      header('location: ' . BASE_URL . '/admin/posts/index.php?sucmsg=!عُدِّل التصنيف');
    }
      }
    }

/*$result = mysqli_query($conn, $query);

if(!$result) {
    header('location: ' . BASE_URL . '/admin/tags/create.php?message=insert valid data');
    mysqli_error($conn);
}else{
    header('location: ' . BASE_URL . '/admin/tags/index.php?insert_msg=insert valid data');
}


/*if(isset($_POST['add-tags'])){
    $tag_name = $_POST['tag_name'];

    $query = "insert into `tags` (`tag_name`) values ('$tag_name')";

    $result = mysqli_query($conn, $query);
    header('location: ' . BASE_URL . '/admin/tags/index.php?message=Inserted');
} if($tag_name == "" || empty($tag_name)){

}

/*include(ROOT_PATH . "/app/database/db.php");

if(isset($_POST['add-tags']))
unset($_POST['add-tags']);

$data = create('tags', $_POST);
header('location: ' . BASE_URL . '/admin/tags/index.php');
exit();*/
?>