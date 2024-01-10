<?php

namespace App\Http\Controllers;

use App\Models\PinnedArticle;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    protected $articleProxy;

    public function __construct(ArticleService $articleProxy)
    {
        $this->articleProxy = $articleProxy;
    }

    public function fetchArticle(Request $request)
    {
        $pinnedArticles = PinnedArticle::get();

        try {
            $response = $this->articleProxy->fetchArticles(
                $request->search,
                $request->page
            );
            $apiResponse = $response['response'];
            $articles = $response['response']['results'];
            $page = $request->page;

            return view('welcome', compact('articles', 'page', 'apiResponse', 'pinnedArticles'));
        } catch (\Exception $e) {
            $error = 'Something went wrong!';
            return view('welcome', compact('error'));
        }
    }
}
