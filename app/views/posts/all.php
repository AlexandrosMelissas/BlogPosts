<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="posts">
 <?php  foreach($data as $post):  ?>
    <div class="post">
        <span class="post_author"><?php echo $post->author ?></span><br/>
        <span class="post_createdat"><?php echo $post->created_at ?></span>
        <h1 class="post_title"><?php echo $post->title ?></h1>
        <p class="post_body"><?php echo $post->body ?> . . .</p>
        <a href="<?php echo URLROOT; ?>/posts/post/<?php echo $post->id ?>" class="post_button post_button-read">Read More</a>
    </div>
<?php endforeach ?>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
