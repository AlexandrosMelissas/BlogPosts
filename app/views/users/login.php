<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="center">
        <form action="<?php echo URLROOT; ?>/users/login" method="POST" class="form">
        <div class="form-group">
        <h2 class="form-heading">Sign in</h2>

        </div>
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input name="email" type="email" id="email" value="<?php echo $data['email'] ?>" class="form-input <?php ($data['name_err'] != '') ? print 'invalid' : '' ?>">
                <span class="invalid-message"><?php echo $data['email_err'] ?></span>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input name="password" type="password" id="password" value="<?php echo $data['password'] ?>" class="form-input <?php ($data['password_err'] != '') ? print 'invalid' : '' ?>">
                <span class="invalid-message"><?php echo $data['password_err'] ?></span>

            </div>

                <input type="submit" class="form-submit" value="Sign in">
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>