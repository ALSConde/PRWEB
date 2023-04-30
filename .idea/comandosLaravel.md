# Comandos Laravel

## criar projeto
> composer create-project --prefer-dist laravel/laravel=version nomeAplicacao

## Iniciar servidor
> php artisan serve

## Criar controller
> php artisan make:controller ${dir}\NomeController

## Criar model
> php artisan make:model ${dir}/NomeModel -m
> php artisan make:model ${dir}\NomeMigration --all cria tudo relacionado a classe
> php artisan make:model ${dir}\NomeMigration -a cria tudo relacionado a classe

Cuidado ao utilizar o -m, pois ele cria uma migration para o model podendo gerar conflitos caso exista relacionamentos entre as tabelas de muitos para muitos.

> php artisan make:migration ${dir}\NomeMigration

## Gerar tabelas
> php artisan migrate 

## Dados para teste
> php artisan make:seeder ${dir}\NomeSeeder

## Criar classes de validação
> php artisan make:request ${dir}\NomeRequest

## Criar componentes
> php artisan make:component NomeComponent

## comando para user interface
> composer require laravel/ui
> php artisan ui TechFrontend --auth
> php artisan ui bootstrap --auth

## Conteiners docker
> docker-compose up -d nginx mysql phpmyadmin

## Erro ao encontrar o arquivo php.ini
>- Abrir php.ini
>- linha 763: add C:


## itens para estudo
>- MailCatcher (https://mailcatcher.me/) - para testar envio de email utiliza Ruby
