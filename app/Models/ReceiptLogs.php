<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptLogs extends Model
{
    protected $connection = 'sqlite';
    protected $table = 'receipt_logs';

    protected $fillable = [
        'id', 'name', 'cpf', 'number_of_contract', 'operator', 'created_at', 'updated_at', 'type'
    ];

    public const TYPE = [
        'PRIMEIRA_ETAPA' => 0,
        'SEGUNDA_ETAPA' => 1,
        'PRIMEIRA_E_SEGUNDA_ETAPA' => 2,
        'TERMO_DE_CANCELAMENTO' => 3,
        'EDITAL_DE_VENDAS' => 4,
    ];
}
