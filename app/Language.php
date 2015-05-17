<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {

	protected $fillable = [
		'name'
	];

	/**
	 * Language belongs to many profiles
	 * 
	 * @return belongsToMany
	 */
	public function profiles()
	{
		return $this->belongsToMany('App\Profile');
	}

}
