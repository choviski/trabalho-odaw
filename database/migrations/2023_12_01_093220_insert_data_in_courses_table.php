<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Course::insert([
            ['name' => 'Bacharelado em Ciência da Computação', 'description' => 'O curso de Bacharelado em Ciência da Computação prepara profissionais capacitados a contribuir para a evolução do conhecimento do ponto de vista científico e tecnológico e a utilizar esse conhecimento na avaliação, especificação e desenvolvimento de ferramentas, métodos e sistemas computacionais para atender a demanda no desenvolvimento de software inovadores.'],
            ['name' => 'Bacharelado em Engenharia Civil', 'description' => 'Com o objetivo de Formar profissionais capazes de oferecer soluções competentes e eficazes aos problemas identificados em diversas áreas como construção civil, estruturas, geotecnia, engenharia hidráulica e infraestrutura de transporte, bem como na área de desenvolvimento regional e urbano e de sustentabilidade.'],
            ['name' => 'Bacharelado em Engenharia Mecânica', 'description' => 'O curso de Engenharia Mecânica proporciona uma sólida formação em princípios de mecânica, termodinâmica, materiais, eletromecânica e controle, preparando profissionais para projetar e otimizar sistemas mecânicos complexos.'],
            ['name' => 'Bacharelado em Engenharia Elétrica', 'description' => 'A Engenharia Elétrica envolve o estudo de sistemas elétricos, eletrônicos e eletromagnéticos. Os alunos deste curso desenvolvem habilidades em áreas como eletrônica, controle, comunicações e sistemas de energia.'],
            ['name' => 'Bacharelado em Física', 'description' => 'O curso de Física explora os fundamentos da matéria, energia, espaço e tempo. Os alunos aprendem teorias fundamentais e aplicam métodos experimentais para entender os fenômenos físicos ao nosso redor.'],
            ['name' => 'Bacharelado em Matemática', 'description' => 'A Matemática é a linguagem fundamental das ciências e desempenha um papel crucial em diversos campos. Este curso proporciona uma compreensão aprofundada de conceitos matemáticos e suas aplicações práticas.'],
            ['name' => 'Bacharelado em Química', 'description' => 'O curso de Química abrange os princípios fundamentais da matéria, suas propriedades e transformações. Os estudantes exploram a estrutura molecular, as reações químicas e suas aplicações em diversas indústrias.'],
            ['name' => 'Tecnólogo em Análise e Desenvolvimento de Sistemas (ADS)', 'description' => 'O Tecnólogo em Análise e Desenvolvimento de Sistemas (ADS) forma profissionais especializados em projetar, desenvolver e implementar sistemas de software. O curso enfoca programação, banco de dados, redes e práticas de desenvolvimento ágil.'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Course::whereNotNull('id')->delete();
    }
};
