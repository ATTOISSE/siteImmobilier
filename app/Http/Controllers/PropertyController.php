<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.properties.index',[
            'properties' => Property::orderBy('created_at','desc')->paginate(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'area' => 50,
            'room' => 8,
            'postal' => 34000,
            'stage' => 0,
            'solde' => false,
            'city' => 'Dakar',
        ]);
        return view('admins.properties.form',[
            'property' => $property,
            'options' => Option::pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        dd($request->input('options'));
        $property =  Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return redirect()->route('property.index')->with('success','le bien a éte bien enregitré succés');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admins.properties.form',[
            'property' => $property,
            'options' => Option::pluck('name','id')
        ]);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        return redirect()->route('property.index')->with('success','le bien a éte bien modifié avec succés');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property.index')->with('success','le bien a éte bien supprimé avec succés');  
    }
}