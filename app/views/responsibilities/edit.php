<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light">
    <i class="fa fa-backward" aria-hidden="true"></i> Back
</a>
<div class="card card-body bg-light mt-5">
    <h2>Update Responsibility</h2>
    <p>Update Responsibility data using this form</p>
    <form action="<?php echo URLROOT . "/responsibilities/edit/{$data['id']}"; ?>" method="post">
        <?php require APPROOT . '/views/responsibilities/form.php'; ?>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>