<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreviousSearch;
use App\Traits\Response;

class PreviousSearchController extends Controller
{
    use Response;

    /**
     * Get Previous Word Searches 
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $previous_searches = PreviousSearch::orderBy('updated_at','DESC')->paginate(20);
        return $this->success($previous_searches, 'ok', 200); 
    }

    /**
     * Store Word Searches 
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'word' => 'required|string|max:50'
        ]);
        $prev_search = PreviousSearch::updateOrCreate(
            ['word'=> strtolower($request->word)],
            ['updated_at'=>now()]
        );
        return $this->success($prev_search, 'search save successfully', 201);
    }
}
