<?php

namespace Tests\Unit;

use App\Http\Controllers\ConvertLengthController;
use App\Http\Controllers\ConvertSpeedController;
use App\Http\Controllers\ConvertTemperatureController;
use App\Http\Controllers\ConvertVolumeController;
use App\Http\Controllers\ConvertWeightController;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase {
    /** 
     * Tests for 'ConvertLengthController' class.
     * */
    public function test_convert_length_controller() {
        $convertLengthController = new ConvertLengthController();
        $response = $convertLengthController->__invoke('adds', '100');
        $this->assertEquals(400, $response['code']);
        $this->assertEquals('ERROR: Value (adds) is not a number.', $response['content']['msg']);
        $response = $convertLengthController->__invoke('1', 'meters');
        $this->assertEquals('FEETS', $response['content']['valueConvertedTo']);
        $this->assertEquals(3.28084, $response['content']['valueConverted']);
    }

        /** 
     * Tests for 'ConvertSpeedController' class.
     * */
    public function test_convert_speed_controller() {
        $convertSpeedController = new ConvertSpeedController();
        $response = $convertSpeedController->__invoke('10', 'MILES');
        $this->assertEquals(200, $response['code']);
        $this->assertEquals(16.09344, $response['content']['valueConverted']);
        $this->assertEquals('KILOMETERS', $response['content']['valueConvertedTo']);
        $response = $convertSpeedController->__invoke('', '');
        $this->assertEquals(400, $response['code']);
        $this->assertEquals('ERROR: Value () is not a number.', $response['content']['msg']);
        $response = $convertSpeedController->__invoke('15', 'KILOMETERS');
        $this->assertEquals('15 KILOMETERS are 9.320568 MILES.', $response['content']['msg']);
    }

    /** 
     * Tests for 'ConvertTemperatureController' class.
     * */
    public function test_convert_temperature_controller() {
        $convertTemperatureController = new ConvertTemperatureController();
        $response = $convertTemperatureController->__invoke('31', 'CELSIUS');
        $this->assertEquals(87.8, $response['content']['valueConverted']);
        $this->assertEquals('FAHRENHEIT', $response['content']['valueConvertedTo']);
        $response = $convertTemperatureController->__invoke('10', 'fahrenheit');
        $this->assertEquals(200, $response['code']);
        $this->assertEquals(-12.222222222222221, $response['content']['valueConverted']);
        $this->assertEquals('CELSIUS', $response['content']['valueConvertedTo']);
    }

    /** 
     * Tests for 'ConvertVolumeController' class.
     * */
    public function test_convert_volume_controller() {
        $convertVolumeController = new ConvertVolumeController();
        $response = $convertVolumeController->__invoke('coca-cola', '1');
        $this->assertEquals('ERROR: Value (coca-cola) is not a number.', $response['content']['msg']);
        $response = $convertVolumeController->__invoke('1', 'coca-cola');
        $this->assertEquals('ERROR: Unit (COCA-COLA) is not available. Please try with "LITRES" or "GALLONS".', $response['content']['msg']);
        $response = $convertVolumeController->__invoke('5', 'litres');
        $this->assertEquals('5 LITRES are 1.099846 GALLONS.', $response['content']['msg']);
        $response = $convertVolumeController->__invoke('5', '');
        $this->assertEquals('ERROR: Unit type is not specified.', $response['content']['msg']);
        $response = $convertVolumeController->__invoke('10', 'gallons');
        $this->assertEquals(45.4609, $response['content']['valueConverted']);
        $this->assertEquals('LITRES', $response['content']['valueConvertedTo']);
    }

    /** 
     * Tests for 'ConvertWeightController' class
     * */
    public function test_convert_weight_controller() {
        $convertWeightController = new ConvertWeightController();
        $response = $convertWeightController->__invoke('10', 'power');
        $this->assertEquals(400, $response['code']);
        $this->assertEquals('ERROR: Unit (POWER) is not available. Please try with "KILOGRAMS" or "POUNDS".', $response['content']['msg']);
        $response = $convertWeightController->__invoke('10', 'kilograms');
        $this->assertEquals('10 KILOGRAMS are 22.04623 POUNDS.', $response['content']['msg']);
        $response = $convertWeightController->__invoke('20', 'pounds');
        $this->assertEquals(9.071848, $response['content']['valueConverted']);
        $this->assertEquals('KILOGRAMS', $response['content']['valueConvertedTo']);
    }
}

?>