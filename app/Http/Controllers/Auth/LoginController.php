<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserLog;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{


    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, true)) {
            $user =Auth::user();
            //Auth::login($user);

            Auth::loginUsingId($user->idutilisateur);

            return redirect()->route('index');
        }

        $user = Utilisateur::where('email', '=', $request->email)
            ->get()->first();

        if (isset($user)) {

            Cache::set('utilisateur', $user->idutilisateur);

            UserLog::create([
                'id' => $user->idutilisateur,
                'loginuser' => $user->email,
                'nomuser' => $user->nom . ' ' . $user->prenom,
                'datelog' => now()
            ]);

        }else {
            return back()->withErrors([
                'email' => 'Identifiants invalides',
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

}
