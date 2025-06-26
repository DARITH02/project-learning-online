<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviewImageController extends Controller
{
    public function show(Request $request)
    {
        return response()->json($request['img']);
    }
}
