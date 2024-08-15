<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            [
                'descricao' => 'sem descrição',
                'tipo' => 1,
                'observacoes' => 'sem observações',
                'ativo' => 1,
                'whatsapp' => null,
                'contact' => null,
                'cpf' => null,
                'cep' => null,
                'conversion_origin' => null,
                'created_at' => '2024-08-07 17:22:23',
                'updated_at' => '2024-08-07 17:22:23',
            ],
            [
                'descricao' => 'sem descrição',
                'tipo' => 2,
                'observacoes' => 'sem observações',
                'ativo' => 1,
                'whatsapp' => null,
                'contact' => null,
                'cpf' => null,
                'cep' => null,
                'conversion_origin' => null,
                'created_at' => '2024-08-07 17:24:26',
                'updated_at' => '2024-08-07 17:24:26',
            ],
            [
                'descricao' => 'sem descrição',
                'tipo' => 2,
                'observacoes' => 'nenhuma observação',
                'ativo' => 0,
                'whatsapp' => null,
                'contact' => null,
                'cpf' => null,
                'cep' => null,
                'conversion_origin' => null,
                'created_at' => '2024-08-07 17:31:28',
                'updated_at' => '2024-08-07 18:37:00',
            ],
            [
                'descricao' => 'sem descrição',
                'tipo' => 1,
                'observacoes' => 'sem observações',
                'ativo' => 1,
                'whatsapp' => null,
                'contact' => null,
                'cpf' => null,
                'cep' => null,
                'conversion_origin' => null,
                'created_at' => '2024-08-07 18:40:26',
                'updated_at' => '2024-08-07 18:40:26',
            ],
        ]);
    }
}
