<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'amount', 'time', 'status', 'invoice', 'contact_id',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
