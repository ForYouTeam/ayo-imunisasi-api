<?php

namespace App\Http\Controllers\BackOffice;

use App\Contracts\ChildrenContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChildrenRequest;
use App\Repositories\ChildrenRepository;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    private ChildrenContract $childrenRepo;
    public function __construct()
    {
        $this->childrenRepo = new ChildrenRepository;
    }

    public function getAllData()
    {
        $result = collect($this->childrenRepo->getAllPayload([]));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function getDataById(int $id)
    {
        $result = collect($this->childrenRepo->getPayloadById($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function upsertData(ChildrenRequest $request)
    {
        $id = $request->id | null;
        $result = collect($this->childrenRepo->upsertPayload($id, $request->all()));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function deleteData(int $id)
    {
        $result = collect($this->childrenRepo->deletePayload($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }
}
