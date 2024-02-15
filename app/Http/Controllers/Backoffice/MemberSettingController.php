<?php

namespace App\Http\Controllers\BackOffice;

use App\Contracts\MemberSettingContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberSettingRequest;
use App\Repositories\MemberSettingRepository;
use Illuminate\Http\Request;

class MemberSettingController extends Controller
{
    private MemberSettingContract $memberSettingRepo;
    public function __construct()
    {
        $this->memberSettingRepo = new MemberSettingRepository;
    }

    public function getAllData()
    {
        $result = collect($this->memberSettingRepo->getAllPayload([]));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function getDataById(int $id)
    {
        $result = collect($this->memberSettingRepo->getPayloadById($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function upsertData(MemberSettingRequest $request)
    {
        $id = $request->id | null;
        $result = collect($this->memberSettingRepo->upsertPayload($id, $request->all()));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function deleteData(int $id)
    {
        $result = collect($this->memberSettingRepo->deletePayload($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }
}
