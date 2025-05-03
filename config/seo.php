<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configurações de SEO
    |--------------------------------------------------------------------------
    |
    | Este arquivo contém as configurações de SEO para o site.
    |
    */

    'default' => [
        'title' => 'Eduardo - Desenvolvedor Full Stack',
        'description' => 'Desenvolvedor Full Stack especializado em PHP, Laravel, JavaScript e desenvolvimento web. Portfólio profissional com projetos e habilidades.',
        'keywords' => 'desenvolvedor, programador, PHP, Laravel, JavaScript, full stack, portfólio, desenvolvimento web, backend, frontend, API, REST, MySQL, Git, AWS',
        'author' => 'Eduardo',
        'image' => 'img/profile.jpg',
        'type' => 'website',
        'locale' => 'pt_BR',
        'site_name' => 'Portfólio Eduardo',
    ],

    'pages' => [
        'home' => [
            'title' => 'Eduardo - Desenvolvedor Full Stack',
            'description' => 'Desenvolvedor Full Stack especializado em PHP, Laravel e JavaScript. Conheça meus projetos e habilidades em desenvolvimento web.',
            'keywords' => 'desenvolvedor, programador, PHP, Laravel, JavaScript, full stack, portfólio',
        ],
        'about' => [
            'title' => 'Sobre Eduardo - Desenvolvedor Full Stack',
            'description' => 'Conheça mais sobre minha experiência como desenvolvedor Full Stack, especializado em PHP, Laravel e JavaScript.',
            'keywords' => 'sobre, experiência, desenvolvedor, PHP, Laravel, JavaScript, full stack',
        ],
        'skills' => [
            'title' => 'Habilidades - Eduardo Desenvolvedor',
            'description' => 'Minhas habilidades técnicas como desenvolvedor Full Stack, incluindo PHP, Laravel, JavaScript, MySQL e mais.',
            'keywords' => 'habilidades, tecnologias, PHP, Laravel, JavaScript, MySQL, Git, AWS',
        ],
        'projects' => [
            'title' => 'Projetos - Portfólio Eduardo',
            'description' => 'Conheça meus projetos como desenvolvedor Full Stack, incluindo APIs, sistemas web e aplicações modernas.',
            'keywords' => 'projetos, portfólio, desenvolvimento, API, sistemas web, aplicações',
        ],
        'contact' => [
            'title' => 'Contato - Eduardo Desenvolvedor',
            'description' => 'Entre em contato para discutir projetos, oportunidades de trabalho ou colaborações.',
            'keywords' => 'contato, orçamento, trabalho, projetos, colaboração',
        ],
    ],

    'social' => [
        'twitter' => '@seu_usuario',
        'facebook' => 'seu_usuario',
        'linkedin' => 'seu_usuario',
        'github' => 'seu_usuario',
    ],

    'structured_data' => [
        'person' => [
            '@type' => 'Person',
            'name' => 'Eduardo',
            'jobTitle' => 'Desenvolvedor Full Stack',
            'url' => 'https://seu-site.com',
            'sameAs' => [
                'https://github.com/seu_usuario',
                'https://linkedin.com/in/seu_usuario',
            ],
            'description' => 'Desenvolvedor Full Stack especializado em PHP, Laravel, JavaScript e desenvolvimento web.',
        ],
    ],

    'sitemap' => [
        'priority' => [
            'home' => 1.0,
            'projects' => 0.9,
            'about' => 0.8,
            'skills' => 0.8,
            'contact' => 0.7,
        ],
        'changefreq' => [
            'home' => 'weekly',
            'projects' => 'weekly',
            'about' => 'monthly',
            'skills' => 'monthly',
            'contact' => 'monthly',
        ],
    ],

    'robots' => [
        'allow' => [
            '/',
            '/sobre',
            '/habilidades',
            '/projetos',
            '/contato',
        ],
        'disallow' => [
            '/storage',
            '/vendor',
            '/node_modules',
            '/.env',
            '/.git',
        ],
    ],
]; 