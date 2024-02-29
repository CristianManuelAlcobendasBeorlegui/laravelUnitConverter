<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConvertSpeedController extends Controller
{
    /**
     * Return given value from KILOMETERS to MILES and
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
                        case 'KILOMETERS':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value * 0.6213712),
                                    'valueConvertedTo' => 'MILES',
                                    'msg' => $value . ' ' . (($value > 1) ? 'KILOMETERS' : 'KILOMETER') . ' are ' . ($value * 0.6213712) . ' MILES.',
                                ],
                            ];
                            break;

                        case 'MILES':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value * 1.609344),
                                    'valueConvertedTo' => 'KILOMETERS',
                                    'msg' => $value . ' ' . (($value > 1) ? 'MILES' : 'MILE') . ' are ' . ($value * 1.609344) . ' KILOMETERS.',
                                ],
                            ];
                            break;
                            
                        default:
                            $response = [
                                'code' => 400,
                                'content' => [
                                    'msg' => 'ERROR: Unit (' . $unit . ') is not available. Please try with "KILOMETERS" or "MILES".',
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
