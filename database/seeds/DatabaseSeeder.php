<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    private $seeds = [
        ConfiguracaoTabelaSeeder::class,
        UsuarioTabelaSeeder::class,
        PapelTabelaSeeder::class,
        UsuarioPapelTabelaSeeder::class,
        PermissaoTabelaSeeder::class,
        PapelPermissaoTabelaSeeder::class
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        foreach($this->seeds as $seed) {
            $this->call($seed);
        }

        Model::reguard();
    }
}
