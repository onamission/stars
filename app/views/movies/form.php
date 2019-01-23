<div class="form-group">
    <label>Title:<sup>*</sup></label>
    <input type="text" name="title"
           class="form-control form-control-lg
               <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['title']; ?>"
            placeholder="Add a title...">
    <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
</div>
<div class="form-group">
    <label>Year Released:</label>
    <input type="text" name="year_released"
           class="form-control form-control-lg
               <?php echo (!empty($data['year_released_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['year_released']; ?>"
            placeholder="Add a year released...">
    <span class="invalid-feedback"><?php echo $data['year_released_err']; ?></span>
</div>
<div class="form-group">
    <label>Synopsis:</label>
    <textarea name="synopsis" class="form-control form-control-lg
        <?php echo (!empty($data['synopsis_err'])) ? 'is-invalid' : ''; ?>"
        placeholder="Add synopsis..."><?php echo $data['synopsis']; ?></textarea>
    <span class="invalid-feedback"><?php echo $data['synopsis_err']; ?></span>
</div>
<div class="form-group">
    <input type="hidden" name="created_by"
           class="form-control form-control-lg"
            value="<?php echo $data['created_by']; ?>">
</div>
<div class="form-group">
    <input type="hidden" name="updated_by"
           class="form-control form-control-lg"
            value="<?php echo $data['updated_by']; ?>">
</div>
<div class="form-group">
    <input type="hidden" name="updated_by"
           class="form-control form-control-lg"
            value="<?php echo $data['updated_by']; ?>">
</div>
