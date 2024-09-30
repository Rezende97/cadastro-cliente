<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = ['city', 'state_id'];

    public function representatives()
    {
        return $this->hasMany(representativeModel::class, 'city_id', 'id');
    }

    public function customer()
    {
        return $this->hasMany(CustomerModel::class);
    }
}
