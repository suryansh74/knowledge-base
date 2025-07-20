<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $problems = Problem::with('user')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        return view('frontend.index', compact('problems'));
    }
    public function showProblem($slug)
    {
        $problem = Problem::where('slug', $slug)->firstOrFail();

        return view('problems.show', compact('problem'));
    }
}
