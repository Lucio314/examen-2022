<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Oeuvre;

class OeuvreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oeuvres = Oeuvre::all();
        return view('oeuvres.index', ['oeuvres' => $oeuvres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artistes = Artiste::all();
        $categories = Categorie::all();
        return view('oeuvres.create', compact('artistes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'annee' => 'required|integer',
            'idArtiste' => 'required|integer',
            'idCategorie' => 'required|integer',
        ]);

        // Création d'une nouvelle instance de Oeuvre
        $oeuvre = new Oeuvre();
        $oeuvre->nom = $request->input('nom');
        $oeuvre->description = $request->input('description');
        $oeuvre->annee = $request->input('annee');
        $oeuvre->idArtiste = $request->input('idArtiste');
        $oeuvre->idCategorie = $request->input('idCategorie');
        $oeuvre->save();
        return redirect()->route('oeuvres.index')->with('success', 'Oeuvre added successfully');
    }




    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $oeuvre = Oeuvre::findOrFail($id);
        return view('oeuvres.show', compact('oeuvre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $oeuvre = Oeuvre::find($id);
        $artistes = Artiste::all();
        $categories = Categorie::all();
        return view('oeuvres.edit', compact('oeuvre', 'artistes', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'annee' => 'required|integer',
            'idArtiste' => 'required|integer',
            'idCategorie' => 'required|integer',
        ]);

        $oeuvre = Oeuvre::find($id);
        $oeuvre->update($request->all());

        return redirect()->route('oeuvres.index')->with('success', 'Oeuvre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $oeuvre = Oeuvre::find($id);
        $oeuvre->delete();

        return redirect()->route('oeuvres.index')->with('success', 'Oeuvre deleted successfully');
    }
}
