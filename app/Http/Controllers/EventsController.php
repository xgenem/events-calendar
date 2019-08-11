<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function index()
    {
        return response()->json(Events::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = $this->validateRequest($request, $this->storeValidationRules());

        if ($validator !== true) {
            return response()->json($validator, 400);
        }
        return response()->json(Events::create($request->all()), 200);
    }

    private function storeValidationRules()
    {
        $rules = [
            'title' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'days' => 'required|min:14|max:14',
        ];
        return $rules;
    }
}
