<?php

namespace App\Http\Controllers\BackOffice;

use App\Contracts\ScheduleContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Repositories\ScheduleRepository;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    private ScheduleContract $scheduleRepo;
    public function __construct()
    {
        $this->scheduleRepo = new ScheduleRepository;
    }

    public function getAllData()
    {
        $result = collect($this->scheduleRepo->getAllPayload([]));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function getDataById(int $id)
    {
        $result = collect($this->scheduleRepo->getPayloadById($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function upsertData(ScheduleRequest $request)
    {
        $id = $request->id | null;
        $result = collect($this->scheduleRepo->upsertPayload($id, $request->all()));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function deleteData(int $id)
    {
        $result = collect($this->scheduleRepo->deletePayload($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }
}
