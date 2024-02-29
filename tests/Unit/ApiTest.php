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
}

?>