<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    /**
     * テキストの一覧取得
     */
    public function index()
    {
        $texts = Text::all();

        return response()->json(
            [
                'status' => 'true',
                'result' => $texts,
            ], 200
        );
    }
}
