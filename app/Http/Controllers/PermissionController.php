<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $permission = Permission::orderBy('id', 'DESC')->get();
        return view('permission.index', compact('permission'));;
    }

    public function create()
    {
        $permission = Permission::get();
        return view('permission.create', compact('permission'));
    }

    public function store(Request $request)
    {
        // dd($request->input('permission'));
        $this->validate($request, [
            'name' => 'required',
        ]);

        Permission::create(['name' => $request->input('name')]);
        return redirect()->route('permission.index')
            ->with('success', 'Permission created successfully');
    }

    public function show($id)
    {
        $permission = Permission::find($id);
        return view('permission.show', compact('permission'));
    }


    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();

        return redirect()->route('permission.index')
            ->with('success', 'Permiso$permission updated successfully');
    }

    public function destroy($id)
    {
        DB::table("permissions")->where('id', $id)->delete();
        return redirect()->route('permission.index')
            ->with('success', 'Role deleted successfully');
    }
}
