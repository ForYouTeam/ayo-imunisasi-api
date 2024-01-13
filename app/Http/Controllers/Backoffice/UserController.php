<?php

namespace App\Http\Controllers\Backoffice;

use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserContract $userRepo;
    public function __construct()
    {
        $this->userRepo = new UserRepository;
    }

    public function getAllData()
    {
        $result = collect($this->userRepo->getAllPayload([]));
        $code = $result->code;

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function getDataById(int $id)
    {
        $result = collect($this->userRepo->getPayloadById($id));
        $code = $result->code;

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function upsertData(UserRequest $request)
    {
        $id = $request->id | null;
        $result = collect($this->userRepo->upsertPayload($id, $request->all()));
        $code = $result->code;

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function deleteData(int $id)
    {
        $result = collect($this->userRepo->deletePayload($id));
        $code = $result->code;

        $result = $result->forget('code');
        return response()->json($result, $code);
    }
}
