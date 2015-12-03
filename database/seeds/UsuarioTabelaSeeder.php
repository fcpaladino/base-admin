<?php

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioTabelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Usuario::class)->create([
            'nome' => 'webee',
            'usuario' => 'webee',
            'password' => bcrypt('W3b33@!'),
            'remember_token' => str_random(10),
        ]);
    }
}
