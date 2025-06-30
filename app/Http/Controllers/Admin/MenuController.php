<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.menus.index', [
            'title' => 'Menu',
            'menus' => Menu::orderBy('id', 'DESC')->limit(10)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.menus.create', [
            'title' => 'Tambah Menu Baru',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('menus', 'public');
        Menu::create($data);

        return redirect()->route('menu.index');
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
    public function edit(string $id)
    {
        return view('pages.admin.menus.edit', [
            'title' => 'Edit Menu',
            'menu' => Menu::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        if (!empty($request->image)) {
            $data['image'] = $request->file('image')->store('menus', 'public');
        } else {
            unset($data['image']);
        }

        Menu::find($id)->update($data);

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Menu::find($id)->delete();

        return redirect()->back();
    }
}
