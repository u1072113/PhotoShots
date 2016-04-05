<?php namespace PhotoShots;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

	//Here is the name of the album table
	protected $table = 'albums';
	//These are the atributes for the model
	protected $fillable = ['id', 'title', 'description', 'user_id'];

	//If an album belongs to a user, the album must have the user_id as a foreign key.

	public function owner()
	{
		return belongsTo('PhotoShots\User');
	}

	public function photos()
	{
		return hasMany('PhotoShots\Photo');
	}
}
