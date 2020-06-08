<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogPosts</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>
<body>
<div class="main_container">

<nav class="navigation">
    <ul class="navigation_list">
    <li class="navigation_item"><a href="<?php echo URLROOT; ?>/posts/all" class="navigation_link">BlogPosts</a></li>

    <div class="navigation_items">
    <li class="navigation_item"><a href="<?php echo URLROOT; ?>/posts/all" class="navigation_link">Posts</a></li>
        <?php if(isset($_SESSION['user_id']))  : ?>
            <li class="navigation_item"><a href="<?php echo URLROOT; ?>/posts/new" class="navigation_link">New Post</a></li>
            <li class="navigation_item navigation_name">
                <span class="navigation_link">
                    <ion-icon size="small" style="margin-right:.3rem;" name="person">
                </ion-icon><?php echo $_SESSION['user_name']?>
                <ion-icon size="small" name="chevron-down"></ion-icon>
            </span>
            <div  class="navigation_logout">
                <a href="<?php echo URLROOT; ?>/users/logout" style="color:#333;!important" class="navigation_link"><ion-icon size="small" style="margin-right:.2rem;" name="log-out"></ion-icon>Logout</a>
            </div>
        </li>
        <?php else : ?>
        
        <li class="navigation_item"><a href="<?php echo URLROOT; ?>/users/login" class="navigation_link">Login</a></li>
        <li class="navigation_item"><a href="<?php echo URLROOT; ?>/users/register" class="navigation_link">Sign up</a></li>
        <?php endif; ?>
    
    </div>
   
    </ul>
</nav>

<div class="main">



    
