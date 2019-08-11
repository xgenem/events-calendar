<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
    public function index()
    {
        return response()->json(Events::all(), 200);
    }

    public function store(Request $request)
    {
        return response()->json(Events::create($request->all()), 200);
    }
}
