<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddresseModel extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = ['customer_id', 'cep', 'address', 'number'];

}
