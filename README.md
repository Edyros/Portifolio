# Portfólio - Eduardo

![Preview](public/img/preview.png)

## 📋 Sobre

Portfólio profissional desenvolvido para apresentar meus projetos e habilidades como Desenvolvedor Full Stack. O site é responsivo, otimizado para SEO e oferece uma experiência moderna e interativa.

## ✨ Características

- 🎨 Design moderno e responsivo
- 🌙 Modo claro/escuro
- 🌐 Suporte a múltiplos idiomas (PT/EN)
- 🔍 Otimizado para SEO
- ⚡ Performance otimizada
- 📱 Totalmente responsivo

## 🛠️ Tecnologias

### Frontend
- HTML5
- CSS3 (Tailwind CSS)
- JavaScript
- Font Awesome
- Google Fonts

### Backend
- PHP 8.2+
- Laravel 10.x
- MySQL
- Composer

### Ferramentas
- Vite
- Git
- XAMPP
- VS Code

## 🚀 Instalação

1. Clone o repositório:
```bash
git clone https://github.com/Edyros/Portifolio.git
cd portifolio
```

2. Instale as dependências:
```bash
composer install
npm install
```

3. Configure o ambiente:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no arquivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portifolio
DB_USERNAME=root
DB_PASSWORD=
```

5. Execute as migrações:
```bash
php artisan migrate
```

6. Compile os assets:
```bash
npm run build
```

7. Inicie o servidor:
```bash
php artisan serve
```

## 📦 Estrutura do Projeto

```
portifolio/
├── app/
│   ├── Console/
│   ├── Http/
│   ├── Services/
│   └── ...
├── config/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
└── ...
```

## 🔍 SEO

O projeto inclui várias otimizações de SEO:

- Meta tags dinâmicas
- Open Graph e Twitter Cards
- Schema.org markup
- Sitemap.xml
- Robots.txt
- URLs amigáveis
- Estrutura HTML semântica

Para gerar o sitemap:
```bash
php artisan sitemap:generate
```

Para verificar o SEO:
```bash
php artisan seo:check
```

## 🌐 Deploy

1. Configure o servidor web (Apache/Nginx)
2. Configure o domínio
3. Instale o certificado SSL
4. Execute os comandos de produção:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 🤝 Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests.

## 📞 Contato

- GitHub: [@Edyros](https://github.com/Edyros)
- LinkedIn: [Eduardo](https://linkedin.com/in/Edyros)
- Email: seu-email@exemplo.com
