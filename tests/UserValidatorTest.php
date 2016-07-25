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

    /**
     * @return array
     */
    public function userValidData()
    {
        return [
            ['{
                "email": "email_example@site-name.domain-name",
                "password": "abc123$%^",
                "first_name": "John",
                "last_name": "Doe",
                "picture": "some-protocol://site_example.com/file_name.some_extension"
            }']
        ];
    }

    /**
     * @param string $user_valid_data
     * @dataProvider userValidData
     */
    public  function testIsValidUserReturnTrue($user_valid_data)
    {
        $json = $user_valid_data;
        $this->assertTrue($this->user_validator->isValidUser($json));
    }

    /**
     * @return array
     */
    public function userInvalidData()
    {
        return [
            ['{
                "email": "@site-name.domain-name",
                "password": "abc123$%^",
                "first_name": "John",
                "last_name": "Doe",
                "picture": "some-protocol://site_example.com/file_name.some_extension"
            }'],
            ['{
                "email": "email_example@site-name.domain-name",
                "password": "abc123$%^",
                "first_name": "John",
                "last_name": "Doe",
                "picture": "site_example.com/file_name.some_extension"
            }']
        ];
    }

    /**
     * @param string $user_invalid_data
     * @dataProvider userInvalidData
     */
    public  function testIsValidUserReturnFalse($user_invalid_data)
    {
        $json = $user_invalid_data;
        $this->assertFalse($this->user_validator->isValidUser($json));
    }
}
