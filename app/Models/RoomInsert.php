<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RoomInsert extends Model{
	Protected $table = 'rooms';
	public $timestamps = false;
	protected $fillable = [
		'number', 'persons', 'ac', 'price'
	];
}