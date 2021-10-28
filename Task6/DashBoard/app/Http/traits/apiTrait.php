<?php

namespace App\Http\traits;

trait apiTrait
{
    public function SuccessMessage($message = "", $status = 200)
    {
        return response()->json(
            [
                'message' => $message,
                'error' => (object)[],
                'data' => (object)[],
            ],
            $status
        );
    }
    public function ErrorMessage($message = "", $status = 422)
    {
        return response()->json(
            [
                'message' => $message,
                'error' => (object)[],
                'data' => (object)[],
            ],
            $status
        );
    }
    public function DataResponse(array $data, $message = "", $status = 422)
    {
        return response()->json(
            [
                'message' => $message,
                'error' => (object)[],
                'data' => $data,
            ],
            $status
        );
    }
}
