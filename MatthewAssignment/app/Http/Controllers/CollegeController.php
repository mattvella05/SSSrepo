<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index(Request $request)
    {
        $colleges = College::query();

        if ($request->sort === 'name') {
            $colleges->orderBy('name');
        }

        return view('colleges.index', [
            'colleges' => $colleges->get()
        ]);
    }

    public function create()
    {
        return view('colleges.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:colleges',
            'address' => 'required',
        ]);

        College::create($request->all());

        return redirect()->route('colleges.index')->with('success', 'College added successfully!');
    }

    public function edit(College $college)
    {
        return view('colleges.edit', compact('college'));
    }

    public function update(Request $request, College $college)
    {
        $request->validate([
            'name' => 'required|unique:colleges,name,' . $college->id,
            'address' => 'required',
        ]);

        $college->update($request->all());

        return redirect()->route('colleges.index')->with('success', 'College updated successfully!');
    }

    public function destroy(College $college)
    {
        $college->delete();

        return redirect()->route('colleges.index')->with('success', 'College deleted successfully!');
    }
}
