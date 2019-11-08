<?php

use PHPUnit\Framework\TestCase;

class point_modelTest extends TestCase
{
    protected function setUp() : void {
    }

    protected function tearDown() : void {
    }

    public function testModelExists() {
        $this->assertTrue(file_exists('core/models/point.model.php'));
    }

    public function testPointsExist() {

    }

    public function testPointsHaveCorrectStructure() {
        
    }

    // 
    // alekseychernavskiy:
    // Example Below

    // /**
    //  * @dataProvider pointProvider
    //  */
    // public function testPoint($p) {
    //     // $this->assertEquals($p, $this->point);
    // }

    // public function pointProvider() {
    //     return [
    //         [1],
    //         [2],
    //         [3],
    //         [4],
    //     ];
    // }
}