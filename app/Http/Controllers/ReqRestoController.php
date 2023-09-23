<?php

namespace App\Http\Controllers;

use App\Models\ReqResto;
use App\Models\Resto;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ReqRestoController extends Controller
{
    public function index()
    {
        return view('admin-resto.index', [
            'reqrestos' => ReqResto::all(),
        ]);
    }
    public function registeradminresto()
    {
        return view('admin.create-adm-resto');
    }

    public function create()
    {
        return view('admin-resto.create', [
            'reqrestos' => ReqResto::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'resto_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'description' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $reqresto = new ReqResto();
        $reqresto->resto_name = $request->input('resto_name');
        $reqresto->address = $request->input('address');
        $reqresto->price = $request->input('price');
        $reqresto->description = $request->input('description');
        $reqresto->ratings = $request->input('ratings', 4.0); // Default value
        $reqresto->username = $request->input('username');
        $reqresto->email = $request->input('email');
        $reqresto->password = bcrypt($request->input('password'));

        $reqresto->save();

        dd($reqresto);

        return redirect()->route('welcome');
    }

    public function adminuser(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' =>$request->role,
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
