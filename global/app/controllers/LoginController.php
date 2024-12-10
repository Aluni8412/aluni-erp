<?php
namespace App\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController {
    public function index() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $user = User::where('email', $request->email)->first();
        if ($user && password_verify($request->password, $user->passwort)) {
            // Weiterleitung zur Kundendatenbank
            return redirect("/redirect/{$user->kunde_id}");
        }
        return back()->with('error', 'Ungültige Anmeldedaten');
    }

    public function redirect($kunde) {
        // Dynamische Weiterleitung
        return redirect("https://kunde{$kunde}.deinprojekt.ch");
    }
}