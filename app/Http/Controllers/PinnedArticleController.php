<?php

namespace App\Http\Controllers;

use App\Models\PinnedArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PinnedArticleController extends Controller
{
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

    public function delete(){
       PinnedArticle::truncate();
    }

    public function unpinArticle(Request $request){
      
        $pinnedArticle = PinnedArticle::where('id','=',$request->id)->first();
        
        if(!$pinnedArticle){
            Session::flash('error', 'Article not found!');

            return redirect()->back();  
        }else{
            $pinnedArticle->delete();
            Session::flash('success', 'Article unpinned!');

            return redirect()->back();
        }
    }
}
