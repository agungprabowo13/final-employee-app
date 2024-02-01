<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.position.index',[
            'items' => Position::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'position_name' => 'required',
            'salary' => 'required|numeric',
        
        ],[
            'required' => 'Field tidak Boleh Kosong',
            'salary.numeric' => 'Salary harus berisi Angka'
        ]);
        Position::create($request->all());

        return redirect()->route('position.index')->with('success','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pages.position.edit',[
            'item' => Position::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Position::find($id)->update($request->all());
        
        return redirect()->route('position.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Position::find($id)->delete();

       return redirect()->back();
    }
}
