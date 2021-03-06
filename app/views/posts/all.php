<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="post-section">
<div class="posts">
<h1>Latest Posts</h1>
 <?php  foreach($data['data'] as $post):  ?>
    <div class="post">
        <img class="post_image" src="<?php echo $post->image ?>" alt="">
        <div class="post_content">
        <ion-icon size="small" name="person"></ion-icon><span class="post_author"><?php echo $post->author ?></span><br/>
        <ion-icon size="small" name="calendar"></ion-icon><span class="post_createdat"><?php echo $post->created_at ?></span>
            <h1 class="post_title"><?php echo $post->title ?></h1>
            <p class="post_body"><?php echo $post->body ?> . . .</p>
            <a href="<?php echo URLROOT; ?>/posts/post/<?php echo $post->id ?>" class="post_button post_button-read">Read More</a>
        </div>
    </div>
<?php endforeach ?>
<!---- Pagination Buttons --->
    <div class="pagination_container">
        <?php for($i = 1;$i<=$data['total_pages'];$i++): ?>
            <a class="pagination_button <?php if($data['current_page'] == $i){ echo 'pagination_active' ;} ?>" 
            href="<?php echo URLROOT; ?>/posts/page/<?php echo $i ?>">
            <?php echo $i ?>
        </a>
        <?php  endfor ?>
    </div>
</div>
<?php require APPROOT . '/views/includes/sidebar.php'; ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>
</div>

