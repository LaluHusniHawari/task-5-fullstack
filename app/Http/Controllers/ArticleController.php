<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Articles;
use App\Models\Category;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::all();
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
             
        ]);

        $article = new Articles();
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->content = $request->content;


        $image_path = "";
        if($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/article/', $image_name);

            $image_path = 'upload/article/'.$image_name;
        }

        $article->image = $image_path;
        $article->save(); 


        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Articles::find($id);
        $categories = Category::all();
        return view('admin.article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
             
        ]);

        $article = Articles::find($id);
        $article->title = $request->title;
        $article->content = $request->content;

        if($request->hasFile('image')) {
            if(file_exists($article->image)) {
                unlink($article->image);
            }
            $image = $request->image;
            $image_name = time().$image->getClientOriginalName();
            $image->move('uploads/article/', $image_name);

            $article->image = 'upload/article/'.$image_name;
        } 
 
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $article = Articles::find($id);
 
        if(file_exists($article->image)) {
            unlink($article->image);
        }

        $article->delete();

        return redirect()->route('articles.index');
    }
}

// progrem edit category
// membuat fungsi logout, merapikan tampilan login
