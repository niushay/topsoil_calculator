<?php
use PHPUnit\Framework\TestCase;
use Services\calculation;

class CalculatorTest extends TestCase
{
    private $calculation;

    protected function setUp():void
    {
        $this->calculation = new calculation('yard', 'inch', 25, 45);
    }

    public function testSetMeasurementUnit()
    {
        $this->assertEquals('yard', $this->calculation->setMeasurementUnit('yard'));
    }

    public function testSetDepthMeasurement()
    {
        $this->assertEquals('inch', $this->calculation->setDepthMeasurement('inch'));
    }

    public function testSetDimensions()
    {
        $this->assertSame([
            'length' => 22.86,
            'width' => 41.147999999999996,
            'depth' => 1.4
        ], $this->calculation->setDimensions(25, 45));
    }

    public function testCalculateBagsNumber()
    {
        $this->assertEquals(33, $this->calculation->calculateBagsNumber());
    }
}