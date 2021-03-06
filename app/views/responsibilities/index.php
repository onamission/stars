<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
    <h1>Stars</h1>
    </div>
    <div class="col-md-6">
        <a class="btn btn-primary pull-right"
           href="<?php echo URLROOT; ?>/responsibility/add"><i
                class="fas fa-pencil-alt" aria-hidden="true"></i> Add Responsibility
        </a>
    </div>
</div>
<table class="table table-striped table-border">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($data['responsibilities'] as $record) : ?>
    <tr>
        <td><?php echo $record->name; ?></td>
        <td>
            <span  class="text-nowrap inline">
                <a class="btn btn-primary-outline charcoal"
                href="<?php echo URLROOT; ?>/responsibilities/detail/<?php echo $record->id; ?>"
                title="View Details">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-primary-outline charcoal"
                href="<?php echo URLROOT; ?>/responsibilities/edit/<?php echo $record->id; ?>"
                title="Edit">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                </a>
                <form class="inline"
                        action="<?php echo URLROOT; ?>/responsibilities/delete/<?php echo $record->id; ?>"
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