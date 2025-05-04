@extends('layouts.app')

@section('title', 'Eduardo - Desenvolvedor Full Stack')
@section('meta_description', 'Portfólio profissional de Eduardo, desenvolvedor Full Stack especializado em PHP, Laravel e JavaScript. Conheça meus projetos e habilidades em desenvolvimento web.')

@section('styles')
<style>
    .typing-effect::after {
        content: '|';
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {
        from, to { opacity: 1 }
        50% { opacity: 0 }
    }

    .tech-stack-item {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tech-stack-item:hover {
        transform: translateY(-10px);
    }

    .tech-stack-item::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: currentColor;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }

    .tech-stack-item:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    .tech-stack-item i {
        transition: transform 0.3s ease;
    }

    .tech-stack-item:hover i {
        transform: scale(1.2);
    }

    .gradient-text {
        background: linear-gradient(45deg, #3B82F6, #60A5FA);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .floating {
        animation: floating 3s ease-in-out infinite;
    }

    @keyframes floating {
        0% { transform: translate(0, 0px); }
        50% { transform: translate(0, 15px); }
        100% { transform: translate(0, -0px); }
    }

    .skill-bar {
        height: 4px;
        background: rgba(59, 130, 246, 0.1);
        border-radius: 4px;
        overflow: hidden;
        position: relative;
    }

    .skill-progress {
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        will-change: width;
        transform: translateZ(0);
        backface-visibility: hidden;
    }

    /* Gradientes específicos para cada nível */
    .tech-card.solid .skill-progress {
        background: linear-gradient(90deg, #3B82F6, #60A5FA);
    }

    .tech-card.intermediate .skill-progress {
        background: linear-gradient(90deg, #9333EA, #C084FC);
    }

    .tech-card.exploring .skill-progress {
        background: linear-gradient(90deg, #22C55E, #4ADE80);
    }

    /* Efeito de brilho melhorado */
    .tech-card {
        backdrop-filter: blur(12px);
        background: rgba(17, 24, 39, 0.7);
        position: relative;
        overflow: hidden;
        transform: translateZ(0);
        backface-visibility: hidden;
    }

    .tech-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(59, 130, 246, 0.1),
            transparent
        );
        transition: 0.3s ease-out;
        pointer-events: none;
    }

    .tech-card:hover::before {
        left: 100%;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .float-animation {
        animation: float 3s ease-in-out infinite;
    }

    .glow {
        animation: glow 2s ease-in-out infinite alternate;
    }

    @keyframes glow {
        from {
            box-shadow: 0 0 5px #3B82F6, 0 0 10px #3B82F6, 0 0 15px #3B82F6;
        }
        to {
            box-shadow: 0 0 10px #60A5FA, 0 0 20px #60A5FA, 0 0 30px #60A5FA;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="min-h-screen flex items-center relative overflow-hidden bg-white dark:bg-gray-900 transition-colors duration-300" id="sobre">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gray-200/60 dark:bg-blue-400/10 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-gray-200/60 dark:bg-blue-400/10 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        <!-- Floating Code Snippets -->
        <div class="absolute top-20 left-10 text-gray-400/30 dark:text-gray-300/10 text-xs transform -rotate-12 floating">
            <pre class="font-mono">
php artisan make:controller
            </pre>
        </div>
        <div class="absolute bottom-20 right-10 text-gray-400/30 dark:text-gray-300/10 text-xs transform rotate-12 floating" style="animation-delay: 1.5s">
            <pre class="font-mono">
return Response::json($data);
            </pre>
        </div>
    </div>

    <div class="container mx-auto px-4 pt-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div>
                    <p class="text-gray-500 font-mono mb-4">&lt;code&gt; Hello, World! &lt;/code&gt;</p>
                    <h1 class="text-5xl md:text-6xl font-bold mb-4 dark:text-white text-gray-900">
                        {{ __('portfolio.hero.greeting') }} <span class="gradient-text">EDUARDO!</span>
                    </h1>
                    <h2 class="text-4xl md:text-5xl font-bold typing-effect dark:text-blue-200 text-gray-800" id="typing-text">
                        {{ __('portfolio.hero.roles.0') }}
                    </h2>
                </div>
                
                <p class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed max-w-2xl">
                    {{ __('portfolio.hero.description') }}
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="/curriculo" target="_blank" class="inline-flex items-center px-8 py-4 bg-gray-900 dark:bg-gradient-to-r dark:from-blue-600 dark:to-blue-500 text-white rounded-full hover:bg-gray-800 dark:hover:from-blue-700 dark:hover:to-blue-600 transition duration-300 transform hover:scale-105 hover:shadow-lg" aria-label="Baixar Currículo">
                        <i class="fas fa-download mr-2"></i>
                        {{ __('portfolio.hero.download_cv') }}
                    </a>
                    <a href="#projetos" class="inline-flex items-center px-8 py-4 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-300 transform hover:scale-105 hover:shadow-lg border border-gray-300 dark:border-gray-600" aria-label="Ver Projetos">
                        <i class="fas fa-code mr-2"></i>
                        {{ __('portfolio.hero.view_projects') }}
                    </a>
                </div>

                <!-- Tech Stack -->
                <section class="pt-8">
                    <h3 class="text-sm text-gray-500 dark:text-gray-300 mb-4">{{ __('portfolio.hero.main_tech') }}</h3>
                    <div class="flex flex-wrap gap-4">
                        <a href="https://www.php.net/" target="_blank" rel="noopener noreferrer" class="tech-stack-item bg-gray-100 dark:bg-gray-700/50 p-4 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600/50 transition-all duration-300" aria-label="PHP">
                            <i class="fab fa-php text-3xl text-blue-400"></i>
                        </a>
                        <a href="https://laravel.com/" target="_blank" rel="noopener noreferrer" class="tech-stack-item bg-gray-100 dark:bg-gray-700/50 p-4 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600/50 transition-all duration-300" aria-label="Laravel">
                            <i class="fab fa-laravel text-3xl text-red-400"></i>
                        </a>
                        <a href="https://developer.mozilla.org/pt-BR/docs/Web/JavaScript" target="_blank" rel="noopener noreferrer" class="tech-stack-item bg-gray-100 dark:bg-gray-700/50 p-4 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600/50 transition-all duration-300" aria-label="JavaScript">
                            <i class="fab fa-js text-3xl text-yellow-400"></i>
                        </a>
                        <a href="https://www.mysql.com/" target="_blank" rel="noopener noreferrer" class="tech-stack-item bg-gray-100 dark:bg-gray-700/50 p-4 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600/50 transition-all duration-300" aria-label="MySQL">
                            <i class="fas fa-database text-3xl text-blue-500"></i>
                        </a>
                        <a href="https://git-scm.com/" target="_blank" rel="noopener noreferrer" class="tech-stack-item bg-gray-100 dark:bg-gray-700/50 p-4 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600/50 transition-all duration-300" aria-label="Git">
                            <i class="fab fa-git-alt text-3xl text-orange-400"></i>
                        </a>
                        <a href="https://github.com/" target="_blank" rel="noopener noreferrer" class="tech-stack-item bg-gray-100 dark:bg-gray-700/50 p-4 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600/50 transition-all duration-300" aria-label="GitHub">
                            <i class="fab fa-github text-3xl text-purple-400"></i>
                        </a>
                        <a href="https://aws.amazon.com/" target="_blank" rel="noopener noreferrer" class="tech-stack-item bg-gray-100 dark:bg-gray-700/50 p-4 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600/50 transition-all duration-300" aria-label="AWS">
                            <i class="fab fa-aws text-3xl text-orange-500"></i>
                        </a>
                    </div>
                </section>
            </div>

            <div class="relative flex justify-center">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-200/40 to-gray-100/40 dark:from-blue-900/10 dark:to-purple-900/10 rounded-full filter blur-3xl animate-pulse"></div>
                <div class="hexagon-border p-1 w-[500px] h-[500px] max-w-full floating">
                    <div class="hexagon-image w-full h-full bg-gray-100 dark:bg-gray-800 overflow-hidden">
                        <img src="{{ asset('img/profile.jpg') }}" alt="Foto de Eduardo - Desenvolvedor Full Stack" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<div class="py-12 bg-gray-50 dark:bg-gray-800/30 border-t border-b border-gray-200 dark:border-gray-800 transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-500 mb-2">
                    <span class="counter" data-target="4">0</span>+
                </div>
                <div class="text-gray-600 dark:text-gray-300">{{ __('portfolio.stats.years') }}</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-500 mb-2">
                    <span class="counter" data-target="3">0</span>+
                </div>
                <div class="text-gray-600 dark:text-gray-300">{{ __('portfolio.stats.projects') }}</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-500 mb-2">
                    <span class="counter" data-target="3">0</span>+
                </div>
                <div class="text-gray-600 dark:text-gray-300">{{ __('portfolio.stats.apis') }}</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-500 mb-2">
                    <span class="counter" data-target="100">0</span>%
                </div>
                <div class="text-gray-600 dark:text-gray-300">{{ __('portfolio.stats.satisfaction') }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="py-20 bg-white dark:bg-gray-900 transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-gray-500 font-mono">&lt;services&gt;</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4 dark:text-white text-gray-900">{{ __('portfolio.services.title') }}</h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">{{ __('portfolio.services.subtitle') }}</p>
            <span class="text-gray-500 font-mono">&lt;/services&gt;</span>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="group bg-gray-100 dark:bg-gray-800/70 p-8 rounded-lg border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-400 transition duration-300 transform hover:scale-105">
                <div class="bg-gray-200 dark:bg-blue-400/10 rounded-full w-16 h-16 flex items-center justify-center mb-6 group-hover:bg-gray-300 dark:group-hover:bg-blue-400/20 transition duration-300">
                    <i class="fab fa-laravel text-blue-500 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 group-hover:text-blue-400 dark:group-hover:text-blue-300 transition duration-300 dark:text-white text-gray-900">{{ __('portfolio.services.laravel.title') }}</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ __('portfolio.services.laravel.description') }}</p>
            </div>

            <!-- Service 2 -->
            <div class="group bg-gray-100 dark:bg-gray-800/70 p-8 rounded-lg border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-400 transition duration-300 transform hover:scale-105">
                <div class="bg-gray-200 dark:bg-blue-400/10 rounded-full w-16 h-16 flex items-center justify-center mb-6 group-hover:bg-gray-300 dark:group-hover:bg-blue-400/20 transition duration-300">
                    <i class="fas fa-exchange-alt text-blue-500 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 group-hover:text-blue-400 dark:group-hover:text-blue-300 transition duration-300 dark:text-white text-gray-900">{{ __('portfolio.services.api.title') }}</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ __('portfolio.services.api.description') }}</p>
            </div>

            <!-- Service 3 -->
            <div class="group bg-gray-100 dark:bg-gray-800/70 p-8 rounded-lg border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-400 transition duration-300 transform hover:scale-105">
                <div class="bg-gray-200 dark:bg-blue-400/10 rounded-full w-16 h-16 flex items-center justify-center mb-6 group-hover:bg-gray-300 dark:group-hover:bg-blue-400/20 transition duration-300">
                    <i class="fas fa-code-branch text-blue-500 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 group-hover:text-blue-400 dark:group-hover:text-blue-300 transition duration-300 dark:text-white text-gray-900">{{ __('portfolio.services.integration.title') }}</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ __('portfolio.services.integration.description') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Tech Stack Section -->
<div class="py-20 bg-white dark:bg-gray-900 transition-colors duration-300" id="habilidades">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-gray-500 font-mono">&lt;skills&gt;</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4 dark:text-white text-gray-900">{{ __('portfolio.skills.title') }}</h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">{{ __('portfolio.skills.subtitle') }}</p>
            <span class="text-gray-500 font-mono">&lt;/skills&gt;</span>
        </div>

        <!-- Conhecimentos Sólidos -->
        <div class="mb-16">
            <h3 class="text-2xl font-bold mb-8 text-center">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-600">
                    {{ __('portfolio.skills.solid') }}
                </span>
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <div class="tech-card solid p-6 rounded-xl border border-gray-200 dark:border-blue-500/30 bg-white dark:bg-gray-900 hover:border-blue-500 transition-all duration-300 group float-animation" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fab fa-php text-4xl text-blue-400"></i>
                        <span class="text-sm text-blue-400"><span class="counter" data-target="95">0</span>%</span>
                    </div>
                    <h4 class="font-bold mb-2 text-gray-900 dark:text-white">PHP</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="95"></div>
                    </div>
                </div>

                <div class="tech-card solid p-6 rounded-xl border border-gray-200 dark:border-blue-500/30 bg-white dark:bg-gray-900 hover:border-blue-500 transition-all duration-300 group float-animation" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fas fa-database text-4xl text-blue-400"></i>
                        <span class="text-sm text-blue-400"><span class="counter" data-target="90">0</span>%</span>
                    </div>
                    <h4 class="font-bold mb-2 text-gray-900 dark:text-white">MySQL</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="90"></div>
                    </div>
                </div>

                <div class="tech-card solid p-6 rounded-xl border border-gray-200 dark:border-blue-500/30 bg-white dark:bg-gray-900 hover:border-blue-500 transition-all duration-300 group float-animation" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fab fa-html5 text-4xl text-blue-400"></i>
                        <span class="text-sm text-blue-400"><span class="counter" data-target="95">0</span>%</span>
                    </div>
                    <h4 class="font-bold mb-2 text-gray-900 dark:text-white">HTML</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="95"></div>
                    </div>
                </div>

                <div class="tech-card solid p-6 rounded-xl border border-gray-200 dark:border-blue-500/30 bg-white dark:bg-gray-900 hover:border-blue-500 transition-all duration-300 group float-animation" style="animation-delay: 0.4s">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fab fa-css3-alt text-4xl text-blue-400"></i>
                        <span class="text-sm text-blue-400"><span class="counter" data-target="90">0</span>%</span>
                    </div>
                    <h4 class="font-bold mb-2 text-gray-900 dark:text-white">CSS</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="90"></div>
                    </div>
                </div>

                <div class="tech-card solid p-6 rounded-xl border border-gray-200 dark:border-blue-500/30 bg-white dark:bg-gray-900 hover:border-blue-500 transition-all duration-300 group float-animation" style="animation-delay: 0.5s">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fab fa-js text-4xl text-blue-400"></i>
                        <span class="text-sm text-blue-400"><span class="counter" data-target="85">0</span>%</span>
                    </div>
                    <h4 class="font-bold mb-2 text-gray-900 dark:text-white">jQuery</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="85"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conhecimentos Intermediários -->
        <div class="mb-16">
            <h3 class="text-2xl font-bold mb-8 text-center">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">
                    {{ __('portfolio.skills.intermediate') }}
                </span>
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="tech-card intermediate p-6 rounded-xl border border-purple-500/30 hover:border-purple-500 transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fab fa-laravel text-4xl text-purple-400"></i>
                        <span class="text-sm text-purple-400">
                            <span class="counter" data-target="75">0</span>%
                        </span>
                    </div>
                    <h4 class="font-bold mb-2">Laravel</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="75"></div>
                    </div>
                </div>

                <div class="tech-card intermediate p-6 rounded-xl border border-purple-500/30 hover:border-purple-500 transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fab fa-git-alt text-4xl text-purple-400"></i>
                        <span class="text-sm text-purple-400">
                            <span class="counter" data-target="70">0</span>%
                        </span>
                    </div>
                    <h4 class="font-bold mb-2">Git</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="70"></div>
                    </div>
                </div>

                <div class="tech-card intermediate p-6 rounded-xl border border-purple-500/30 hover:border-purple-500 transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fas fa-database text-4xl text-purple-400"></i>
                        <span class="text-sm text-purple-400">
                            <span class="counter" data-target="65">0</span>%
                        </span>
                    </div>
                    <h4 class="font-bold mb-2">MongoDB</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="65"></div>
                    </div>
                </div>

                <div class="tech-card intermediate p-6 rounded-xl border border-purple-500/30 hover:border-purple-500 transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fas fa-server text-4xl text-purple-400"></i>
                        <span class="text-sm text-purple-400">
                            <span class="counter" data-target="60">0</span>%
                        </span>
                    </div>
                    <h4 class="font-bold mb-2">Redis</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="60"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Explorando Novas Tecnologias -->
        <div>
            <h3 class="text-2xl font-bold mb-8 text-center">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-green-500">
                    Explorando Novas Tecnologias
                </span>
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="tech-card exploring p-6 rounded-xl border border-green-500/30 hover:border-green-500 transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fas fa-cube text-4xl text-green-400"></i>
                        <span class="text-sm text-green-400">
                            <span class="counter" data-target="40">0</span>%
                        </span>
                    </div>
                    <h4 class="font-bold mb-2">Web3</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="40"></div>
                    </div>
                    <p class="mt-4 text-sm text-gray-600">Explorando o futuro da web descentralizada</p>
                </div>

                <div class="tech-card exploring p-6 rounded-xl border border-green-500/30 hover:border-green-500 transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <i class="fab fa-bitcoin text-4xl text-green-400"></i>
                        <span class="text-sm text-green-400">
                            <span class="counter" data-target="35">0</span>%
                        </span>
                    </div>
                    <h4 class="font-bold mb-2">Crypto</h4>
                    <div class="skill-bar">
                        <div class="skill-progress" data-progress="35"></div>
                    </div>
                    <p class="mt-4 text-sm text-gray-600">Desenvolvendo conhecimento em tecnologias blockchain</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Latest Projects -->
<div class="py-20 bg-gray-50 dark:bg-gray-900 transition-colors duration-300" id="projetos">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-gray-500 font-mono">&lt;projects&gt;</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4 dark:text-white text-gray-900">Projetos Recentes</h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Soluções desenvolvidas com Laravel e APIs</p>
            <span class="text-gray-500 font-mono">&lt;/projects&gt;</span>
        </div>

        <div class="flex justify-center items-center flex-wrap gap-8">
            <!-- Project Card Whats4 ÚNICO -->
            <div class="group relative overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-800/70 border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-400 transition duration-300">
                <div class="absolute top-4 right-4 z-10">
                    <span class="bg-blue-500/20 text-blue-400 text-xs px-3 py-1 rounded-full cursor-help"
                          data-tooltip="WhatsApp: 90%, AI: 80%, S3: 85%">Whats4</span>
                </div>
                <img src="{{ isset($imagens[0]) ? asset($imagens[0]) : '' }}" alt="Whats4 CRM" class="w-full h-64 object-cover transition duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-100 via-gray-100/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-xl font-bold mb-2">Whats4</h3>
                        <p class="text-gray-300 mb-4">CRM de atendimento e vendas via WhatsApp com IA, campanhas, multiempresa e integração com Facebook Ads.</p>
                        <button onclick="openProjectModal('whats4')" class="inline-flex items-center text-blue-400 hover:text-blue-300">
                            Ver Detalhes <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Project Modals -->
<div id="project-modal" class="fixed inset-0 bg-gray-900/95 z-50 hidden overflow-y-auto">
    <div class="min-h-screen px-4 text-center">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-900/90 backdrop-blur-sm"></div>
        </div>

        <!-- Modal positioning -->
        <span class="inline-block h-screen align-middle" aria-hidden="true">&#8203;</span>
        
        <!-- Modal content -->
        <div class="inline-block w-full max-w-4xl my-8 text-left align-middle transition-all transform bg-gray-800/95 backdrop-blur-md shadow-xl rounded-2xl border border-gray-700 overflow-hidden">
            <!-- Close button -->
            <div class="absolute top-4 right-4 z-50">
                <button onclick="closeProjectModal()" class="text-gray-400 hover:text-white transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <!-- Modal Content -->
            <div id="modal-content" class="relative">
                <!-- Conteúdo será inserido via JavaScript -->
            </div>
        </div>
    </div>
</div>

<!-- Seção de Contato -->
<section id="contato" class="py-20 bg-white dark:bg-gray-900 transition-colors duration-300">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-gray-500 font-mono text-base tracking-wider">&lt;contact&gt;</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4 dark:text-white text-gray-900">
                Entre em Contato
            </h2>
            <p class="text-gray-600 text-lg dark:text-gray-300">Vamos conversar sobre seu projeto ou oportunidade de trabalho</p>
            <span class="text-gray-500 font-mono text-base tracking-wider">&lt;/contact&gt;</span>
        </div>

        <!-- Informações de Contato (links) -->
        <div class="max-w-3xl mx-auto mb-16">
            <h3 class="text-3xl font-bold mb-10 text-blue-400 text-center">
                Informações de Contato
            </h3>
            <div style="justify-items: center">

                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Email -->
                    <a href="mailto:edyrosnfts@gmail.com" class="block group">
                        <div class="flex items-center space-x-6 min-w-0">
                            <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-blue-500/10 group-hover:bg-blue-500/20 transition-colors">
                                <i class="far fa-envelope text-blue-400 text-2xl"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm text-gray-500 mb-1">Email</p>
                                <p class="text-lg text-gray-300 group-hover:text-blue-400 transition-colors truncate">edyrosnfts@gmail.com</p>
                            </div>
                        </div>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://wa.me/5512997561047" target="_blank" class="block group">
                        <div class="flex items-center space-x-6 min-w-0">
                            <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-green-500/10 group-hover:bg-green-500/20 transition-colors">
                                <i class="fab fa-whatsapp text-green-400 text-2xl"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm text-gray-500 mb-1">WhatsApp</p>
                                <p class="text-lg text-gray-300 group-hover:text-green-400 transition-colors truncate">+55 (12) 99756-1047</p>
                            </div>
                        </div>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/in/edyros-nfts-54ab3a363/" target="_blank" class="block group">
                        <div class="flex items-center space-x-6 min-w-0">
                            <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-blue-500/10 group-hover:bg-blue-500/20 transition-colors">
                                <i class="fab fa-linkedin-in text-blue-400 text-2xl"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm text-gray-500 mb-1">LinkedIn</p>
                                <p class="text-lg text-gray-300 group-hover:text-blue-400 transition-colors truncate">linkedin.com/Edyros</p>
                            </div>
                        </div>
                    </a>
                    <!-- GitHub -->
                    <a href="https://github.com/Edyros" target="_blank" class="block group">
                        <div class="flex items-center space-x-6 min-w-0">
                            <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-blue-500/10 group-hover:bg-blue-500/20 transition-colors">
                                <i class="fab fa-github text-blue-400 text-2xl"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm text-gray-500 mb-1">GitHub</p>
                                <p class="text-lg text-gray-300 group-hover:text-blue-400 transition-colors truncate">github.com/Edyros</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
<hr>
        <!-- Formulário -->
        <div class="max-w-3xl mx-auto mt-4">
            <h3 class="text-2xl font-bold mb-8 text-blue-300 text-center">Envie sua Mensagem</h3>
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-8">
                @csrf
                @if(session('success'))
                    <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-6 py-4 rounded-xl">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8" >
                    <div>
                        <label for="name" class="block text-base text-gray-400 mb-3">Nome</label>
                        <input type="text" name="name" id="name" required
                            class="w-full h-14 bg-[#1E293B] border-0 rounded-xl px-5 text-gray-300 text-lg focus:ring-2 focus:ring-blue-500 transition placeholder-gray-500"
                            placeholder="Seu nome">
                        @error('name')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-base text-gray-400 mb-3">Email</label>
                        <input type="email" name="email" id="email" required
                            class="w-full h-14 bg-[#1E293B] border-0 rounded-xl px-5 text-gray-300 text-lg focus:ring-2 focus:ring-blue-500 transition placeholder-gray-500"
                            placeholder="seu@email.com">
                        @error('email')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="message" class="block text-base text-gray-400 mb-3">Mensagem</label>
                    <textarea name="message" id="message" rows="6" required
                        class="w-full bg-[#1E293B] border-0 rounded-xl px-5 py-4 text-gray-300 text-lg focus:ring-2 focus:ring-blue-500 transition placeholder-gray-500"
                        placeholder="Sua mensagem aqui..."></textarea>
                    @error('message')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center">
                    <button type="submit" 
                        class="w-full md:w-auto px-8 h-14 bg-blue-500 hover:bg-blue-600 text-white text-lg font-medium rounded-xl transition-colors flex items-center justify-center space-x-3">
                        <span>Enviar Mensagem</span>
                        <i class="far fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('scripts')
@parent
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const texts = ['FULLSTACK DEVELOPER', 'PHP SPECIALIST', 'API ARCHITECT'];
    const typingElement = document.getElementById('typing-text');
    let currentTextIndex = 0;
    let currentCharIndex = 0;

    function updateText() {
        const currentText = texts[currentTextIndex];
        typingElement.textContent = currentText.substring(0, currentCharIndex);
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function typeText() {
        const currentText = texts[currentTextIndex];
        
        // Digita o texto
        while (currentCharIndex < currentText.length) {
            currentCharIndex++;
            updateText();
            await sleep(100);
        }

        // Pausa com texto completo
        await sleep(2000);

        // Apaga o texto
        while (currentCharIndex > 0) {
            currentCharIndex--;
            updateText();
            await sleep(50);
        }

        // Pausa antes do próximo texto
        await sleep(1000);

        // Prepara para o próximo texto
        currentTextIndex = (currentTextIndex + 1) % texts.length;
        currentCharIndex = 0;

        // Inicia o próximo ciclo
        typeText();
    }

    // Inicia a animação
    typeText();

    // Tooltip
    const tooltips = document.querySelectorAll('[data-tooltip]');
    
    tooltips.forEach(el => {
        const tooltip = document.createElement('div');
        tooltip.className = 'absolute hidden bg-gray-900 text-white text-sm px-3 py-2 rounded-lg border border-gray-700 z-50 w-48';
        tooltip.style.bottom = 'calc(100% + 5px)';
        tooltip.style.left = '50%';
        tooltip.style.transform = 'translateX(-50%)';
        
        el.addEventListener('mouseenter', () => {
            tooltip.textContent = el.getAttribute('data-tooltip');
            el.appendChild(tooltip);
            tooltip.classList.remove('hidden');
        });
        
        el.addEventListener('mouseleave', () => {
            tooltip.classList.add('hidden');
        });
    });

    // Project Details
    const projectDetails = {
        'whats4': {
            title: 'Whats4',
            image: "{{ asset('img/projects/whats4.jpg') }}",
            demoUrl: 'https://lp.whats4.com.br',
            githubUrl: '',
            description: `
                <div class=\"space-y-8\">
                    <div class=\"relative w-full h-[300px] overflow-hidden rounded-t-2xl\">
                        @if(isset($imagens) && count($imagens) > 0)
                            <div id=\"carousel-whats4\" class=\"relative w-full h-full\">
                                <div class=\"swiper-wrapper\">
                                    @foreach($imagens as $idx => $img)
                                        <div class=\"swiper-slide w-full h-full\">
                                            <img src=\"{{ asset($img) }}\" alt=\"Imagem Whats4 {{ $idx+1 }}\" class=\"w-full h-full object-cover\">
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Botões de navegação -->
                                <div class=\"swiper-button-next\"></div>
                                <div class=\"swiper-button-prev\"></div>
                                <div class=\"swiper-pagination\"></div>
                            </div>
                        @else
                            <img src=\"{{ isset($imagens[0]) ? asset($imagens[0]) : '' }}\" alt=\"Whats4 CRM\" class=\"w-full h-full object-cover\">
                        @endif
                        <div class=\"absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/50 to-transparent pointer-events-none\"></div>
                    </div>
                    <div class=\"px-8 pb-8 space-y-8\">
                        <div class=\"flex flex-wrap gap-4\">
                            <a href=\"https://lp.whats4.com.br\" target=\"_blank\" 
                               class=\"inline-flex items-center px-4 py-2 bg-blue-500/10 text-blue-400 rounded-lg hover:bg-blue-500/20 transition-all\">
                                <i class=\"fas fa-external-link-alt mr-2\"></i>
                                Acessar Plataforma
                            </a>
                        </div>
                        <div>
                            <h3 class=\"text-xl font-bold mb-4\">Descrição do Projeto</h3>
                            <p class=\"text-gray-300 leading-relaxed\">
                                Plataforma robusta de CRM para atendimento e vendas via WhatsApp, desenvolvida para empresas que buscam automação, integração e performance em comunicação. Permite disparos em massa, gerenciamento dinâmico de setores, criação de chatbots personalizados, integração com inteligência artificial treinável, campanhas de anúncios via Facebook Ads (OAuth2), e muito mais.
                            </p>
                        </div>
                        <div>
                            <h4 class=\"font-bold mb-4\">Tecnologias Utilizadas</h4>
                            <div class=\"flex flex-wrap gap-2\">
                                <span class=\"px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-sm\">Servidor próprio de WhatsApp</span>
                                <span class=\"px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-sm\">Múltiplos servidores de disparo</span>
                                <span class=\"px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-sm\">Integração OAuth2 Facebook</span>
                                <span class=\"px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-sm\">S3 Navegação Visual</span>
                                <span class=\"px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-sm\">Inteligência Artificial</span>
                            </div>
                        </div>
                        <div>
                            <h4 class=\"font-bold mb-4\">Principais Funcionalidades</h4>
                            <ul class=\"grid grid-cols-1 md:grid-cols-2 gap-4\">
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Disparo em massa via múltiplos servidores</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Gerenciamento dinâmico de setores e chatbots</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Criação e treinamento de IA por setor</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Campanhas e anúncios pagos via Facebook Ads</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Gerenciamento visual de arquivos no S3</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Envio de imagem, áudio e vídeo</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Multiempresa e multiusuário</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Gerenciamento de produtos, clientes e contatos</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Carrinho de compras integrado à conversa</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Mensagens padronizadas, etiquetas, estatísticas</span></li>
                                <li class=\"flex items-start space-x-2\"><i class=\"fas fa-check-circle text-green-400 mt-1\"></i><span class=\"text-gray-300\">Detecção automática de novos contatos</span></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class=\"font-bold mb-4\">Diferenciais</h4>
                            <ul class=\"list-disc pl-6 text-gray-300 space-y-2\">
                                <li>Redução de erros em orçamentos e vendas</li>
                                <li>Agilidade no atendimento e automação de processos</li>
                                <li>Visual moderno e intuitivo para navegação de arquivos e setores</li>
                            </ul>
                        </div>
                    </div>
                </div>
            `
        }
    };

    function openProjectModal(projectId) {
        const modal = document.getElementById('project-modal');
        const content = document.getElementById('modal-content');
        const project = projectDetails[projectId];
        
        if (project) {
            content.innerHTML = `
                <h2 class=\"text-3xl font-bold px-8 py-6 border-b border-gray-700\">${project.title}</h2>
                ${project.description}
            `;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeProjectModal() {
        const modal = document.getElementById('project-modal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Fechar modal ao clicar fora
    document.getElementById('project-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeProjectModal();
        }
    });

    // Fechar modal com tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeProjectModal();
        }
    });

    // Inicializar o carrossel do Whats4 se existir
    if (document.getElementById('carousel-whats4')) {
        new Swiper('#carousel-whats4', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    // No final do script, registre openProjectModal e closeProjectModal no window
    window.openProjectModal = openProjectModal;
    window.closeProjectModal = closeProjectModal;
});
</script>
@endsection 