<?php
include("../../path.php"); ?>
<?php require(ROOT_PATH . "/app/database/connection.php"); ?>

<?php
if(isset($_GET['tag_id'])){
    $tag_id = $_GET['tag_id'];

$query = "delete from `tags` where `tag_id` = '$tag_id'";
$result = mysqli_query($conn, $query);

if(!$result){
    die("nooo".mysqli_error());
} else {
    header('location: ' . BASE_URL . '/admin/tags/index.php?delmsg=حُذف التصنيف');
}
}

?>