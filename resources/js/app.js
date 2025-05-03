import './bootstrap';
import Alpine from 'alpinejs';
import './project-modal';

window.Alpine = Alpine;
Alpine.start();

// Inicialização do aplicativo
document.addEventListener('DOMContentLoaded', () => {
    // Cache de valores das animações
    const animationCache = new Map();

    // Animação de contagem com easing
    const counters = document.querySelectorAll('.counter');
    const speed = 500; // 500ms para animação mais rápida
    
    const easeOutQuad = t => t * (2 - t); // Função de easing para suavizar a animação

    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const cacheKey = `counter-${counter.dataset.target}`;
        
        // Verifica se já tem um valor no cache
        if (animationCache.has(cacheKey)) {
            counter.innerText = animationCache.get(cacheKey);
            return;
        }

        let startTime = null;
        const animate = (currentTime) => {
            if (!startTime) startTime = currentTime;
            const progress = Math.min(1, (currentTime - startTime) / speed);
            const easedProgress = easeOutQuad(progress);
            const currentValue = Math.floor(target * easedProgress);
            
            counter.innerText = currentValue;
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                counter.innerText = target;
                animationCache.set(cacheKey, target);
            }
        };

        requestAnimationFrame(animate);
    };

    // Animação das barras de progresso com hardware acceleration
    const skillBars = document.querySelectorAll('.skill-progress');
    
    const animateSkillBar = (bar) => {
        const progress = bar.getAttribute('data-progress');
        const cacheKey = `skill-${progress}`;
        
        // Verifica se já tem um valor no cache
        if (animationCache.has(cacheKey)) {
            bar.style.width = `${animationCache.get(cacheKey)}%`;
            return;
        }

        // Configuração inicial para hardware acceleration
        bar.style.cssText = `
            width: 0%;
            transform: translateZ(0);
            backface-visibility: hidden;
            will-change: width;
            transition: width 1s cubic-bezier(0.4, 0, 0.2, 1);
        `;

        // Inicia a animação após um pequeno delay
        requestAnimationFrame(() => {
            bar.style.width = `${progress}%`;
            animationCache.set(cacheKey, progress);
            
            // Remove a transição após a animação
            setTimeout(() => {
                bar.style.transition = 'none';
                // Força um reflow para garantir que a largura seja mantida
                bar.offsetHeight;
            }, 1000);
        });
    };

    // Observer otimizado para animações
    const animationObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('counter')) {
                    animateCounter(entry.target);
                } else if (entry.target.classList.contains('skill-progress')) {
                    // Verifica se a barra já foi animada
                    if (!entry.target.dataset.animated) {
                        animateSkillBar(entry.target);
                        entry.target.dataset.animated = 'true';
                    }
                }
            }
        });
    }, {
        threshold: 0.2,
        rootMargin: '50px' // Pré-carrega um pouco antes do elemento ficar visível
    });

    // Observar elementos
    counters.forEach(counter => animationObserver.observe(counter));
    skillBars.forEach(bar => animationObserver.observe(bar));

    // Animação de scroll suave otimizada
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Formulário de contato com feedback visual
    const contactForm = document.querySelector('#contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const submitButton = contactForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.disabled = true;
            submitButton.textContent = 'Enviando...';
            
            try {
                const formData = new FormData(contactForm);
                const response = await fetch('/contato', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                if (response.ok) {
                    showNotification('Mensagem enviada com sucesso!', 'success');
                    contactForm.reset();
                } else {
                    throw new Error('Erro ao enviar mensagem');
                }
            } catch (error) {
                showNotification('Erro ao enviar mensagem. Por favor, tente novamente.', 'error');
                console.error('Erro:', error);
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });
    }

    // Função auxiliar para notificações
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed bottom-4 right-4 p-4 rounded-lg text-white ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        } transform translate-y-0 opacity-100 transition-all duration-300`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(100%)';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
});
