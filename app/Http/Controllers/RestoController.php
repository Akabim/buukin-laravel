<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RestoController extends Controller
{
    public function index()
    {
        $restos = Resto::all();
        return view('dashboard', compact('restos'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'ratings' => 'required|numeric',
            'price' => 'required|numeric',
            'photo_1' => 'image|mimes:jpeg,png,jpg,gif',
            'photo_2' => 'image|mimes:jpeg,png,jpg,gif',
            'photo_3' => 'image|mimes:jpeg,png,jpg,gif',
            'menu' => 'file|mimes:pdf|max:51200',
        ]);

        // Upload foto
        $photoPaths = [];
        for ($i = 1; $i <= 3; $i++) {
            $photoName = "photo_{$i}";
            if ($request->hasFile($photoName)) {
                $photoPath = $request->file($photoName)->store("resto_photos", 'public');
                // dd($photoPath);
                $photoPaths[$photoName] = $photoPath;
            }
        }


        // Upload file PDF
        if ($request->hasFile('menu')) {
            $pdfPath = $request->file('menu')->store("menus", 'public');
            $validatedData['menu'] = $pdfPath;
        }

        // Simpan data restoran bersama dengan nama file foto dan PDF
        Resto::create(array_merge($validatedData, $photoPaths));



        return redirect()->route('admin.create');
    }


    public function show($id)
    {
        $restos = Resto::find($id);
        // dd(gettype($restos));
        return view('details', compact('restos'));
    }

    public function kategori()
    {
        $restos = Resto::all();
        return view('kategori', compact('restos'));
    }
    public function favorit()
    {
        $restos = Resto::all();
        return view('favorit', compact('restos'));
    }
    public function welcome(Request $request)
    {
        $restos = Resto::all();
        return view('welcome', compact('restos'));
    }

    public function liveSearch(Request $request)
    {
        $query = $request->input('query');
        $restos = Resto::where('name', 'like', '%' . $query . '%')->get();

        return response()->json($restos);
    }
}
