<?php

namespace App\Http\Controllers\Api;

use App\Helper\HasApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    use HasApiResponse;

    public function getHospitals($lat, $lng)
    {
        $hospitals = Hospital::whereRaw("ST_Distance_Sphere(point(longitude, latitude), point($lng, $lat)) < 5000")->latest(3)->get();
        return $this->httpSuccess($hospitals, 'Nearby Hospitals retrieved');
    }
}