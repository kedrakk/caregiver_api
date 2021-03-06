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

    public function index()
    {
        $newsfeed = FirstAid::orderBy('name', 'asc')->get();
        return $this->httpSuccess($newsfeed, 'Newsfeeds retrieved');
    }

    public function show($id)
    {
        $newsfeed = FirstAid::find($id);
        if (!$newsfeed) {
            return $this->httpNotFoundError('Newsfeed not found');
        }
        return $this->httpSuccess($newsfeed, 'Newsfeed retrieved');
    }

    public function search(Request $request)
    {
        if ($request->name == "all") {
            $newsfeed = FirstAid::all();
        } else {
            $newsfeed = FirstAid::where('name', 'like', '%' . $request->name . '%')->get();
        }
        if (!$newsfeed) {
            return $this->httpNotFoundError('Newsfeed not found');
        }
        return $this->httpSuccess($newsfeed, 'Newsfeeds retrieved');
    }
}