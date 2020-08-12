<?php

namespace App\Http\Controllers;
use App\Articles;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ArticleController extends Controller
{
    function Show(){
        $articles = DB::table('articles')->orderBy('id','DESC')->get();
        return view('list')->with(compact('articles'));
    }

    function Add(){
        return view('Add');
    }
    function save(Request $request){
        $validatedData = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:100'
        ]);
        if($validatedData->passes()){
            //insert into database
            
                $articles = new Articles;

                $articles->title = $request->title;
                $articles->author = $request->author;
                $articles->description = $request->description;

                $articles->save();
                $request->session()->flash('msg','Articles Saved successfully');
                return redirect('articles');
        }
        else{
            return redirect('articles/add')->withErrors($validatedData)->withInput();
        }
    }
}
