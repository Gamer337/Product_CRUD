<?php

// namespace App\Models\;
namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class product extends Model
{

    protected $table ='products';
    protected $fillable=[
        'name',
        'description',
        'price',
        'image',
    ];
}
