<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function search()
    {
        return view('Shop');
    }

    public function searchItem(Request $request)
    {

    }
}
