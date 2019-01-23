<?php
/**
 * buildDropdownOptions
 * The purpose of this method is to create the dropdown options for an HTML
 *   SELECT element based on a data model
 *
 * @param string $model: The name of the model
 * @param string $valueField: The name of the field in each row to be used
 *                  as the return value for each option (usually the ID)
 * @param string $nameField: The name of the field in each row that will be
 *                  the display value
 * @param string $placeholder: The placeholder string if no default value
 * @return string
 */
function buildDropdownOptions($model, $valueField, $nameField, $defaultValue='', $placeholder='') {
    $modelPath = APPROOT . "/models/$model.php";
    if (!file_exists($modelPath)) {
        return '';
    }
    require_once $modelPath;
    $m = new $model();

    // validate that the model contains both fields
    if (strpos($m->getAttribute('viewFields'), $valueField)===false || 
            strpos($m->getAttribute('viewFields'), $nameField) == false) {
        return '';
    }
    // build the options
    $options = '';
    $rows = $m->fetchAll();
    if ($defaultValue == ''){
        $options = "\n<option value='' selected disabled hidden>$placeholder</option>";
    }
    foreach ($rows as $row){
        $default = $row->$valueField == $defaultValue ? " selected" : "";
        $options .= "\n<option value={$row->$valueField}$default>{$row->$nameField}</option>";
    }
    return $options;
}