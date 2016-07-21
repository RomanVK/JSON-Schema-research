<?php

require_once(__DIR__ . '/../src/Model.php');

/**
 * Created by PhpStorm.
 * User: r_kuz
 * Date: 22.07.2016
 * Time: 0:08
 */
class TestModelTest extends PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $test_model = new TestModel();
        $this->assertEquals(2, $test_model->add(1, 1));
    }
}