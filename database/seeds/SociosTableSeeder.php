<?php

use Illuminate\Database\Seeder;
use App\Models\Socio;

class SociosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Socio::class)->create([
            'nome' => 'Teste Basic',
            'cpf_cnpj' => '05175004182',
            'rg' => '05175004182',
            'email' => 'admin@basic.com',
            'telefone' => '61996549854',
            'endereco' => 'Rua 04',
            'numero' => '196',
            'complemento' => 'Perto de Voney',
            'bairro' => 'São Vicente',
            'cep' => '73802115',
            'designado' => null,
            'cidade' => 'Formosa',
            'uf' => 'GO',
            'user_id' => 1,
            'valor' => null,
            'observacao' => null,
        ]);
    }
}
