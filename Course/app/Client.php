<?php namespace Course;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

	/**
     * The relations of this model with other
     */

    public function company(){
        return $this->hasOne('Course\Company','id', 'company_id');
    }
}
