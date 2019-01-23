<?php require APPROOT . '/views/inc/header.php';
// change the object to an array since the keys may contain a dot ('.')
$r = (array)$data['~record~'];
?><a href="<?php echo URLROOT; ?>" class="btn btn-light mb-3">
    <i class="fa fa-backward" aria-hidden="true"></i> Back
</a>
<br>
<h1><?php echo $r['field1']->field1; ?></h1>
<p><?php echo $r['field2']->field2; ?></p>
<?php if($r['created_by'] == $_SESSION['user_id']) : ?>
  <hr>
  <a class="btn btn-dark"
     href="<?php echo URLROOT; ?>/~record~/edit/<?php echo $r['id']; ?>">Edit
  </a>

    <form class="float-sm-right"
        action="<?php echo URLROOT; ?>/people/delete/<?php echo $r['id']; ?>"
        method="post">
    <input type="submit" class="btn btn-danger" value="Delete">
    </form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>