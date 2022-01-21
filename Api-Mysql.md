- Author - Developer Naelson
- Test to Jobs 
- Laravel 8 and note see the requirements 
- Note, like taken look on PDFs don't have update endpoit describe, but did it

### Table Name

```
tablename:peoples, é preciso rodar o comandos artisan logo a baixo!
```

### Endpoints

```
./postman-collections
```

### Dependency Commandas

```
composer require laravel/passport
php artisan migrate
php artisan passport:install
composer require peterpetrus/passport-token

```
### Necessário se quer pegar erros de permissão, uso do chmod, para desblockear e limpar erros
```
sudo chmod 777 -R laravel-8-test/
php artisan cache:clear
```

### Guia de registrar usuário novo, login e get token

- local/public/api/v1/register
- Required

```
'name' => 'required',
'email' => 'required|email',
'password' => 'required',
'c_password' => 'required|same:password',
```

### Guia para logar e ter o token como resposta

```
- local/public/api/v1/login
- Required

'email' => 'required|email',
'password' => 'required',

```

### sempre que você fazer solicitação, você precisa autenticar.

```
    - Teste authentication just remove token from header
    - get error from middleware \App\Http\Middleware\AuthApiForToken::class
```

### Depois disso você ta Authorized fazer request nessa lista de endpoints

```
All request (create
=> 'local/public/api/v1/create'
,delete
=> 'local/public/api/v1/deleteAll'
,all
=> 'local/public/api/v1/selectAll'
,read specify data
=> 'local/public/api/v1/selectBy'
)
```

### register task required, Playload de erros de validação do midleware!
- Error of validation data 

```
{
    "success": false,
    "message": "Validation Error.",
    "data": {
        "full_name": [
            "The full name has already been taken."
        ]
    }
}
```