### CRUD EP SISTEMAS

### Configuração 

- Crie o arquivo `.env` (Veja .env.example)
- Configure um valor para `APP_KEY` (The only supported ciphers are AES-128-CBC and AES-256-CBC)
- Configure um valor para `DB_PASSWORD` (Senha do root para o MySQL)

### Rodando a aplicação
$ php artisan serve http://localhost:8000

## Comandos úteis das seeds
- php artisan db:seed

## Rodar migrations
- php artisan migration