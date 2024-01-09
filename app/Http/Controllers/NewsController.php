<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function fetchArticle(Request $request){
        $guardianApiKey = env('GUARDIAN_KEY');
        $guaradianEndPoint = env('GUARDIAN_END_POINT');

        $response = Http::get($guaradianEndPoint, [
            'q' => $request->search,
            'api-key' => $guardianApiKey,
            'page' => $request->page
        ]);

        $articles = $response->json()['response']['results'];
        
        return view('welcome', compact('articles'));
    }

}
