<?php
/**
 * Movie model
 *
 * @author tturnquist
 */
class Movie extends Model {
    public function __construct() {
        parent::__construct();
        $this->viewTableName = 'movie';
        $this->viewFields = 'id, title, year_released, synopsis, created_by, updated_by, updated_date';
        $this->changeTableName = 'movie';
        $this->changeFields = 'id, title, year_released, synopsis, created_by, updated_by, updated_date';
    }

    protected function validFieldTypes(): array {
        return [
            'id' => 'integer',
            'title' => 'string',
            'year_released' => 'string',
            'synopsis' => 'string',
            'created_by' => 'integer',
            'updated_by' => 'integer',
            'updated_date' => 'date',
        ];
    }
}
