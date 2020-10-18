<?php


namespace App\Models;


use Core\Model;

class User extends Model
{

    public $attributes = [
      'login' => '',
      'password' => '',
      'email' => '',
      'name' => ''
    ];

    public $rulesAuth = [
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