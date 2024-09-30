<?php

namespace Database\Seeders;

use App\Models\SexModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sexs = [
            ['sex' => 'Masculino'],
            ['sex' => 'Feminino'],
        ];

        foreach ($sexs as $key => $sex) {
            
            SexModel::create([
                'sex'   =>  $sex['sex']
            ]);
        }

    }
}
