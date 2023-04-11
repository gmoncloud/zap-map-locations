<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\ResourceCollection;

interface LocationRepositoryInterface
{
    public function getNearestLocation(float $latitude, float $longitude, float $radius): ResourceCollection;

}