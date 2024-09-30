<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class representativeModel extends Model
{
    use HasFactory;

    protected $table = 'representative';

    protected $fillable = ['city_id', 'customer_id'];

    public function city()
    {
        return $this->belongsTo(CityModel::class, 'city_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'customer_id', 'id');
    }
}
