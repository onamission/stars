<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light mb-3">
    <i class="fa fa-backward" aria-hidden="true"></i> Back
</a>
<br>
<h1><?php echo $data['people']->name; ?></h1>
<h4><?php echo $data['people']->nickname; ?></h4>
<p><?php echo $data['people']->dob; ?></p>

<?php if($data['people']->created_by == $_SESSION['user_id']) : ?>
  <hr>
  <a class="btn btn-dark"
     href="<?php echo URLROOT; ?>/people/edit/<?php echo $data['people']->id; ?>">Edit
  </a>

  <form class="float-sm-right"
        action="<?php echo URLROOT; ?>/people/delete/<?php echo $data['people']->id; ?>"
        method="post">
    <input type="submit" class="btn btn-danger" value="Delete">
  </form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>