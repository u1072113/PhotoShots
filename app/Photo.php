<?php namespace PhotoShots;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	//Here is the name of the photos table
	protected $table = 'photos';
	//These are the atributes for the model
	protected $fillable = ['id', 'title', 'description', 'path', 'album_id'];

	//BelongsTo indicates that this model must have album_id as foreign key as Photos belongs to an album
	public function album()
	{
		return belongsTo('PhotoShots\Album');
	}

}
