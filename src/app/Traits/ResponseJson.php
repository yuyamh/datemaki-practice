<?php

namespace App\Traits;

trait ResponseJson
{

    /**
     * レスポンスステータスコード
     *
     * @var int
     */
    protected $statusCode = 200;

    /**
     * レスポンスステータス
     *
     * @var bool
     */
    protected $status = true;

    /**
     * エラーメッセージ
     *
     * @var bool
     */
    protected $errorMessages = [];

    /**
     * レスポンスデータ
     *
     * @var bool
     */
    protected $data = [];

    /**
     * レスポンスヘッダ
     *
     * @var array
     */
    protected $responseHeader = [];

    /**
     * ステータスコードをセット
     *
     * @param String $statusCode
     * @return void
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * レスポンスデータをセット
     *
     * @param Array data
     * @return void
     */
    protected function setResponseData($data = [])
    {
        $this->data = $data;
    }

    /**
     * エラーメッセージをセット
     *
     * @param Array $errorMessages
     * @return void
     */
    protected function setErrorMessages($errorMessages)
    {
        $this->errorMessages = $errorMessages;
    }

    /**
     * レスポンスヘッダをセット
     *
     * @param Array responseHeader
     * @return void
     */
    protected function setResponseHeader($responseHeader)
    {
        $this->responseHeader = $responseHeader;
    }

    /**
     * レスポンス成功
     *
     * @return Array json
     */
    protected function responseSuccess($isObject = true)
    {
        $this->status = true;

        return $this->responseJson($isObject);
    }

    /**
     * レスポンス失敗
     *
     * @return Array json
     */
    protected function responseFailed($isObject = true)
    {
        $this->status = false;

        return $this->responseJson($isObject);
    }

    /**
     * 共通のJSONレスポンス内容を作成
     *
     * @return Array json
     */
    protected function responseJson($isObject = true)
    {
        if ($isObject) {
            $data = !empty($this->data) ? $this->data : (object)[];
        } else {
            $data = !empty($this->data) ? $this->data : [];
        }

        $response = [
            'data' => $data,
            'error_messages' => $this->errorMessages
        ];

        return response()->json($response, $this->statusCode)
        ->withHeaders($this->responseHeader);
    }
}
