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


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="Nathan Backend"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=femaqua
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
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


Acessar o projeto
[http://localhost:8989](http://localhost:8989)
