# Backend Femaqua

A aplicação se trata de um simples repositório para gerenciar ferramentas com seus respectivos nomes, links, descrições e tags. Foi construída utilizando Laravel (PHP) e MySql solução de banco de dados. A API também foi documentada utilizando o Swagger.

[Acesse o manual](https://decorous-venus-7f3.notion.site/Desafio-Backend-Biztrip-8625357a51304c70b79c82e30b5bcb10)


### Passo a passo
Clone Repositório
```sh
git clone https://github.com/NathanAlbuquerque/femaqua-backend.git
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec app bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Rodar migração das tabelas
```sh
php artisan migrate --seed
```


Acessar o projeto
[http://localhost:8989](http://localhost:8989)
