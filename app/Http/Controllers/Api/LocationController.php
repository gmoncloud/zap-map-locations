<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Contracts\LocationRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    public function __construct(
        private LocationRepositoryInterface $locationRepository
    ){}

    /**
     * @param LocationRequest $request
     * @return JsonResponse
     */
    public function index(LocationRequest $request): JsonResponse
    {
        $locations = $this->locationRepository->getNearestLocation(
                (float)$request->lat,
                (float)$request->lon,
                (float)$request->radius
            );

        return response()->json([
            'locations' => $locations,
            'status' => 'success',
            'title' => 'Success',
            'success' => true
        ]);
    }
}
