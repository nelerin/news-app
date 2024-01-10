<?php

namespace App\Http\Controllers;

use App\Models\PinnedArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PinnedArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pinnedArticle = PinnedArticle::where('article_id', '=', $request->id)->first();

        if ($pinnedArticle) {
            Session::flash('error', 'You have already pinned this article!');

            return redirect()->back();
        } else {
            PinnedArticle::create([
                'article_id' => $request->id,
                'publication_date' => $request->webPublicationDate,
                'title' => $request->articleTitle,
                'url' => $request->webUrl
            ]);

            Session::flash('success', 'Article pinned successfully');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pinnedArticle = PinnedArticle::where('id', '=', $id)->first();

        if (!$pinnedArticle) {
            Session::flash('error', 'Article not found!');

            return redirect()->back();
        } else {
            $pinnedArticle->delete();
            Session::flash('success', 'Article unpinned!');

            return redirect()->back();
        }
    }
}
