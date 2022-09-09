<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            'product_id' => random_int(41,50),
            'key' => 'سایز',
            'value' => random_int(36,45),
        ]);
        DB::table('attributes')->insert([
            'product_id' => random_int(41,50),
            'key' => 'رنگ',
            'value' => 'قرمز',
        ]);
        DB::table('attributes')->insert([
            'product_id' => random_int(41,50),
            'key' => 'رنگ',
            'value' => 'آبی',
        ]);
        DB::table('attributes')->insert([
        'product_id' => random_int(41,50),
        'key' => 'سایز',
        'value' => random_int(36,45),
    ]);
    }
}
