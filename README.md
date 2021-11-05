### Dependency

```

composer require peterpetrus/passport-token

```

### Needed whether catch error from permission, usage CHMOD to unlock flow and clear out errors
```
- sudo chmod 777 -R laravel-8-test/
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

### Guide LOGIN

- local/public/api/register
- Required

```
'email' => 'required|email',
'password' => 'required',

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