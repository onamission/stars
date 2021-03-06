<?php
    /*
     * Use this template to create a rough view for your app. To customize this,
     * change movie to be the name of your controller.
     *
     * Customize the UI by changing the class names to match Bootstrap or custom
     * CSS classes.
     */
?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light">
    <i class="fa fa-backward" aria-hidden="true"></i> Back
</a>
<div class="card card-body bg-light mt-5">
    <h2>Add Movie</h2>
    <p>Create a movie with this form</p>
    <form action="<?php echo URLROOT . "/movies/edit/{$data['id']}"; ?>" method="post">
        <?php require APPROOT . '/views/movies/form.php'; ?>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>