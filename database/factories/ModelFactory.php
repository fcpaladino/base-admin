<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->define(App\Models\Usuario::class, function ($faker) {
    return [
        'nome' => $faker->name,
        'usuario' => strtolower($faker->firstName),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Papel::class, function ($faker) {
    return [
        'nome' => strtolower($faker->firstName),
        'nome_exibicao' => $faker->name,
        'descricao' => $faker->text,
    ];
});

$factory->define(App\Models\Permissao::class, function ($faker) {
    return [
        'etiqueta' => strtolower($faker->firstName),
        'descricao' => $faker->name,
    ];
});