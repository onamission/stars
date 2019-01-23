<?php
/**
 * Responsibility model
 *
 * @author tturnquist
 */
class Responsibility extends Model {
    public function __construct() {
        parent::__construct();
        $this->viewTableName = 'responsibility';
        $this->viewFields = 'id, name, created_by, updated_by, updated_date';
        $this->changeTableName = 'responsibility';
        $this->changeFields = 'id, name, created_by, updated_by, updated_date';
    }

    protected function validFieldTypes(): array {
        return [
            'id' => 'integer',
            'name' => 'string',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'updated_date' => 'date'
        ];
    }
}
