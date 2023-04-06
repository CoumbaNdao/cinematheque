<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Internaute;
use App\Models\Journaliste;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/signup');
    }

    public function register(Request $request)
    {


        $this->validate($request, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:utilisateur',
            'password' => 'required|string|min:8',
        ]);

        $utilisateur = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->userprofile === '1') {
            Journaliste::create([
                'idjournaliste' => $utilisateur->idutilisateur
            ]);
        } elseif ($request->userprofile === '2') {
            Internaute::create([
                'idinternaute' => $utilisateur->idutilisateur,

            ]);
        }

        return redirect()->route('auth.login.index')->with('success', 'Votre compte a été créé avec succès!');
    }
}
