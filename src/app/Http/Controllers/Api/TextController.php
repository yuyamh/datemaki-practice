<?php

namespace App\Http\Controllers\Api;

use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends BaseController
{
    /**
     * テキストの一覧取得
     */
    public function index()
    {
        $texts = Text::all();

        $response = [];
        foreach ($texts as $text)
        {
            $tmp = [
                'id'   => $text->id,
                'name' => $text->text_name,
            ];
            array_push($response, $tmp);
        }

        $this->setResponseData($response);

        return $this->responseSuccess(false);
    }
}
