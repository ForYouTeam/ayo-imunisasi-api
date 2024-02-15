<?php

namespace App\Repositories;

use App\Contracts\MemberSettingContract;
use App\Models\MemberSetting;
use App\Traits\HttpResponseModel;
use Carbon\Carbon;

class MemberSettingRepository implements MemberSettingContract
{
    use HttpResponseModel;

    private  MemberSetting $memberSettingModel;
    public function __construct()
    {
        $this->memberSettingModel = new MemberSetting();
    }
    public function getAllPayload(array $payload)
    {
        try {

            $data = $this->memberSettingModel->all();

            return $this->success($data, "success getting data");
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getPayloadById(int $id)
    {
        try {

            $find = $this->memberSettingModel->whereId($id)->first();

            if (!$find) {
                return $this->error('member setting not found', 404);
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
                    'data' => $this->memberSettingModel->whereId($id)->update($payload),
                    'message' => 'Updated data successfully'
                ];
            } else {

                $result = [
                    'data' => $this->memberSettingModel->create($payload),
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

            $data = $this->memberSettingModel->whereId($id)->delete();

            return $this->success($data, "success deleting data");
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }
}
