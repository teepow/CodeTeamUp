<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $fillable = [
		'occupation',
		'location',
		'website',
		'github',
		'age',
		'language',
		'bio',
		'image'
	];

	public static function open(array $attributes)
	{
		return new static($attributes);
	}

	/**
	 * Profile belongs to user
	 * 
	 * @return BelongsTo
	 */
	 public function user()
	 {
	 	return $this->belongsTo('App\User');
	 }

	 /**
	  * Profile can have many languages
	  * 
	  * @return belongsToMany
	  */
	 public function languages()
	 {
	 	return $this->belongsToMany('App\Language');
	 }

}
