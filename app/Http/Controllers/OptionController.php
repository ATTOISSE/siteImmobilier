<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionRequest;
use App\Http\Requests\OptionRequestion;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.options.index',[
            'options' => Option::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.options.form',[
            'option' => new Option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionRequest $request)
    {
        $option = Option::create($request->validated());
        return redirect()->route('option.index')->with('success','l\'option a éte bien enregitré succés');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('admins.options.form',[
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('option.index')->with('success','l\'option a éte bien modifier succés');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('option.index')->with('success','l\'option a éte bien supprimé succés');
        
    }
}