<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
        $results = [];

        if (strlen($query) > 2) {
            $results = [
                'courses' => Course::whereRaw('LOWER(name) like ?', ['%'.strtolower($query).'%'])
                    ->orWhereRaw('LOWER(code) like ?', ['%'.strtolower($query).'%'])
                    ->orWhereRaw('LOWER(description) like ?', ['%'.strtolower($query).'%'])
                    ->get(),
                'professors' => Professor::whereRaw('LOWER(name) like ?', ['%'.strtolower($query).'%'])
                    ->orWhereRaw('LOWER(title) like ?', ['%'.strtolower($query).'%'])
                    ->get(),
            ];
        }

        return view('search-results', compact('results'));
    }
}
