<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConvertVolumeController extends Controller
{
    /**
     * Return given value from LITRES to GALLONS and
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
                        case 'LITRES':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value * 0.2199692),
                                    'valueConvertdTo' => 'GALLONS',
                                    'msg' => $value . ' ' . (($value > 1) ? 'LITRES' : 'LITRE') . ' are ' . ($value * 0.2199692) . ' GALLONS.',
                                ],
                            ];
                            break;

                        case 'GALLONS':
                            $response = [
                                'code' => 200,
                                'content' => [
                                    'value' => $value,
                                    'unit' => $unit,
                                    'valueConverted' => ($value * 4.54609),
                                    'valueConvertedTo' => 'LITRES',
                                    'msg' => $value . ' ' . (($value > 1) ? 'GALLONS' : 'GALLON') . ' are ' . ($value * 4.54609) . ' LITRES.',
                                ],
                            ];
                            break;
                            
                        default:
                            $response = [
                                'code' => 400,
                                'content' => [
                                    'msg' => 'ERROR: Unit (' . $unit . ') is not available. Please try with "LITRES" or "GALLONS".',
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
