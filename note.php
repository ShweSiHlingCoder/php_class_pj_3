<?php 

   include("functions.php");
  
    $query = $link->query("SELECT * FROM posts.*, users.user_name As name, 
    categories.category_name As cat_name FROM posts 
    INNER JOIN users ON posts.user_id = users.id 
    INNER JOIN categories ON posts.category_id = categories.id");
    // number of posts
    $num_posts = $query->num_rows;
    $num_per_pages = 6;
    $num_pages = ceil($num_posts/$num_per_pages);
    if(isset($_GET['page'])){
      $page = $_GET['page'];    
    }else{  
      $page = 1;
    }
    $offset = ($page-1)*$num_per_pages;
    $query = $link->query("SELECT * FROM posts.*, users.user_name As name, 
    categories.category_name As cat_name FROM posts 
    INNER JOIN users ON posts.user_id = users.id 
    INNER JOIN categories ON posts.category_id = categories.id 
    ORDER BY posts.id DESC LIMIT $offset, $num_per_pages");
   ?>