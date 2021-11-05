### database name

 ```
tablename:peoples
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

### Needed whether catch error from permission, usage CHMOD to unlock flow and clear out errors
```
- sudo chmod 777 -R laravel-8-test/
php artisan cache:clear
```

### Guide REGISTER

- local/public/api/register
- Required

```
'name' => 'required',
'email' => 'required|email',
'password' => 'required',
'c_password' => 'required|same:password',

```

### Guide LOGIN RESPONSE TOKEN

- local/public/api/register
- Required

```
'email' => 'required|email',
'password' => 'required',

```
# Whatever that you do request need Authentication
- Teste authentication just remove token from header
- get error from middleware \App\Http\Middleware\AuthApiForToken::class

# Authorized
```
All request (create,delete,all,read specify data)
```

### register task required
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