<?php

namespace App\Http\Controllers;
use App\Models\Critique;
use App\Models\Evenement;
use App\Models\Film;
use App\Models\Filmavoir;
use App\Models\Filmvus;
use App\Models\Internaute;
use App\Models\Recompense;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Mockery\Exception;

class InternauteController extends Controller
{
    public function internauteboard()
    {
        $evenements = Evenement::all();
        $films = Film::all();
        $critiques_user = Critique::all()
        ->where('critique.idutilisateur', '=', Auth::user()->idutilisateur);

        $films_critiques = Film::join('critique', 'critique.idfilm', '=', 'film.idfilm')
        ->where('critique.idutilisateur', '=', Auth::user()->idutilisateur)
            ->selectRaw('film.titre, contenu, note, photo')
            ->get()
        ;

        $films_vues = Film::join('filmvus', 'filmvus.idfilm', '=', 'film.idfilm')
            ->where('filmvus.idutilisateur', '=', Auth::user()->idutilisateur)
            ->get();

        $filmsavoir = Film::join('filmavoir', 'filmavoir.idfilm', '=', 'film.idfilm')
            ->where('filmavoir.idutilisateur', '=', Auth::user()->idutilisateur)
            ->get();

        $recompenses = Recompense::all();

        $user = Auth::user();
        return view('internaute.internauteboard', [
            'user' => $user,
            'evenements' => $evenements,
            'films' => $films,
            'recompenses' => $recompenses,
            'films_critiques' => $films_critiques,
            'critiques_user' => $critiques_user,
            'films_vues' => $films_vues,
            'filmsavoir' => $filmsavoir

        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        try {
            $user->update([
                'nom' => $request->nom ?? $user->nom,
                'prenom' => $request->prenom ?? $user->prenom,
                'email' => $request->email ?? $user->email,
                'password' => bcrypt($request->password) ?? $user->password,
            ]);
        } catch (Exception $e) {
            return back()->withInput();
        }
        return redirect()->route('internaute.internauteboard');
    }

    public function text()
    {
        return view('index');
    }

    public function film()
    {
        return view('unfilm');
    }

    public function evenement(){
        $evenements = Evenement::all();
        $recompenses = Recompense::all();
        return view('evenement', [
            'evenements' => $evenements,
            'recompenses' => $recompenses
        ]);
    }
    public function ajoutcritique(Request $request){


        if ($request->Valider) {
            $critiques_user = Critique::where('critique.idfilm', '=', $request->idfilm)
            ->where('critique.idutilisateur', '=', Auth::user()->idutilisateur)
                ->first()
            ;
            $critiques_user->update([
                'contenu' => $request->contenu ?? $critiques_user->contenu,
                'note' => $request->note ?? $critiques_user->note,
                'idfilm' => $request->idfilm ?? $critiques_user->idfilm
            ]);
        }

        if ($request->Supprimer) {
            try {
                $critiques_user->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Critique::create([
                'contenu' => $request->contenu,
                'dateenregistrement' => now(),
                'note' => $request->note,
                'idfilm' => $request->idfilm,
                'idutilisateur'=> Auth::user()->idutilisateur
            ]);
        }

        return back();
    }

    public function ajoutFilmVue(Request $request)
    {
        Filmvus::create([
            'idfilm' => $request->idfilm,
            'idutilisateur' => Auth::user()->idutilisateur
        ]);
        return back();
    }
    public function ajoutFilmaVoir(Request $request)
    {
        Filmavoir::create([
            'idfilm' => $request->idfilm,
            'idutilisateur' => Auth::user()->idutilisateur
        ]);
        return back();
    }


}
