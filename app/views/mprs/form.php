<div class="form-group">
    <label>Movie:<sup>*</sup></label>
    <select name="movie_id" class="form-control
        <?php echo (!empty($data['movie_id_err'])) ? 'is-invalid' : ''; ?>"
        >
        <?php echo buildDropdownOptions('Movie', 'id', 'title', $data['movie_id'], 'Select a Movie');?>
    </select>
    <span class="invalid-feedback"><?php echo $data['movie_id_err']; ?></span>
</div>
<div class="form-group">
    <label>Person:<sup>*</sup></label>
    <select name="person_id" class="form-control
        <?php echo (!empty($data['person_id_err'])) ? 'is-invalid' : ''; ?>"
        >
        <?php echo buildDropdownOptions('Person', 'id', 'name', $data['person_id'], 'Select a Person');?>
    </select>
    <span class="invalid-feedback"><?php echo $data['person_id_err']; ?></span>
</div>
<div class="form-group">
    <label>Role:<sup>*</sup></label>
    <select name="responsibility_id" class="form-control
        <?php echo (!empty($data['responsibility_id_id_err'])) ? 'is-invalid' : ''; ?>"
        >
        <?php echo buildDropdownOptions('Responsibility', 'id', 'name', $data['responsibility_id'], 'Select a Role');?>
    </select>
    <span class="invalid-feedback"><?php echo $data['responsibility_id_id_err']; ?></span>
</div>
<div class="form-group">
    <input type="hidden" name="created_by"
           class="form-control"
            value="<?php echo $data['created_by']; ?>">
</div>
<div class="form-group">
    <input type="hidden" name="updated_by"
           class="form-control"
            value="<?php echo $data['updated_by']; ?>">
</div>
<div class="form-group">
    <input type="hidden" name="updated_date"
           class="form-control"
            value="<?php echo $data['updated_date']; ?>">
</div>
<?php if (isset($data['id'])): ?>
<div class="form-group">
    <input type="hidden" name="id"
           class="form-control"
            value="<?php echo $data['id']; ?>">
</div>
<?php endif; ?>
