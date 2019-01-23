<?php
/**
 * Person model
 *
 * @author tturnquist
 */
class Person extends Model {
    public function __construct() {
        parent::__construct();
        $this->viewTableName = 'person';
        $this->viewFields = 'id, name, nickname, dob, created_by, updated_by, updated_date';
        $this->changeTableName = 'person';
        $this->changeFields = 'id, name, nickname, dob, created_by, updated_by, updated_date';
    }

    protected function validFieldTypes(): array {
        return [
            'id' => 'integer',
            'name' => 'string',
            'nickname' => 'string',
            'dob' => 'date',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'updated_date' => 'date',
        ];
    }
}
