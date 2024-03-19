<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            "admin.index",
            [
                "properties" => Property::orderBy('created_at', 'desc')->paginate(10),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        return view('admin.create', [
            'property' => $property,
            'propertyOptionsIds' => $property->options()->pluck('id'),
            'options' => Option::select("name", 'id')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        Property::create($request->validated());
        return redirect()->route('admin.property.index')->with('success', 'Bien ajouté avec succée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view("admin.edit", [
            'property' => $property,
            'propertyOptionsIds' => $property->options()->pluck('id'),
            'options' => Option::select('name', 'id')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.@can ('update', Model::class)
     *
     @endcan
     */
    public function update(PropertyFormRequest $request, Property $property)
    {

        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));

        return redirect()->route('admin.property.index')->with('success', 'Propriété modifiée avec succée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
