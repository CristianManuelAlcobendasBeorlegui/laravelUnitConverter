<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConvertLengthController extends Controller
{
    /**
     * Return given value from METERS to FEETS and
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
                        case 'METERS':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value * 3.28084),
                                    'valueConvertedTo' => 'FEETS',
                                    'msg' => $value . ' ' . (($value > 1) ? 'METERS' : 'METER') . ' are ' . ($value * 3.28084) . ' FEETS.',
                                ],
                            ];
                            break;

                        case 'FEETS':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value * 0.3048),
                                    'valueConvertedTo' => 'METERS',
                                    'msg' => $value . ' ' . (($value > 1) ? 'FEETS' : 'FEET') . ' are ' . ($value * 0.3048) . ' METERS.',
                                ],
                            ];
                            break;
                            
                        default:
                            $response = [
                                'code' => 400,
                                'content' => [
                                    'msg' => 'ERROR: Unit (' . $unit . ') is not available. Please try with "METERS" or "FEETS".',
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
