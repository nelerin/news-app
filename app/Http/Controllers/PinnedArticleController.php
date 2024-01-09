<?php

namespace App\Http\Controllers;

use App\Models\PinnedArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PinnedArticleController extends Controller
{
    public function get(){
        $pinned = PinnedArticle::paginate(10);
    }

    public function addArticle(Request $request){

        $pinnedArticle = PinnedArticle::where('article_id','=',$request->id)->first();

        if($pinnedArticle){
            Session::flash('error', 'You have already pinned this article!');

             return redirect()->back();  
        }else{
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
}
