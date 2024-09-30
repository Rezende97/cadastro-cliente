<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerStateCitieModel extends Model
{
    use HasFactory;

    protected $table = 'customer_state_cities';

    protected $fillable = ['customer_id', 'state_id', 'city_id'];
}
