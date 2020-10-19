<?php


namespace App\Models;


use Core\Model;


class User extends Model
{
    public $table = 'users';

    public $attributesSignup = [
      'login' => '',
      'password' => '',
      'email' => '',
      'name' => ''
    ];

    public $rulesSignup = [
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

}