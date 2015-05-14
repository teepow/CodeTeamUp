<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $fillable = [
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
	 	return $this->belongsTo('User');
	 }

	 public function languages()
	 {
	 	return $this->belongsToMany('App\Language');
	 }

}
