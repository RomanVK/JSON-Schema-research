<?php

require_once(__DIR__ . '/../src/UserValidator.php');

/**
 * Created by PhpStorm.
 * User: r_kuz
 * Date: 22.07.2016
 * Time: 21:42
 */
class UserValidatorTest extends PHPUnit_Framework_TestCase
{
    public  function testIsValidUser()
    {
        $json = '{"email": "test@example.com", "password": "abc123$%^", "first_name": "John", "last_name": "Doe", "picture": "https://example.com/john.jpg"}';

        $user_validator = new UserValidator();

        $this->assertTrue($user_validator->isValidUser($json));

    }
}