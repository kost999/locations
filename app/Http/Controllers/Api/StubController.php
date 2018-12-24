<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Faker\Generator as Faker;
use Illuminate\Http\JsonResponse;

class StubController extends Controller
{
    public function index(Faker $faker): JsonResponse
    {
        $error = $faker->boolean;
        if ($error) {
            $response = [
                'success' => false,
                'data'    => [
                    'message' => 'Something went wrong',
                    'code'    => 500,
                ],
            ];
        } else {
            $response = [
                'success' => true,
                'data'    => [
                    'locations' => [
                        [
                            'name'        => 'Eiffel Tower',
                            'coordinates' => [
                                'lat' => 21.12,
                                'lon' => 19.56,
                            ],
                        ],
                        [
                            'name'        => 'Something else',
                            'coordinates' => [
                                'lat' => 21.13,
                                'lon' => 19.54,
                            ],
                        ],
                        [
                            'name'        => 'Something else 2',
                            'coordinates' => [
                                'lat' => 21.18,
                                'lon' => 19.34,
                            ],
                        ],
                    ],
                ],
            ];
        }
        
        return \response()->json(
            $response,
            $error ? 500 : 200
        );
    }
}
