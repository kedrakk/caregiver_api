<?php

namespace App\Http\Controllers\Api;

use App\Helper\HasApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlarmRequest;
use App\Models\Alarm;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    use HasApiResponse;

    //store
    public function store(AlarmRequest $request)
    {
        $alarm = new Alarm();
        $alarm->alarm_time = $request->alarm_time;
        $alarm->flag_id = $request->flag_id ?? 1;
        $alarm->save();
        return $this->httpCreated($alarm, 'Alarm created');
    }

    //show
    public function show(int $flag)
    {
        $alarm = Alarm::where('flag_id', $flag)->get();
        if ($alarm) {
            return $this->httpSuccess($alarm, 'Alarm found');
        }
        return $this->httpNotFound('Alarm not found');
    }

    //update
    public function update(Request $request, int $id)
    {
        $alarm = Alarm::findOrFail($id);
        if ($alarm) {
            $alarm->flag_id = $request->flag_id;
            $alarm->save();
            return $this->httpSuccess($alarm, 'Alarm updated');
        }
        return $this->httpNotFound('Alarm not found');
    }
}