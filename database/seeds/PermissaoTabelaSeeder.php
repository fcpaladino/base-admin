<?php

use App\Models\Permissao;
use Illuminate\Database\Seeder;

class PermissaoTabelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Permissao::class)->create([
            'etiqueta' => 'administrator',
            'descricao' => 'Área Administrativa'
        ]);
        factory(Permissao::class)->create([
            'etiqueta' => 'area_restrita',
            'descricao' => 'Área Restrita'
        ]);
    }
}
