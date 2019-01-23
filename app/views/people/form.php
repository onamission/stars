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
    <label>Nickname:</label>
    <input type="text" name="nickname"
           class="form-control form-control-lg
               <?php echo (!empty($data['nickname_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['nickname']; ?>"
            placeholder="Add this person's nickname...">
    <span class="invalid-feedback"><?php echo $data['nickname_err']; ?></span>
</div>
<div class="form-group">
    <label>Date of Birth:</label>
    <input type="text" name="dob"
           class="form-control form-control-lg
               <?php echo (!empty($data['dob_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['dob']; ?>"
            placeholder="Date of birth (format YYYY/MM/DD)...">
    <span class="invalid-feedback"><?php echo $data['dob_err']; ?></span>
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
