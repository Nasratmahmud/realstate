<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index(){
        return view('backend.layouts.property-type.index');
    }

    public function create(){
        return view('backend.layouts.property-type.create');
    }
}
