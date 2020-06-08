<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="post-section">
<div class="posts">
<h1><?php echo 'Searched for "' . $_GET['query'] . '"' ?></h1>
 <?php  foreach($data as $post):  ?>
    <div class="post">
        <img class="post_image" src="<?php echo URLROOT; ?>/img/man-2.jpg">
        <div class="post_content">
        <ion-icon size="small" name="person"></ion-icon><span class="post_author"><?php echo $post->author ?></span><br/>
        <ion-icon size="small" name="calendar"></ion-icon><span class="post_createdat"><?php echo $post->created_at ?></span>
            <h1 class="post_title"><?php echo $post->title ?></h1>
            <p class="post_body"><?php echo $post->body ?> . . .</p>
            <a href="<?php echo URLROOT; ?>/posts/post/<?php echo $post->id ?>" class="post_button post_button-read">Read More</a>
        </div>
    </div>
<?php endforeach ?>
</div>
<?php require APPROOT . '/views/includes/sidebar.php'; ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>
</div>

