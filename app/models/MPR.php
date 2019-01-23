<?php
/**
 * MPR model
 *
 * @author tturnquist
 */
class MPR extends Model {
    public function __construct() {
        parent::__construct();
        $this->viewTableName = 'movie_person_responsibility mpr '
                . 'JOIN movie m ON mpr.movie_id = m.id '
                . 'JOIN person p ON mpr.person_id = p.id '
                . 'JOIN responsibility r ON mpr.responsibility_id = r.id';
        $this->viewFields = 'mpr.id, mpr.movie_id, mpr.person_id, mpr.responsibility_id,'
                . 'm.title, p.name, r.name, mpr.created_by, mpr.updated_by, mpr.updated_date';
        $this->changeTableName = 'movie_person_responsibility';
        $this->changeFields = 'id, movie_id, person_id, responsibility_id, created_by, updated_by, updated_date';
    }

    protected function validFieldTypes(): array {
        return [
            'mpr.id' => 'integer',
            'mpr.movie_id' => 'integer',
            'mpr.person_id' => 'integer',
            'mpr.responsibility_id' => 'integer',
            'mpr.created_by' => 'integer',
            'mpr.updated_by' => 'integer',
            'mpr.updated_date' => 'date',
        ];
    }
}
