<?php


namespace App\Models;

use Core\Libs\Cache;
use Core\Libs\Registr;
use Core\Model;
use Valitron\Validator;


class User extends Model
{
    protected $table = 'users';
    protected $sessionTable = 'users_session';
    protected $errors = [];
    protected $attributesSignup = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => ''
    ];
    protected $attributesLogin = [
        'login' => '',
        'password' => ''
    ];

    protected $rulesSignup = [
        'required' => [
            ['login'],
            ['password'],
            ['email'],
            ['name']
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['password', 6]
        ]
    ];
    protected $rulesLogin = [
        'required' => [
            ['login'],
            ['password']
        ],
        'lengthMin' => [
            ['password', 6]
        ]
    ];


    public function validate($attributes, $rules)
    {
        Validator::lang('ru');
        $validator = new Validator($attributes);
        $validator->rules($rules);
        if ($validator->validate()) return true;
        $errors = call_user_func_array('array_merge', $validator->errors());
        $this->errors = array_shift($errors);
    }


    public function getErrors()
    {
        $_SESSION['errors'] = $this->errors;
    }



}