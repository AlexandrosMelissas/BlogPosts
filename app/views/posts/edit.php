<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="center">
<form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data->id; ?>" method="POST" class="edit_form">
    <div class="form-group">
    <h1 class="edit_heading">Title</h1>
    <input name="title" class="edit_form-input" type="text" value="<?php echo $data->title; ?>">
    </div>
    <h1 class="edit_heading">Body</h1>
    <textarea name="body" class="edit_body form-input" elastic type="text"><?php echo $data->body; ?></textarea>
    <input class="edit_form-submit" type="submit" value="Save">
</form>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>