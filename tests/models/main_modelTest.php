<?php

use PHPUnit\Framework\TestCase;

class main_modelTest extends TestCase
{
    protected function setUp() : void {
    }

    protected function tearDown() : void {
    }

    public function testModelExists() {
        $this->assertTrue(file_exists('core/models/main.model.php'));
    }
}