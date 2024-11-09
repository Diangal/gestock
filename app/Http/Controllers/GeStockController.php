<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeStockController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);
        return view('articles.index',   compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'qte' => 'required|integer',
            'prix' => 'nullable|integer',
        ]);
        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('souvenir'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'qte' => 'required|integer',
            'prix' => 'nullable|integer',
        ]);
        $article->update($validated);
    
        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès');
    }
    
    public function destroy(Article $article)
    {
        $article->delete();
    
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }
}
