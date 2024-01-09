<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public function fetchArticle(Request $request){
        $guardianApiKey = env('GUARDIAN_KEY');
        $guaradianEndPoint = env('GUARDIAN_END_POINT');

        $response = Http::get($guaradianEndPoint, [
            'q' => $request->search,
            'api-key' => $guardianApiKey,
            'page' => $request->page
        ]);
       
        if($response->successful()){
            $apiResponse = $response->json()['response'];
            $articles = $response->json()['response']['results'];
            $page = $request->page;
            return view('welcome', compact('articles', 'page', 'apiResponse'));
        }else{
            $error = 'Something went wrong!';
            return view('welcome', compact('error'));
        }
    }

}
