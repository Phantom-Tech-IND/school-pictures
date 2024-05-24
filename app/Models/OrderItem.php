<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
	use HasFactory;

	protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'options'];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}

// "selects" => array:1 [▼
// 	"FOTOFARBE" => "Sepia"
// ]
// "files" => array:1 [▼
// 	"Bild_auswählen" => array:2 [▼
// 		"id" => "5"
// 		"href" => "/media/kindergarden/KLB_7505_900px.jpg"
// 	]
// ]
// "checkbox" => array:3 [▼
// 	"Junior" => "True"
// 	"Nsa" => "False"
// 	"Hulala" => "True"
// ]

