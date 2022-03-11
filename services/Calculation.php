<?php
namespace Services;


class calculation
{
    private $measurementUnit;
    private $depthMeasurementUnit;
    private $dimensions;
    private $database;

    public function __construct($measurementUnit, $depthMeasurementUnit, $length, $width)
    {
        $this->setMeasurementUnit($measurementUnit);
        $this->setDepthMeasurement($depthMeasurementUnit);
        $this->setDimensions($length, $width);

        $this->database = new Database();
    }

    public function setMeasurementUnit($measurementUnit)
    {
        $this->measurementUnit = $measurementUnit;
        return $this->measurementUnit;
    }

    public function setDepthMeasurement($depthUnit)
    {
        $this->depthMeasurementUnit = $depthUnit;
        return $this->depthMeasurementUnit;
    }

    public function setDimensions($length, $width)
    {
        $isMeter = !($this->measurementUnit != 'meter');

        $this->dimensions = [
            'length' => $isMeter ? $length : ConvertUnits::convert($length, $this->measurementUnit),
            'width' => $isMeter ? $width : ConvertUnits::convert($width, $this->measurementUnit),
            'depth' => 1.4
        ];
        return $this->dimensions;
    }

    public function calculateBagsNumber()
    {
        //Calculate number of bags
        $x = $this->dimensions['width'] * $this->dimensions['length'] * 0.025 ;
        $y = $x * $this->dimensions['depth'];
        $bagsCount = ceil($y);
        $cost = (int)$bagsCount * 72;

        //Insert To Table
        $this->database->insert($this->dimensions['width'], $this->dimensions['length'], $this->measurementUnit, $this->depthMeasurementUnit, $bagsCount, $cost);
        return $bagsCount;
    }
}