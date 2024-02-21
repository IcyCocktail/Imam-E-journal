<?php
include("../../path.php");?>
<?php include(ROOT_PATH . "/app/database/connection.php"); ?>
<?php
if(isset($_POST['add_post'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    $query = "insert into `posts` (`title`, `content`, `author`) values ('$title', '$content', '$author')";
    
    $result = mysqli_query($conn, $query);
    if(!$result){
      header('location: ' . BASE_URL . '/admin/posts/create.php?fmsg=ثَمَّ خطأ');
  } else {
    header('location: ' . BASE_URL . '/admin/posts/index.php?succmsg=!أُضيف المنشور');
  }
}

if(isset($_POST['edit-post'])){

  if(isset($_GET['id_new'])){
    $id_new = $_GET['id_new'];
  }
  
  $title = $_POST['title'];
  $author = $_POST['author'];
  $content = $_POST['content'];

  $query = "update `posts` SET `title` = '$title',`author` = '$author', `content` = '$content' WHERE `post_id`= '$id_new'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    header('location: ' . BASE_URL . '/admin/posts/edit.php?dupmsg=ثَمَّ خطأ');
  } else {
    header('location: ' . BASE_URL . '/admin/posts/index.php?sucmsg=!عُدِّل المنشور');
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