<?php

namespace App\Http\Controllers\BackOffice;

use App\Contracts\ParentContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use App\Repositories\ParentRepository;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    private ParentContract $parentRepo;
    public function __construct()
    {
        $this->parentRepo = new ParentRepository;
    }

    public function getAllData()
    {
        $result = collect($this->parentRepo->getAllPayload([]));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function getDataById(int $id)
    {
        $result = collect($this->parentRepo->getPayloadById($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function upsertData(ParentRequest $request)
    {
        $id = $request->id | null;
        $result = collect($this->parentRepo->upsertPayload($id, $request->all()));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function deleteData(int $id)
    {
        $result = collect($this->parentRepo->deletePayload($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }
}
