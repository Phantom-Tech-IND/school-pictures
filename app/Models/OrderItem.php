<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
	use HasFactory;

	protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'options'];

	public function getOptionsAttribute($value)
	{
		return json_decode($value, true);
	}

	public function getOptionsSelectsAttribute($value)
	{
		return json_decode($value, true)['selects'];
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}



// "selects" => [
// 	"FOTOFARBE" => "Sepia"
// ]
// "files" => [
// 	"Bild_auswählen" => [
// 		"id" => "5"
// 		"href" => "/media/kindergarden/KLB_7505_900px.jpg"
// 	]
// ]
// "checkbox" => [
// 	"Junior" => "True"
// 	"Nsa" => "False"
// 	"Hulala" => "True"
// ]