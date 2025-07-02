<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessionController extends Controller
{
    public function create()
    {
        if (request()->ajax()) {

            return view('pages.lession.fromCreateLession')->renderSections()['contents'];
        }
        return view('pages.lession.fromCreateLession');

    }
}
