Repositório do back-end da aplicação feita no desafio da Fabwork

## Instalação 

Clonagem do diretório:
```
git clone https://github.com/raianyrufino/desafio_fab_back
```

Acesse a raiz do projeto `cd desafio_fab_back`;

Baixe as dependências do projeto via composer:
```
composer update
```

Configure o autoload
```
composer dump-autoload
```

## Configuração
Criação do arquivo de configuração local:
```
cp .env.example .env
```

Criação do `APP_KEY`:
```
php artisan key:generate
```

Dentro do arquivo gerado, o que deve ser alterado (O `APP_KEY` foi gerado automático no passo anterior):
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=SomeRandomString
APP_URL=http://localhost

JWT_SECRET=SomeRandomString

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
