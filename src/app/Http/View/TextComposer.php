<?php

namespace App\Http\View;

use App\Models\Text;
use Illuminate\View\View;

class TextComposer
{
    protected $texts;

    public function __construct()
    {
        $this->texts = Text::all();
    }

    public function compose(View $view)
    {
        $view->with('texts', $this->texts);
    }
}
