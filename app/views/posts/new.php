<?php require APPROOT . '/views/includes/header.php'; ?>
<form action="<?php echo URLROOT; ?>/posts/new/" method="POST" class="edit_form">
    <div class="form-group">
    <h1 class="edit_heading">Title</h1>
    <input name="title" class="form-input" placeholder="Insert title" type="text">
    </div>
    <h1 class="edit_heading">Body</h1>
    <textarea name="body" class="edit_body form-input" placeholder="Insert body" elastic type="text"></textarea>
    <input class="form-submit" type="submit" value="Create">
</form>
<?php require APPROOT . '/views/includes/footer.php'; ?>