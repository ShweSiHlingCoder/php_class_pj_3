<?php 
include("../functions.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = delete_post($id);
    if($delete){
        header('Location: ../admin/post_index.php?delete_succee=true');
    } else {
        echo "Error";
    }
}