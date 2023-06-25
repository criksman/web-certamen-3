<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuentas')->insert([
            ['user' => 'admin','password' => Hash::make('1111'),'nombre'=>'Administrador','Apellido'=>'1', 'perfil_id'=>1],           
            ['user' => 'usuario','password' => Hash::make('2222'),'nombre'=>'usuario','Apellido'=>'normal', 'perfil_id'=>2],
        ]);
    }
}
