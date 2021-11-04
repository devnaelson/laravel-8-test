
sudo chmod 777 -R laravel-8-test/

- local/public/api/register
- Required
``
'name' => 'required',
'email' => 'required|email',
'password' => 'required',
'c_password' => 'required|same:password',

``