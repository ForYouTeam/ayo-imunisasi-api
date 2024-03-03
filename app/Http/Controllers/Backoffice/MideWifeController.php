<?php

namespace App\Http\Controllers\BackOffice;

use App\Contracts\MidwifeContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\MidwifeRequest;
use App\Repositories\MidwifeRepository;
use Illuminate\Http\Request;

class MideWifeController extends Controller
{
    private MidwifeContract $midwifeRepo;
    public function __construct()
    {
        $this->midwifeRepo = new MidwifeRepository;
    }

    public function getAllData()
    {
        $result = collect($this->midwifeRepo->getAllPayload([]));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function getDataById(int $id)
    {
        $result = collect($this->midwifeRepo->getPayloadById($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function upsertData(MidwifeRequest $request)
    {
        $id = $request->id | null;
        $result = collect($this->midwifeRepo->upsertPayload($id, $request->all()));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function deleteData(int $id)
    {
        $result = collect($this->midwifeRepo->deletePayload($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }
}
