<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CustomerModel extends Model
    {
        use HasFactory;

        protected $table = 'customers';

        protected $fillable = ['name', 'cpf', 'dateOfBirth', 'sex'];

        public function representatives()
        {
            return $this->hasMany(representativeModel::class, 'customer_id', 'id');
        }

        public function city()
        {
            return $this->belongsTo(CityModel::class);
        }

        public function state()
        {
            return $this->belongsTo(StateModel::class);
        }
    }
