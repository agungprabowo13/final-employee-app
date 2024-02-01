<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.employee.index', [
            'items' => Employee::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.employee.create', [
            'positions' => Position::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required',
            'nip' => 'required|numeric',
        ],[
            'required' => 'Field ini harus di isi'
        ]);
        $data = $request->all();
        $data['photo'] = $request->file('photo')->storeAs('employee', Str::slug($request->name) . '.jpg', 'public');

        Employee::create($data);
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pages.employee.edit',[
            'item' => Employee::find($id),
            'positions' => Position::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if(!empty($data['photo'])){
            $data['photo'] = $request->file('photo')->storeAs('employee',Str::slug($request->name).'.jpg','public');
        }else{
            unset($data['photo']);
        }
        Employee::find($id)->update($data);
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Employee::find($id)->delete();
       return redirect()->back();
    }
}
