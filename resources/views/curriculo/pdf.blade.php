<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Currículo - {{ $nome }}</title>
    <style>
        @page { margin: 0; }
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background: #fff;
        }
        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            color: #232323;
            font-size: 13px;
        }
        .cv-table {
            width: 100vw;
            height: 100vh;
            border-spacing: 0;
            margin: 0;
            padding: 0;
        }
        .cv-left {
            width: 260px;
            background: #232323;
            color: #fff;
            vertical-align: top;
            padding: 0;
            height: 100vh;
        }
        .cv-right {
            background: #fff;
            vertical-align: top;
            padding: 0;
            height: 100vh;
        }
        .cv-foto-box {
            width: 100%;
            text-align: center;
            padding: 24px 0 12px 0;
        }
        .cv-foto {
            width: 110px;
            height: 110px;
            border-radius: 55px;
            object-fit: cover;
            background: #e5e5e5;
            border: 4px solid #fff;
        }
        .cv-section {
            padding: 0 18px 12px 18px;
        }
        .cv-section-title {
            font-size: 1em;
            font-weight: bold;
            color: #fff;
            letter-spacing: 1px;
            margin-bottom: 8px;
            margin-top: 0;
        }
        .cv-section-title-gray {
            color: #888;
            font-size: 1em;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 8px;
            margin-top: 0;
        }
        .cv-sobre-mim {
            font-size: 0.98em;
            color: #fff;
            margin-bottom: 12px;
        }
        .cv-link {
            color: #FFD600;
            font-size: 0.97em;
            word-break: break-all;
        }
        .cv-skill-list {
            margin: 0;
            padding-left: 18px;
            color: #fff;
        }
        .cv-skill-list li {
            margin-bottom: 3px;
        }
        .cv-main {
            padding: 0 24px 0 24px;
        }
        .cv-nome {
            font-size: 2.1em;
            font-weight: bold;
            letter-spacing: 1px;
            color: #232323;
            margin-bottom: 0;
            margin-top: 24px;
        }
        .cv-titulo {
            font-size: 1.1em;
            color: #888;
            font-weight: 400;
            margin-bottom: 18px;
        }
        .cv-contato-main {
            margin-bottom: 18px;
        }
        .cv-contato-main div {
            color: #232323;
            font-size: 1em;
            margin-bottom: 2px;
        }
        .cv-exp-block {
            margin-bottom: 18px;
        }
        .cv-exp-empresa {
            font-weight: bold;
            color: #232323;
            font-size: 1em;
        }
        .cv-exp-cargo {
            font-weight: bold;
            color: #232323;
            font-size: 1em;
        }
        .cv-exp-periodo {
            color: #FFD600;
            font-size: 0.97em;
            font-weight: bold;
        }
        .cv-exp-desc {
            color: #444;
            font-size: 0.98em;
        }
        .cv-edu-block {
            margin-bottom: 18px;
        }
        .cv-edu-inst {
            font-weight: bold;
            color: #232323;
            font-size: 1em;
        }
        .cv-edu-periodo {
            color: #FFD600;
            font-size: 0.97em;
            font-weight: bold;
        }
        .cv-edu-curso {
            font-weight: bold;
            color: #232323;
            font-size: 1em;
        }
        .cv-edu-detail {
            color: #444;
            font-size: 0.98em;
        }
        .cv-tech-list {
            margin: 0;
            padding-left: 18px;
            color: #fff;
        }
        .cv-tech-list li {
            margin-bottom: 3px;
        }
        .cv-cert-list {
            margin: 0;
            padding-left: 18px;
            color: #fff;
        }
        .cv-cert-list li {
            margin-bottom: 3px;
        }
        .cv-lang-list {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .cv-lang-list td {
            padding: 2px 6px 2px 0;
            font-size: 0.98em;
        }
        .cv-bar {
            height: 6px;
            background: #232323;
            border-radius: 3px;
            margin-top: 2px;
        }
        .cv-bar-light {
            background: #e0e0e0;
        }
    </style>
</head>
<body>
<div style="height:100vh;min-height:100vh;width:100vw;">
<table class="cv-table">
    <tr>
        <!-- Coluna esquerda -->
        <td class="cv-left">
            <div class="cv-foto-box">
                <img src="{{ $foto }}" class="cv-foto" alt="Foto de perfil">
            </div>
            <div class="cv-section">
                <div class="cv-section-title">SOBRE MIM</div>
                <div class="cv-sobre-mim">Desenvolvedor Full Stack com experiência em PHP, Laravel, APIs e integrações. Busco sempre inovação e soluções eficientes para desafios de tecnologia.</div>
            </div>
            <div class="cv-section">
                <div class="cv-section-title">CONTATOS</div>
                <div class="cv-link">{{ $email }}</div>
                <div class="cv-link">{{ $whatsapp }}</div>
                <div class="cv-link">{{ $linkedin }}</div>
                <div class="cv-link">{{ $github }}</div>
            </div>
            <div class="cv-section">
                <div class="cv-section-title">TECNOLOGIAS</div>
                <ul class="cv-tech-list">
                    <li>PHP (Laravel, Composer, PHPUnit)</li>
                    <li>JavaScript (ES6+, jQuery)</li>
                    <li>MySQL, MongoDB, Redis</li>
                    <li>APIs RESTful, Webhooks</li>
                    <li>Git, GitHub, GitLab</li>
                </ul>
            </div>
        </td>
        <!-- Coluna direita -->
        <td class="cv-right">
            <div class="cv-main">
                <div class="cv-nome">Eduardo Rafael</div>
                <div class="cv-titulo">{{ $titulo }}</div>
                <div class="cv-section-title-gray">EXPERIÊNCIA PROFISSIONAL</div>
                <div class="cv-exp-block">
                    <div class="cv-exp-empresa">Microcamp</div>
                    <div class="cv-exp-cargo">Professor de Hardware, Games e Informática</div>
                    <div class="cv-exp-periodo">2017 – 2019</div>
                    <div class="cv-exp-desc">Lecionei para públicos diversos, desenvolvendo comunicação e didática.</div>
                </div>
                <div class="cv-exp-block">
                    <div class="cv-exp-empresa">Empresa Atual</div>
                    <div class="cv-exp-cargo">Programador PHP</div>
                    <div class="cv-exp-periodo">2021 – Atual</div>
                    <div class="cv-exp-desc">
                        <ul style='margin:0 0 0 18px;padding:0;color:#444;'>
                            <li>Desenvolvimento e implantação de APIs RESTful, incluindo integrações bancárias (Nbanking) e rotas de pagamento (PIX, boleto, cartão).</li>
                            <li>Atuação em sistemas ERP, geração e gerenciamento de cobranças (boletos, PIX, cartões) e integração de hubs de softwares.</li>
                            <li>Criação completa de um CRM do zero, com integração ao WhatsApp, configurações dinâmicas de setores, números e empresas.</li>
                            <li>Desenvolvimento de bot de autoatendimento totalmente integrado à Inteligência Artificial, permitindo treinamento personalizado para clientes, automação de fluxos, execução de hooks e roteamento inteligente de conversas.</li>
                            <li>Planejamento e gerenciamento de infraestrutura para disparos em massa, utilizando múltiplos servidores e cron jobs.</li>
                            <li>Implementação de Redis para cache e otimização de performance, além de uso de MongoDB para redução de carga no MySQL e armazenamento eficiente de dados não relacionais.</li>
                            <li>Desenvolvimento de APIs com integração de IA, proporcionando automação de atendimento, fluxos inteligentes e roteamento dinâmico de conversas no CRM.</li>
                        </ul>
                    </div>
                </div>
                <div class="cv-section-title-gray">LÍNGUAS</div>
                <table class="cv-lang-list">
                    <tr><td>Português</td><td><div class="cv-bar" style="width:90px;"></div> Fluente</td></tr>
                    <tr><td>Inglês</td><td><div class="cv-bar cv-bar-light" style="width:40px;"></div> Básico</td></tr>
                </table>
            </div>
        </td>
    </tr>
</table>
</div>
</body>
</html> 