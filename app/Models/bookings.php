<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model{
	Protected $table = 'bookings';
	public $timestamps = false;
	protected $fillable = [
		'dates', 'dateo', 'persons', 'ac','approval','price','phone','name','roomnumber'
	];
}