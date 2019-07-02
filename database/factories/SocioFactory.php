<?php

use Faker\Generator as Faker;
use App\Models\Socio;

$factory->define(Socio::class, function (Faker $faker) {
    $faker->addProvider(new \JansenFelipe\FakerBR\FakerBR($faker));
    return [
        'nome' => 'Teste Basic',
        'cpf_cnpj' => $faker->cpf,
        'rg' => $faker->cpf,
        'email' => $faker->safeEmail,
        'telefone' => $faker->phoneNumber,
        'endereco' => $faker->streetAddress,
        'numero' => $faker->buildingNumber,
        'complemento' => $faker->secondaryAddress,
        'bairro' => $faker->streetName,
        'cep' => $faker->postcode,
        'designado' => null,
        'cidade' => $faker->city,
        'uf' => $faker->stateAbbr,
        'user_id' => 1,
        'valor' => null,
        'observacao' => null,
    ];
});
