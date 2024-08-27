<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formBuilder;

class formBuilderController extends Controller
{
    public function create(Request $request)
    {
        $item = new FormBuilder();
        $item->name = $request->name;
        $item->content = $request->form;
        $item->save();

        return response()->json('added successfully');
    }
}
