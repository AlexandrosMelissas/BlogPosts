<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="single-post">
        <ion-icon size="small" name="person"></ion-icon><span class="post_author"><?php echo $data->author ?></span><br/>
        <ion-icon size="small" name="calendar"></ion-icon><span class="post_createdat"><?php echo $data->created_at ?></span>
        <h1 class="post_title"><?php echo $data->title ?></h1>
        <p class="post_body"><?php echo $data->body ?></p>
    <?php if(isset($_SESSION['user_id'])) : ?>
    <?php if($this->isAuthor($_SESSION['user_id'], $data->author_id)): ?>
    <a href="<?php echo URLROOT; ?>/posts/delete/<?php echo $data->id; ?>" class="post_button post_button-delete">Delete</a>
    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data->id; ?>" class="post_button post_button-edit">Edit</a>
    <?php endif ?>
    <?php endif ?>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
