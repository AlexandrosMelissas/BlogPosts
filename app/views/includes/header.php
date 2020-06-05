<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP App</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>
<body>

<nav class="navigation">
    <ul class="navigation_list">
    <li class="navigation_item"><a href="<?php echo URLROOT; ?>/posts/all" class="navigation_link">Posts</a></li>
        <?php if(isset($_SESSION['user_id']))  : ?>
            <li class="navigation_item"><a href="<?php echo URLROOT; ?>/posts/new" class="navigation_link">New Post</a></li>
            <li class="navigation_item"><a href="<?php echo URLROOT; ?>/users/logout" class="navigation_link">Logout</a></li>
        <?php else : ?>
        
        <li class="navigation_item"><a href="<?php echo URLROOT; ?>/users/login" class="navigation_link">Login</a></li>
        <li class="navigation_item"><a href="<?php echo URLROOT; ?>/users/register" class="navigation_link">Sign up</a></li>
        <?php endif; ?>
    </ul>
</nav>

<div class="section">

    
