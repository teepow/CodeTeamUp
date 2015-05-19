<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $fillable = [
		'message',
		'receiver_id'
	];

	/**
	 * Message belongs to User
	 * 
	 * @return belongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public static function open(array $attributes)
	{
		return new static($attributes);
	}

}
