<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
    <h1>Casts (Movies / People / Roles)</h1>
    </div>
    <div class="col-md-6">
        <a class="btn btn-primary pull-right"
           href="<?php echo URLROOT; ?>/mprs/add"><i
                class="fas fa-pencil-alt" aria-hidden="true"></i> Add New Cast Combination
        </a>
    </div>
</div>
<table class="table table-striped table-border">
    <thead>
        <tr>
            <th>Movie</th>
            <th>Person</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($data['mprs'] as $record) : ?>
    <?php 
    // change the object to an array since the keys may contain a dot ('.')
    $r = (array)$record;
    ?>
    <tr>
        <td><?php echo $r["m.title"]; ?></td>
        <td><?php echo $r["p.name"]; ?></td>
        <td><?php echo $r["r.name"]; ?></td>
        <td>
            <span  class="text-nowrap inline">
                <a class="btn btn-primary-outline charcoal"
                href="<?php echo URLROOT; ?>/mprs/detail/<?php echo $r['mpr.id']; ?>"
                title="View Details">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-primary-outline charcoal"
                href="<?php echo URLROOT; ?>/mprs/edit/<?php echo $r['mpr.id']; ?>"
                title="Edit">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                </a>
                <form class="inline"
                        action="<?php echo URLROOT; ?>/mprs/delete/<?php echo $r['mpr.id']; ?>"
                        method="post">
                    <button type="submit" class="link-button" value='submit_value'>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </form>
            </span>
        </td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>