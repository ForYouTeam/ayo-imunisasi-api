<?php

namespace App\Http\Controllers\BackOffice;

use App\Contracts\ResultNoteContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResultNoteRequest;
use App\Repositories\ResultNoteRepository;

class ResultNoteController extends Controller
{
    private ResultNoteContract $resultNoteRepo;
    public function __construct()
    {
        $this->resultNoteRepo = new ResultNoteRepository;
    }

    public function getAllData()
    {
        $result = collect($this->resultNoteRepo->getAllPayload([]));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function getDataById(int $id)
    {
        $result = collect($this->resultNoteRepo->getPayloadById($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function upsertData(ResultNoteRequest $request)
    {
        $id = $request->id | null;
        $result = collect($this->resultNoteRepo->upsertPayload($id, $request->all()));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }

    public function deleteData(int $id)
    {
        $result = collect($this->resultNoteRepo->deletePayload($id));
        $code = $result['code'];

        $result = $result->forget('code');
        return response()->json($result, $code);
    }
}
