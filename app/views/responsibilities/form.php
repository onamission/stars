<?php
?>
<div class="form-group">
    <label>Name:<sup>*</sup></label>
    <input type="text" name="name"
           class="form-control form-control-lg
               <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['name']; ?>"
            placeholder="Add a Name...">
    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
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
    <input type="hidden" name="updated_date"
           class="form-control form-control-lg"
            value="<?php echo $data['updated_date']; ?>">
</div>
