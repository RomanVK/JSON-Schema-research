<?php

require_once(__DIR__ . '/../src/UserValidator.php');

class UserValidatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var UserValidator
     */
    private $user_validator;

    public function setUp()
    {
        $this->user_validator = new UserValidator();
    }

    public  function testIsValidUserReturnTrue()
    {
        $json = file_get_contents(__DIR__ . '/../tests/user_data_valid.json');
        $this->assertTrue($this->user_validator->isValidUser($json));
    }

    public  function testIsValidUserReturnFalse()
    {
        $json = file_get_contents(__DIR__ . '/../tests/user_data_invalid.json');
        $this->assertFalse($this->user_validator->isValidUser($json));
    }
}
