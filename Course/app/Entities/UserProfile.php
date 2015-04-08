<?php namespace Course\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model{
    protected $table = 'user_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bio', 'birthdate', 'twitter', 'website', 'user_id'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthdate)->age;
    }
}
