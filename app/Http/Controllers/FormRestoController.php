<?php

namespace App\Http\Controllers;

use App\Models\FormResto;
use Illuminate\Http\Request;

class FormRestoController extends Controller
{
    public function index() {
        return view('admin-resto.index', [
            'formresto' => FormResto::get()
        ]);
    }
    public function create() {
        return view('admin-resto.create');
    }
    public function store(Request $request) {
        $formResto = new FormResto();
        $formResto->name = $request->name;
        $formResto->address = $request->address;
        $formResto->description = $request->description;
        $formResto->ratings = $request->ratings;
        $formResto->price = $request->price;


        $formResto->save();

        return redirect()->route('dashboard');
    }
}
