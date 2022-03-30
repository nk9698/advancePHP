<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
class ArticleController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    //
    public function index(){
        //$articles = DB::table('articles')->get();
        $articles = Article::paginate(5);
        return view('articles.index',compact("articles"));
    }

    public function show($article){
        $article = Article::findOrFail($article);
        return view('articles.show',compact('article'));
    }
    public function create() {
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name','id');
        return view('articles.create', compact("categories","tags"));
    }

    public function store(Request $request) {
        $category = Category::findOrFail($request->category_id);
        $article = new Article($request->all());
        $article->author_id = 1;
        $article->category()->associate($category)->save();
        $article->tags()->sync($request->tags);
        if ($request->hasFile('file') &&
            $request->file('file')->isValid()) {
            $path = $request->file->storePublicly('images','public');
            $article->file = $path;
            $article->save();
        }
        return redirect('articles');
    }

    public function destroy(Article $article) {
        $article->delete();
        return redirect('articles');
    }

}
