<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::categories();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'max:30',
            'title_fr' => 'max:30',
            'description_en' => 'required|min:5',
            'description_fr' => 'max:350',
            
        ]);
      
        // $id = $category['id'];

        $article = Article::create([
            'title' => $title,
            'description' => $description,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('article.show', $article->id)->with('success', 'Article # '.$article->id.' : '.$article->title.' created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::categories();
        return view('article.edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // TODO:
    }

    public function pdf(Article $article){
        $qrCode = QrCode::size(200)->generate(route('article.show', $article->id));
        $pdf = new Dompdf();
        $pdf->setPaper('letter', 'portrait');
        $pdf->loadHtml(view('article.show-pdf', ["article" => $article, "qrCode"=> $qrCode]));
        $pdf->render();
        return $pdf->stream('article.pdf');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}


// <div class="mb-3">
// <label for="category_id" class="form-label">@lang('lang.category')</label>
//     <select name="category_id" id="category_id" class="form-control">
//         @foreach($categories as $category)
//         <option value="{{$category['id']}}" @if ($category['id'] == old('category_id')) selected @endif>{{$category['title']}}</option>
//         @endforeach 
//     </select>
//     @if($errors->has('category_id'))
//     <div class="text-danger mt-2">
//         {{$errors->first('category_id')}}
//     </div>
// @endif
// </div>