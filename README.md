
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