<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light mb-3">
    <i class="fa fa-backward" aria-hidden="true"></i> Back
</a>
<br>
<h1><?php echo $data['movie']->title; ?></h1>
<h4><?php echo $data['movie']->year_released; ?></h4>
<p><?php echo $data['movie']->synopsis; ?></p>

<?php if($data['movie']->created_by == $_SESSION['user_id']) : ?>
  <hr>
  <a class="btn btn-dark"
     href="<?php echo URLROOT; ?>/movies/edit/<?php echo $data['movie']->id; ?>">Edit
  </a>

  <form class="float-sm-right"
        action="<?php echo URLROOT; ?>/movies/delete/<?php echo $data['movie']->id; ?>"
        method="post">
    <input type="submit" class="btn btn-danger" value="Delete">
  </form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>