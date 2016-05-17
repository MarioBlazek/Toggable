# Toggable installation instructions

### Use Composer

Run the following from your website root folder to install Toggable:

```
$ composer require marioblazek/toggable
```

// token authentication
    return array(
        'marek_toggable' => array(
            'base_uri' => 'https://www.toggl.com/api/v8/',
            'security' => array(
                'token' => 'some_token',
            ),
        ),
    );

// example config for username and password authentication

/*
    return array(
        'marek_toggable' => array(
            'base_uri' => 'https://www.toggl.com/api/v8/',
            'security' => array(
                'username' => 'some_username',
                'password' => 'some_password',
            ),
        ),
    );
*/
