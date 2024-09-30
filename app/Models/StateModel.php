<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateModel extends Model
{
    use HasFactory;

    protected $table = 'states';
    protected $fillable = ['state_id', 'state', 'acronym'];

    public function customer()
    {
        return $this->hasMany(CustomerModel::class);
    }
}
