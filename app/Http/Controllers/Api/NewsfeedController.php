<?php

namespace App\Http\Controllers\Api;

use App\Helper\HasApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\FirstAidRequest;
use App\Models\FirstAid;
use Illuminate\Http\Request;

class NewsfeedController extends Controller
{

    use HasApiResponse;

    public function store(FirstAidRequest $request)
    {
        $newsfeed = new FirstAid();
        $newsfeed->name = $request->name;
        $newsfeed->instruction = $request->instruction;
        $newsfeed->caution = $request->caution;
        $newsfeed->photo = $request->photo;
        $newsfeed->save();
        return $this->httpCreated($newsfeed, 'Newsfeed created');
    }
}