<?php require APPROOT . '/views/inc/header.php';
// change the object to an array since the keys may contain a dot ('.')
$r = (array)$data['mprs'];
?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light mb-3">
    <i class="fa fa-backward" aria-hidden="true"></i> Back
</a>
<br>
<h1><?php echo $r['m.title']; ?></h1>
<h4><?php echo $r['p.name']; ?></h4>
<p><?php echo $r['r.name']; ?></p>

<?php if($r['mpr.created_by'] == $_SESSION['user_id']) : ?>
  <hr>
  <a class="btn btn-dark"
     href="<?php echo URLROOT; ?>/mprs/edit/<?php echo $r['mpr.id']; ?>">Edit
  </a>

  <form class="float-sm-right"
        action="<?php echo URLROOT; ?>/mprs/delete/<?php echo $r['mpr.id']; ?>"
        method="post">
    <input type="submit" class="btn btn-danger" value="Delete">
  </form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>