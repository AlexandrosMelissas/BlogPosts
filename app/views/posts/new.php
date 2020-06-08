<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="center">
<form enctype="multipart/form-data" action="<?php echo URLROOT; ?>/posts/new/" method="POST" class="edit_form">
    <h1 class="edit_heading">Title</h1>
    <input name="title" class="edit_form-input" placeholder="Insert title" type="text" required>
    <h1 class="edit_heading">Body</h1>
    <textarea name="body" class="edit_body form-input" placeholder="Insert body" elastic type="text" required></textarea>
    <h1 class="edit_heading">Topic</h1>
    <select class="edit_form-input edit_form-select" required name="topic" id="">
    <option selected disabled value="">Choose a topic</option>
    <option value="1">Writing</option>
    <option value="2">Painting</option>
    <option value="3">Drawing</option>
    <option value="4">Music</option>
    <option value="5">Motivation</option>
    <option value="6">Inspiration</option>
    <option value="7">Life Lessons</option>
    </select>
    <h1 class="edit_heading">Image</h1>
    <input type="file" name="image" style="margin-bottom:2rem;font-size:1.3rem">
    <input class="edit_form-submit" type="submit" value="Create">
</form>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>