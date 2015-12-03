<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PapelPermissaoTabelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('papel_permissao')->insert([
            'id_papel'      => 1,
            'id_permissao'  => 1
        ]);
    }
}
