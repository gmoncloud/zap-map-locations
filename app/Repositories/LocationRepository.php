<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\LocationRepositoryInterface;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LocationRepository implements LocationRepositoryInterface
{
    /**
     * @param float $latitude
     * @param float $longitude
     * @param float $radius
     * @return ResourceCollection
     */
    public function getNearestLocation(float $latitude, float $longitude, float $radius): ResourceCollection
    {
        $haversine = "(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude))))";

        return LocationResource::collection(
            Location::selectRaw("* , $haversine as distance")
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->get()
        );
    }
}