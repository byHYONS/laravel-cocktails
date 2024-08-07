<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cocktail;
use App\Http\Requests\StoreCocktailRequest;
use App\Http\Requests\UpdateCocktailRequest;
use App\Models\Glass;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cocktails = Cocktail::with('glasses')->get();
        return view('cocktails.index', compact('cocktails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $glasses = Glass::all();
        return view('cocktails.create', compact('glasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCocktailRequest $request)
    {

        $data = $request->validated();
        $cocktail = Cocktail::create($data);

        if ($request->has('glass_id')) {
            $cocktail->glasses()->sync([$request->input('glass_id')]);
        }

        return redirect()->route('cocktails.index')->with('success', 'Cocktail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cocktail $cocktail)
    {
        // $cocktail = Cocktail::all();
        return view('cocktails.show', compact('cocktail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cocktail $cocktail)
    {
        $glasses = Glass::all();

        return view('cocktails.edit', compact('cocktail', 'glasses'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCocktailRequest $request, Cocktail $cocktail)
    {
        $data = $request->validated();

        $cocktail->update($data);   

        if ($request->has('glass_id')) {
            $cocktail->glasses()->sync($data['glass_id']);
        }

        return redirect()->route('cocktails.show', $cocktail->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cocktail $cocktail)
    {
        $cocktail->delete();
        return redirect()->route('cocktails.index')->with('success', 'Cocktail deleted successfully.');
    }
}
