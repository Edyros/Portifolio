<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CurriculoController extends Controller
{
    public function gerar()
    {
        // Dados pessoais
        $dados = [
            'nome' => 'Eduardo',
            'titulo' => 'Desenvolvedor Full Stack',
            'email' => 'edyrosnfts@gmail.com',
            'whatsapp' => '+55 (12) 99756-1047',
            'linkedin' => 'https://www.linkedin.com/in/edyros-nfts-54ab3a363/',
            'github' => 'https://github.com/Edyros',
            'foto' => public_path('img/profile.jpg'),
            'resumo' => 'Desenvolvedor Fullstack especializado em PHP e Laravel, com sólida experiência em arquitetura de APIs RESTful e integrações de sistemas. Transformo requisitos complexos em soluções elegantes e escaláveis, combinando o poder do Laravel com as melhores práticas de desenvolvimento backend e frontend.',
            'experiencias' => [
                [
                    'cargo' => 'Professor',
                    'empresa' => 'Microcamp',
                    'periodo' => '2017 - 2019',
                    'descricao' => 'Ministrava aulas de informática e programação para turmas de diversos níveis.'
                ],
                [
                    'cargo' => 'Programador PHP',
                    'empresa' => 'Empresa Atual',
                    'periodo' => '2021 - Atual',
                    'descricao' => 'Desenvolvimento de sistemas web, APIs e integrações utilizando PHP e Laravel.'
                ]
            ],
            // Habilidades principais
            'habilidades_solidas' => [
                'PHP', 'MySQL', 'HTML', 'CSS', 'jQuery'
            ],
            'habilidades_intermediarias' => [
                'Laravel', 'Git', 'MongoDB', 'Redis'
            ],
            'habilidades_explorando' => [
                'Web3', 'Crypto'
            ],
            // Projetos principais (exemplo)
            'projetos' => [
                [
                    'nome' => 'API de Pagamentos',
                    'descricao' => 'Sistema completo de processamento de pagamentos com integração multi-gateway.',
                    'tecnologias' => 'Laravel, MySQL, Vue.js, Redis',
                    'link' => 'https://github.com/seu-usuario/api-pagamentos'
                ],
                [
                    'nome' => 'Sistema de Integração',
                    'descricao' => 'Hub de integração para múltiplos serviços e APIs externas.',
                    'tecnologias' => 'Node.js, MongoDB, Redis, RabbitMQ',
                    'link' => 'https://github.com/seu-usuario/sistema-integracao'
                ],
                [
                    'nome' => 'Dashboard Administrativo',
                    'descricao' => 'Painel administrativo moderno com Laravel e Vue.js.',
                    'tecnologias' => 'Laravel, Vue.js, Tailwind CSS, Chart.js',
                    'link' => 'https://github.com/seu-usuario/admin-dashboard'
                ]
            ]
        ];

        $pdf = Pdf::loadView('curriculo.pdf', $dados);
        return $pdf->download('Curriculo-Eduardo.pdf');
    }
} 