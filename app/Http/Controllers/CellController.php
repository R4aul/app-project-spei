<?php

namespace App\Http\Controllers;

use App\Models\Cell;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cells = Cell::paginate(10);
        return view('cells.index', compact('cells'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cells.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_cell'=>['required','string']
        ]);

        Cell::create($request->all());

        return redirect()->route('cells.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cell $cell)
    {
        return view('cells.edit', compact('cell'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cell $cell)
    {
        $request->validate([
            'name_cell'=>['required','string']
        ]);

        $cell->update($request->all());

        return redirect()->route('cells.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cell $cell)
    {
        if($cell->employees()->exists()){
            return redirect()->back()->with('warning', 'No se puede eliminar el curso porque tiene empleados asignados.');
        }
        $cell->delete();
        return redirect()->route('cells.index')->with('success','La celula se elimino exitosamente.');
    }
}
