<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light mb-3">
    <i class="fa fa-backward" aria-hidden="true"></i> Back
</a>
<br>
<h1><?php echo $data['responsibilities']->name; ?></h1>

<?php if($data['responsibilities']->created_by == $_SESSION['user_id']) : ?>
  <hr>
  <a class="btn btn-dark"
     href="<?php echo URLROOT; ?>/responsibilities/edit/<?php echo $data['responsibilities']->id; ?>">Edit
  </a>

  <form class="float-sm-right"
        action="<?php echo URLROOT; ?>/responsibilities/delete/<?php echo $data['responsibilities']->id; ?>"
        method="post">
    <input type="submit" class="btn btn-danger" value="Delete">
  </form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>