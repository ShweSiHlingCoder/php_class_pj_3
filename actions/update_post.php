<?php 
include("../functions.php");

$photo = $_FILES['photo']['name'];
$photo_tmp = $_FILES['photo']['tmp_name'];

$id = $_POST['id'];

$data = [
 'title' => $_POST['title'],
 'category_id' => $_POST['category_id'],
 'description' => strip_tags($_POST['description']),
 'photo' => $photo,
 //'old_photo' => $_POST['old_photo'],
 'user_id' => $_POST['user_id'],
];


// echo "<pre>";
// print_r($id);
// echo "</pre>";
// echo "<br>";
// echo "<pre>";
// print_r($data);
// echo "</pre>";

if (post_update($id, $data)) {
 // old image reupload
 if (empty($photo)) {
  $photo = $_POST['old_photo'];
  move_uploaded_file($photo_tmp, "post_img/$photo");
  header("Location: ../admin/post_index.php?success=true");
 } else {
  move_uploaded_file($photo_tmp, "post_img/$photo");
  header("Location: ../admin/post_index.php?success=true");
 }
 //header("Location: ../admin/post_index.php?update_success=true");
} else {
 echo "Cannot update post";
}