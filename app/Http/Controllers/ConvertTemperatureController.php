<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConvertTemperatureController extends Controller
{
    /**
     * Return given value from CELSIUS to FAHRENHEIT and
     * viceversa.
     * 
     * @param $value - 
     * @param $unit - 
     * 
     * @return Array
     */
    public function __invoke($value, $unit) {
        // Check if String $value is a number
        if (is_numeric($value)) {
            // Check if received $value is valid 
            if ($value > 0) {
                // Check if unit is not empty
                if (!empty(trim($unit))) {
                    // Convert String $value to Number
                    $value = (float) $value;

                    // Convert $unit chars to uppercase
                    $unit = strtoupper($unit);
                    
                    // SWITCH with different conversion types
                    switch ($unit) {
                        case 'CELSIUS':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value * 9/5) + 32,
                                    'valueConvertedTo' => 'FAHRENHEIT',
                                    'msg' => $value . ' CELSIUS ' . (($value > 1) ? 'degrees' : 'degree') . ' are ' . (($value * 9/5) + 32) . ' FAHRENHEIT degrees.',
                                ],
                            ];
                            break;

                        case 'FAHRENHEIT':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value - 32) * 5/9,
                                    'valueConvertedTo' => 'CELSIUS',
                                    'msg' => $value . ' FAHRENHEIT ' . (($value > 1) ? 'degrees' : 'degree') . ' are ' . (($value - 32) * 5/9) . ' CELSIUS degrees.',
                                ],
                            ];
                            break;
                            
                        default:
                            $response = [
                                'code' => 400,
                                'content' => [
                                    'msg' => 'ERROR: Unit (' . $unit . ') is not available. Please try with "CELSIUS" or "FAHRENHEIT".',
                                ],
                            ];
                    }
                } else {
                    $response = [
                        'code' => 400,
                        'content' => [
                            'msg' => 'ERROR: Unit type is not specified.',
                        ],
                    ];
                }
            } else {
                $response = [
                    'code' => 400,
                    'content' => [
                        'msg' => 'ERROR: Value must be higher than 0.',
                    ],
                ];
            }
        } else {
            $response = [
                'code' => 400,
                'content' => [
                    'msg' => 'ERROR: Value (' . $value . ') is not a number.',
                ],
            ];
        }

        // Return response
        return $response;
    }
}
