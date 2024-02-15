<?php

namespace App\Repositories;

use App\Contracts\ChildrenContract;
use App\Models\Children;
use App\Traits\HttpResponseModel;
use Carbon\Carbon;

class ChildrenRepository implements ChildrenContract
{
    use HttpResponseModel;

    private  Children $childrenModel;
    public function __construct()
    {
        $this->childrenModel = new Children();
    }
    public function getAllPayload(array $payload)
    {
        try {

            $data = $this->childrenModel->all();

            return $this->success($data, "success getting data");
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getPayloadById(int $id)
    {
        try {

            $find = $this->childrenModel->whereId($id)->first();

            if (!$find) {
                return $this->error('children not found', 404);
            }

            return $this->success($find, "success getting data");
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function upsertPayload($id, array $payload)
    {
        try {

            if ($id) {

                $find = $this->getPayloadById($id);

                if ($find['code'] !== 200) {
                    return $find;
                }

                $payload['updated_at'] = Carbon::now();

                $result = [
                    'data' => $this->childrenModel->whereId($id)->update($payload),
                    'message' => 'Updated data successfully'
                ];
            } else {

                $result = [
                    'data' => $this->childrenModel->create($payload),
                    'message' => 'Created data successfully'
                ];
            }

            return $this->success($result['data'], $result['message']);
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deletePayload(int $id)
    {
        try {

            $find = $this->getPayloadById($id);

            if ($find['code'] != 200) {
                return $find;
            }

            $data = $this->childrenModel->whereId($id)->delete();

            return $this->success($data, "success deleting data");
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }
}
