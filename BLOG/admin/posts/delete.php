<?php
include("../../path.php"); ?>
<?php require(ROOT_PATH . "/app/database/connection.php"); ?>

<?php
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];

$query = "delete from `posts` where `post_id` = '$post_id'";
$result = mysqli_query($conn, $query);

if(!$result){
    die("nooo".mysqli_error());
} else {
    header('location: ' . BASE_URL . '/admin/posts/index.php?delmsg=حُذف المنشور');
}
}

?>