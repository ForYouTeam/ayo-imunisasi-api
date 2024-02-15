<?php

namespace App\Http\Controllers\BackOffice;

use App\Contracts\VisitHistoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitHistoryRequest;
use App\Repositories\VisitHistoryRepository;
use Illuminate\Http\Request;

class VisitHistoryController extends Controller
{
    private VisitHistoryContract $visitHistoryRepo;
    public function __construct()
    {
        $this->visitHistoryRepo = new VisitHistoryRepository;
    }

    public function getAllData()
    {
        $result = collect($this->visitHistoryRepo->getAllPayload([]));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function getDataById(int $id)
    {
        $result = collect($this->visitHistoryRepo->getPayloadById($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function upsertData(VisitHistoryRequest $request)
    {
        $id = $request->id | null;
        $result = collect($this->visitHistoryRepo->upsertPayload($id, $request->all()));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function deleteData(int $id)
    {
        $result = collect($this->visitHistoryRepo->deletePayload($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }
}
