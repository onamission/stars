<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
    <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a class="btn btn-primary pull-right"
           href="<?php echo URLROOT; ?>/posts/add"><i
                class="fas fa-pencil-alt" aria-hidden="true"></i> Add Post
        </a>
    </div>
</div>
<table class="table table-striped table-border">
    <thead>
        <tr>
            <th>Field1</th>
            <th>Field2</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($data['~record~'] as $record) : ?>
    <?php 
    // change the object to an array since the keys may contain a dot ('.')
    $r = (array)$record;
    ?>
    <tr>
        <td><?php echo $r["field1"]; ?></td>
        <td><?php echo $r["field2"]; ?></td>
        <td>
            <a  class="btn btn-primary-outline charcoal"
               href="<?php echo URLROOT; ?>/~record~/detail/<?php echo $r["id"]; ?>"
               title="View Details">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>
            <a  class="btn btn-primary-outline charcoal"
               href="<?php echo URLROOT; ?>/~record~/edit/<?php echo $r["id"]; ?>"
               title="Edit">
                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
            </a>
            <form class="inline"
                    action="<?php echo URLROOT; ?>/~record~/delete/<?php echo $r["id"]; ?>"
                    method="post">
                <button type="submit" class="link-button" value='submit_value'>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>