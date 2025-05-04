<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Meta Tags Básicas -->
    <title>@yield('title') - {{ config('app.name', 'Eduardo - Desenvolvedor Full Stack') }}</title>
    <meta name="description" content="@yield('meta_description', 'Desenvolvedor Full Stack especializado em PHP, Laravel, JavaScript e desenvolvimento web. Portfólio profissional com projetos e habilidades.')">
    <meta name="keywords" content="desenvolvedor, programador, PHP, Laravel, JavaScript, full stack, portfólio, desenvolvimento web">
    <meta name="author" content="Eduardo">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title') - {{ config('app.name', 'Eduardo - Desenvolvedor Full Stack') }}">
    <meta property="og:description" content="@yield('meta_description', 'Desenvolvedor Full Stack especializado em PHP, Laravel, JavaScript e desenvolvimento web. Portfólio profissional com projetos e habilidades.')">
    <meta property="og:image" content="{{ asset('img/profile.jpg') }}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title') - {{ config('app.name', 'Eduardo - Desenvolvedor Full Stack') }}">
    <meta name="twitter:description" content="@yield('meta_description', 'Desenvolvedor Full Stack especializado em PHP, Laravel, JavaScript e desenvolvimento web. Portfólio profissional com projetos e habilidades.')">
    <meta name="twitter:image" content="{{ asset('img/profile.jpg') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    
    <!-- Preconnect para recursos externos -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|fira-code:400,500&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
    
    <!-- Schema.org markup para Google+ -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Eduardo Rafael",
        "jobTitle": "Desenvolvedor Full Stack",
        "url": "{{ url()->current() }}",
        "sameAs": [
            "https://github.com/seu-usuario",
            "https://linkedin.com/in/seu-usuario"
        ],
        "description": "Desenvolvedor Full Stack especializado em PHP, Laravel, JavaScript e desenvolvimento web."
    }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 antialiased">
    <!-- Header/Navegação -->
    <header class="fixed w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm border-b border-gray-200 dark:border-gray-800 z-50" style="padding: 20px;">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <a href="/" class="text-xl font-bold bg-gradient-to-r from-purple-600 to-blue-500 bg-clip-text text-transparent flex items-center">
                    <i class="fas fa-code mr-2"></i>Eduardo Rafael
                </a>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="#sobre" class="nav-link hover:text-purple-600 dark:hover:text-purple-400 transition flex items-center">
                    <i class="fas fa-user mr-2"></i>Sobre
                </a>
                <a href="#habilidades" class="nav-link hover:text-purple-600 dark:hover:text-purple-400 transition flex items-center">
                    <i class="fas fa-code-branch mr-2"></i>Habilidades
                </a>
                <a href="#projetos" class="nav-link hover:text-purple-600 dark:hover:text-purple-400 transition flex items-center">
                    <i class="fas fa-project-diagram mr-2"></i>Projetos
                </a>
                <a href="#contato" class="nav-link hover:text-purple-600 dark:hover:text-purple-400 transition flex items-center">
                    <i class="fas fa-envelope mr-2"></i>Contato
                </a>
                
                <!-- Botões de Tema e Idioma -->
                <div class="flex items-center space-x-4">
                    <!-- Botão de Idioma -->
                    <div class="flex space-x-2">
                        <a href="{{ route('language.switch', 'pt_BR') }}" 
                           class="px-3 py-1 rounded-lg text-sm font-medium transition-colors duration-200 {{ app()->getLocale() == 'pt_BR' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600' }}">
                            PT
                        </a>
                        <a href="{{ route('language.switch', 'en') }}" 
                           class="px-3 py-1 rounded-lg text-sm font-medium transition-colors duration-200 {{ app()->getLocale() == 'en' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600' }}">
                            EN
                        </a>
                    </div>
                    
                    <!-- Botão de Tema -->
                    <button id="theme-toggle" aria-label="Alternar tema claro/escuro" class="px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100 flex items-center gap-2 transition-colors duration-300 focus:outline-none">
                        <i id="icon-sun" class="fas fa-sun text-lg"></i>
                        <i id="icon-moon" class="fas fa-moon text-lg"></i>
                        <span id="theme-label" class="text-sm font-medium"></span>
                    </button>
                </div>
            </div>
            
            <button id="menu-toggle" class="md:hidden ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm z-40 hidden">
        <div class="fixed inset-y-0 right-0 w-full max-w-xs bg-white dark:bg-gray-900 shadow-xl">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-800">
                    <span class="text-xl font-bold">Menu</span>
                    <button id="menu-close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col space-y-4 p-4">
                    <a href="#sobre" class="nav-link hover:text-purple-600 dark:hover:text-purple-400 transition flex items-center">
                        <i class="fas fa-user mr-2"></i>Sobre
                    </a>
                    <a href="#habilidades" class="nav-link hover:text-purple-600 dark:hover:text-purple-400 transition flex items-center">
                        <i class="fas fa-code-branch mr-2"></i>Habilidades
                    </a>
                    <a href="#projetos" class="nav-link hover:text-purple-600 dark:hover:text-purple-400 transition flex items-center">
                        <i class="fas fa-project-diagram mr-2"></i>Projetos
                    </a>
                    <a href="#contato" class="nav-link hover:text-purple-600 dark:hover:text-purple-400 transition flex items-center">
                        <i class="fas fa-envelope mr-2"></i>Contato
                    </a>
                    
                    <!-- Botões de Tema e Idioma no Menu Mobile -->
                    <div class="flex flex-col space-y-4 pt-4 border-t border-gray-200 dark:border-gray-800">
                        <!-- Botão de Idioma -->
                        <div class="flex space-x-2">
                            <a href="{{ route('language.switch', 'pt_BR') }}" 
                               class="flex-1 px-3 py-2 text-center rounded-lg text-sm font-medium transition-colors duration-200 {{ app()->getLocale() == 'pt_BR' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600' }}">
                                PT
                            </a>
                            <a href="{{ route('language.switch', 'en') }}" 
                               class="flex-1 px-3 py-2 text-center rounded-lg text-sm font-medium transition-colors duration-200 {{ app()->getLocale() == 'en' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600' }}">
                                EN
                            </a>
                        </div>
                        
                        <!-- Botão de Tema -->
                        <button id="theme-toggle-mobile" class="w-full px-3 py-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100 flex items-center justify-center gap-2 transition-colors duration-300">
                            <i id="icon-sun-mobile" class="fas fa-sun"></i>
                            <i id="icon-moon-mobile" class="fas fa-moon"></i>
                            <span id="theme-label-mobile" class="text-sm font-medium"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteúdo Principal -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 mt-20">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    © {{ date('Y') }} Eduardo. Todos os direitos reservados.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="https://github.com/seu-usuario" target="_blank" class="text-gray-600 hover:text-purple-600 dark:text-gray-400 dark:hover:text-purple-400">
                        <span class="sr-only">GitHub</span>
                        <i class="fab fa-github text-2xl"></i>
                    </a>
                    <a href="https://linkedin.com/in/seu-usuario" target="_blank" class="text-gray-600 hover:text-purple-600 dark:text-gray-400 dark:hover:text-purple-400">
                        <span class="sr-only">LinkedIn</span>
                        <i class="fab fa-linkedin text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Menu Mobile Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const menuClose = document.getElementById('menu-close');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
        });

        menuClose.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });

        // Fechar menu ao clicar em links
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // Scroll suave para links de navegação
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const headerOffset = 80; // Altura do header
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Função para alternar tema e salvar preferência
        function setTheme(dark) {
            const iconSun = document.getElementById('icon-sun');
            const iconMoon = document.getElementById('icon-moon');
            const themeLabel = document.getElementById('theme-label');
            const iconSunMobile = document.getElementById('icon-sun-mobile');
            const iconMoonMobile = document.getElementById('icon-moon-mobile');
            const themeLabelMobile = document.getElementById('theme-label-mobile');
            
            if (dark) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                iconSun.style.display = 'inline';
                iconMoon.style.display = 'none';
                themeLabel.textContent = 'White';
                iconSunMobile.style.display = 'inline';
                iconMoonMobile.style.display = 'none';
                themeLabelMobile.textContent = 'White';
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                iconSun.style.display = 'none';
                iconMoon.style.display = 'inline';
                themeLabel.textContent = 'Dark';
                iconSunMobile.style.display = 'none';
                iconMoonMobile.style.display = 'inline';
                themeLabelMobile.textContent = 'Dark';
            }
        }

        // Detecta preferência inicial
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                setTheme(true);
            } else {
                setTheme(false);
            }
        })();

        // Alternância ao clicar
        const themeToggle = document.getElementById('theme-toggle');
        const themeToggleMobile = document.getElementById('theme-toggle-mobile');
        
        themeToggle.addEventListener('click', function() {
            const isDark = document.documentElement.classList.contains('dark');
            setTheme(!isDark);
        });

        themeToggleMobile.addEventListener('click', function() {
            const isDark = document.documentElement.classList.contains('dark');
            setTheme(!isDark);
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Adiciona evento de clique nos links de idioma
            document.querySelectorAll('a[href*="language/"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.location.href = this.href;
                });
            });
        });
    </script>
    @yield('scripts')
</body>
</html> 