<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeppleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'taro',
            'mail' => 'taro@com',
            'age' => 12,
        ];
        DB::table('people')
            ->insert($param);

        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@com',
            'age' => 22,
        ];
        DB::table('people')
            ->insert($param);

        $param = [
            'name' => 'ken',
            'mail' => 'ken@com',
            'age' => 32,
        ];
        DB::table('people')
            ->insert($param);
    

    }
}
