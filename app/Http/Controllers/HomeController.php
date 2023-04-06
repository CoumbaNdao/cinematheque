<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Evenement;
use App\Models\Film;
use App\Models\Internaute;
use App\Models\Journaliste;
use App\Models\Recompense;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Mockery\Exception;

class HomeController extends Controller
{
    public function index()
    {

        $films = Film::all();
        $utilisateur = Auth::user();
        if ($utilisateur) {
            if ($utilisateur->admin) {
                //TODO: rediriger vers la page admin
                return redirect()->route('admin.dashboard');
            }
            if ($utilisateur->internaute) {
                return redirect()->route('internaute.internauteboard');
            }

            if ($utilisateur->journaliste){
                return view('journaliste.journalisteboard');
            }
        }
        return view('index', [
            'films' => $films
        ]);
    }

    public function text()
    {
        return view('index');
    }
    public function unfilm()
    {
        $unfilm = Film::where("idfilm")->get();
        return view('unfilm', [
            'unfilm' => $unfilm
        ]);
    }
    public function evenement(){
        $evenements = Evenement::all();
        $recompenses = Recompense::all();
        return view('evenement', [
            'evenements' => $evenements,
            'recompenses' => $recompenses
        ]);
    }

}
