<?php

namespace App\Contracts;

interface ChildrenContract
{
    public function getAllPayload(array $payload);
    public function getPayloadById(int $id);
    public function upsertPayload($id, array $payload);
    public function deletePayload(int $id);
}