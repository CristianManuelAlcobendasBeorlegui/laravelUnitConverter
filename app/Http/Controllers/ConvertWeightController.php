<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConvertWeightController extends Controller
{
    /**
     * Return given value from kilograms to pounds and
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
                        case 'KILOGRAMS':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value * 2.204623),
                                    'valueConvertedTo' => 'POUNDS',
                                    'msg' => $value . ' ' . (($value > 1) ? 'KILOGRAMS' : 'KILOGRAM') . ' are ' . ($value * 2.204623) . ' POUNDS.',
                                ],
                            ];
                            break;

                        case 'POUNDS':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value * 0.4535924),
                                    'valueConvertedTo' => 'KILOGRAMS',
                                    'msg' => $value . ' ' . (($value > 1) ? 'POUNDS' : 'POUND') . ' are ' . ($value * 0.4535924) . ' KILOGRAMS.',
                                ],
                            ];
                            break;
                            
                        default:
                            $response = [
                                'code' => 400,
                                'content' => [
                                    'msg' => 'ERROR: Unit (' . $unit . ') is not available. Please try with "KILOGRAMS" or "POUNDS".',
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
