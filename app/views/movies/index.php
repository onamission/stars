<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
    <h1>Movies</h1>
    </div>
    <div class="col-md-6">
        <a class="btn btn-primary pull-right"
           href="<?php echo URLROOT; ?>/movies/add"><i
                class="fas fa-pencil-alt" aria-hidden="true"></i> Add Movie
        </a>
    </div>
</div>
<table class="table table-striped table-border">
    <thead>
        <tr>
            <th>Title</th>
            <th>Year Released</th>
            <th>Synopsis</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($data['movie'] as $record) : ?>
    <tr>
        <td><?php echo $record->title; ?></td>
        <td><?php echo $record->year_released; ?></td>
        <td><?php echo $record->synopsis; ?></td>
        <td>
            <span  class="text-nowrap">
                <a class="btn btn-primary-outline charcoal"
                href="<?php echo URLROOT; ?>/movies/detail/<?php echo $record->id; ?>"
                title="View Details">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-primary-outline charcoal"
                href="<?php echo URLROOT; ?>/movies/edit/<?php echo $record->id; ?>"
                title="Edit">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                </a>
                <form class="inline"
                        action="<?php echo URLROOT; ?>/movies/delete/<?php echo $record->id; ?>"
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