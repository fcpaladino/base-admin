<?php

use App\Models\Papel;
use Illuminate\Database\Seeder;

class PapelTabelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Papel::class)->create([
            'nome' => 'adminstrador',
            'nome_exibicao' => 'Administrador',
        ]);
        factory(Papel::class)->create([
            'nome' => 'cliente',
            'nome_exibicao' => 'Cliente',
        ]);
    }
}
