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
        // Afficher le formulaire d'ajout
        return view('articles.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'qte' => 'required|integer',
            'prix' => 'nullable|integer',
        ]);

        // Enregistrer le nouveau souvenir
        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès');
    }

    public function edit(Article $article)
    {
        // Afficher le formulaire de modification
        return view('articles.edit', compact('souvenir'));
    }

    public function update(Request $request, Article $article)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'qte' => 'required|date',  // Make sure the field name matches your DB column
            'prix' => 'nullable|string',
        ]);
    
        // Mettre à jour le souvenir avec les données validées
        $article->update($validated);
    
        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès');
    }
    
    public function destroy(Article $article)
    {
        // Supprimer le souvenir
        $article->delete();
    
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }
}
