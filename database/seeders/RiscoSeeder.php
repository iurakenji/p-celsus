<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('riscos')->insert(['nome' => 'Inflamável', 'descricao' => '', 'imagem' => 'storage/img/riscos/xc6mXv4MRoQhG6Qb1NpBMm7VQNcc9EdOXQDaK15D.png']);
        DB::table('riscos')->insert(['nome' => 'Oxidante', 'descricao' => '', 'imagem' => 'storage/img/riscos/sMImqD1w8IcUf6gr5l6K2HJ9oKZ8NaJAQ8zmbF1G.png']);
        DB::table('riscos')->insert(['nome' => 'Corrosivo', 'descricao' => '', 'imagem' => 'storage/img/riscos/TiGxE5KZogG0jKQKS9gXmaRvicm093RK8Cqb67vu.png']);
        DB::table('riscos')->insert(['nome' => 'Risco à Saúde', 'descricao' => '', 'imagem' => 'storage/img/riscos/L2AMPpnztJqGOi1Ohl3Vs1IRQ07RJQhkHWplxtzi.png']);
        DB::table('riscos')->insert(['nome' => 'Risco Ambiental', 'descricao' => '', 'imagem' => 'storage/img/riscos/jIi8Ixm9oXwJ94vFqvZRJ0V5TglG9zsryOOMUUPX.png']);
        DB::table('riscos')->insert(['nome' => 'Explosivo', 'descricao' => '', 'imagem' => 'storage/img/riscos/M8ziUmJmLrQgLFlbyL0vNZA2IPwI6gkmBRBOaq8F.png']);
        DB::table('riscos')->insert(['nome' => 'Irritante', 'descricao' => '', 'imagem' => 'storage/img/riscos/SH3a7K8otkYnb0RovqD9Eb8vDwdrXEjo32zS4VYY.jpg']);
        DB::table('riscos')->insert(['nome' => 'Tóxico', 'descricao' => '', 'imagem' => 'storage/img/riscos/m05a6RgLxok1XW2hsGDQjToHDdhLvGd5oHQ8ePIM.jpg']);
        DB::table('riscos')->insert(['nome' => 'Ácido', 'descricao' => '', 'imagem' => 'storage/img/riscos/4ywyqU15X3NfIGEG3NINgs17jmEoqSGOZnm8fmbM.png']);
    }
}
