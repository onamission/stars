<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light">
    <i class="fa fa-backward" aria-hidden="true"></i> Back
</a>
<div class="card card-body bg-light mt-5">
    <h2>Add Responsibility</h2>
    <p>Add a new Responsibility with this form</p>
    <form action="<?php echo URLROOT; ?>/responsibilities/add" method="post">
        <?php require APPROOT . '/views/responsibilities/form.php'; ?>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>