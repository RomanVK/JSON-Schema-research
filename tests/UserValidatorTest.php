<?php

require_once(__DIR__ . '/../src/UserValidator.php');

class UserValidatorTest extends PHPUnit_Framework_TestCase
{
    public  function testIsValidUser()
    {
        $json = file_get_contents(__DIR__ . '/../tests/user_data_example.json');
        $user_validator = new UserValidator();
        $this->assertTrue($user_validator->isValidUser($json));
    }
}
