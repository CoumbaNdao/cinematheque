<?php

namespace App\Http\Controllers;
use App\Models\Acteur;
use App\Models\Cinema;
use App\Models\Evenement;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Jouer;
use App\Models\Lieu;
use App\Models\Producteur;
use App\Models\Realisateur;
use App\Models\Recompense;
use App\Models\Seance;
use App\Models\Theme;
use App\Models\UserLog;
use App\Models\Version;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function stat()
    {
        $versions = Version::all();
        $userlogs = UserLog::all();

        return view('admin.stat', [
            'versions' => $versions,
            'userlogs' => $userlogs


        ]);
    }
    public function dashboard()
    {
        $versions = Version::all();
        $genres = Genre::all();
        $themes = Theme::all();
        $recompenses = Recompense::all();
        $lieux = Lieu::all();
        $evenements = Evenement::all();
        $acteurs = Acteur::all();
        $producteurs = Producteur::all();
        $realisateurs = Realisateur::all();
        $films = Film::all();
        $jouers = Jouer::all();
        $cinemas = Cinema::all();
        $seances = Seance::all();
        return view('admin.dashboard', [
            'versions' => $versions,
            'genres' => $genres,
            'themes' => $themes,
            'recompenses' => $recompenses,
            'lieux' => $lieux,
            'evenements' => $evenements,
            'acteurs' => $acteurs,
            'producteurs' => $producteurs,
            'realisateurs' => $realisateurs,
            'films' => $films,
            'jouers' => $jouers,
            'cinemas' => $cinemas,
            'seances' => $seances

        ]);
    }
    public function version(Request $request, Version $version=null)
    {

        if ($request->Valider) {

            $version->update([
                'nomversion' => $request->nomversion
            ]);
        }

        if ($request->Supprimer) {
            try {
                $version->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Version::create([
                'nomversion' => $request->nomversion
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
    public function genre(Request $request, Genre $genre=null)
    {

        if ($request->Valider) {

            $genre->update([
                'nomgenre' => $request->nomgenre
            ]);
        }

        if ($request->Supprimer) {
            try {
                $genre->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Genre::create([
                'nomgenre' => $request->nomgenre
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
    public function theme(Request $request, Theme $theme=null)
    {

        if ($request->Valider) {

            $theme->update([
                'nomtheme' => $request->nomtheme
            ]);
        }

        if ($request->Supprimer) {
            try {
                $theme->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Theme::create([
                'nomtheme' => $request->nomtheme
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
    public function recompense(Request $request, Recompense $recompense=null)
    {
        if ($request->Valider) {
            $pathRecompense = "img\photorecompense\\";
            $cv = $request->file('photorecompense');

            //  $cv->move('C:\Users\MameCoumbaNDAO\Desktop\SUP3DEV\Cinematheque\public\img\afficheevenement\\', $cv->getClientOriginalName());
            $cv->move($pathRecompense, $cv->getClientOriginalName());
            $photorecompense = $pathRecompense . $cv->getClientOriginalName();
        }
        try {
            $recompense->update([
                'nomrecompense' => $request->nomrecompense,
                'photorecompense' => $photorecompense ?? $recompense->photorecompense,
                'idevenement' => $evenement->idevenement ?? $recompense->idevenement
            ]);
        }  catch (\Exception $e) {
            return back()->withInput();
        }

        if ($request->Supprimer) {
            try {
                $recompense->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            $cv = $request->file('photorecompense');

            $cv->move('C:\Users\MameCoumbaNDAO\Desktop\SUP3DEV\Cinematheque\public\img\photorecompense\\', $cv->getClientOriginalName());
            $photorecompense = 'img\photorecompense\\' . $cv->getClientOriginalName();
            try {
                Recompense::create([
                    'nomrecompense' => $request->nomrecompense,
                    'photorecompense' => $photorecompense,
                    'idevenement' => $request->idevenement
                ]);
            }catch (\Exception $e) {
                return back()->withInput();
            }
        }

        return redirect()->route('admin.dashboard');
    }
    public function lieu(Request $request, Lieu $lieu=null)
    {

        if ($request->Valider) {

            $lieu->update([
                'nomlieu' => $request->nomlieu
            ]);
        }

        if ($request->Supprimer) {
            try {
                $lieu->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Lieu::create([
                'nomlieu' => $request->nomlieu
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
    public function evenement(Request $request, Evenement $evenement=null)
    {

        if ($request->Valider) {
            $pathEvenement = "img\afficheevenement\\";
            $cv = $request->file('afficheevenement');

            //  $cv->move('C:\Users\MameCoumbaNDAO\Desktop\SUP3DEV\Cinematheque\public\img\afficheevenement\\', $cv->getClientOriginalName());
            $cv->move($pathEvenement, $cv->getClientOriginalName());
            $afficheevenement = $pathEvenement . $cv->getClientOriginalName();
        }

            try {

                $evenement->update([
                    'nomevenement' => $request->nomevenement,
                    'dateevenement' => $request->dateevenement,
                    'afficheevenement' => $afficheevenement ?? $evenement->afficheevenement,
                    'idlieu' => $lieu->idlieu ?? $evenement->idlieu
                ]);
            }  catch (\Exception $e) {
                return back()->withInput();
            }

        if ($request->Supprimer) {
            try {
                $evenement->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            $cv = $request->file('afficheevenement');

            $cv->move('C:\Users\MameCoumbaNDAO\Desktop\SUP3DEV\Cinematheque\public\img\afficheevenement\\', $cv->getClientOriginalName());
            $afficheevenement = 'img\afficheevenement\\' . $cv->getClientOriginalName();

            try {
                Evenement::create([
                    'nomevenement' => $request->nomevenement,
                    'dateevenement' => $request->dateevenement,
                    'afficheevenement' => $afficheevenement,
                    'idlieu' => $request->idlieu
                ]);
            } catch (\Exception $e) {
                return back()->withInput();
            }
        }

        return redirect()->route('admin.dashboard');
    }
    public function acteur(Request $request, Acteur $acteur=null)
    {

        if ($request->Valider) {

            $acteur->update([
                'nomacteur' => $request->nomacteur,
                'prenomacteur' => $request->prenomacteur,
                'datenaissanceacteur' => $request->datenaissanceacteur,
                'datedecesacteur' => $request->datedecesacteur,
                'nationaliteacteur' => $request->nationaliteacteur
            ]);
        }

        if ($request->Supprimer) {
            try {
                $acteur->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Acteur::create([
                'nomacteur' => $request->nomacteur,
                'prenomacteur' => $request->prenomacteur,
                'datenaissanceacteur' => $request->datenaissanceacteur,
                'datedecesacteur' => $request->datedecesacteur,
                'nationaliteacteur' => $request->nationaliteacte
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
    public function producteur(Request $request, Producteur $producteur=null)
    {

        if ($request->Valider) {

            $producteur->update([
                'nomproducteur' => $request->nomproducteur,
                'prenomproducteur' => $request->prenomproducteur,
                'datenaissanceproducteur' => $request->datenaissanceproducteur,
                'datedecesproducteur' => $request->datedecesproducteur,
                'nationaliteproducteur' => $request->nationaliteproducteur
            ]);
        }

        if ($request->Supprimer) {
            try {
                $producteur->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Producteur::create([
                'nomproducteur' => $request->nomproducteur,
                'prenomproducteur' => $request->prenomproducteur,
                'datenaissanceproducteur' => $request->datenaissanceproducteur,
                'datedecesproducteur' => $request->datedecesproducteur,
                'nationaliteproducteur' => $request->nationaliteproducteur
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
    public function realisateur(Request $request, Realisateur $realisateur=null)
    {

        if ($request->Valider) {

            $realisateur->update([
                'nomrealisateur' => $request->nomrealisateur,
                'prenomrealisateur' => $request->prenomrealisateur,
                'datenaissancerealisateur' => $request->datenaissancerealisateur,
                'datedecesrealisateur' => $request->datedecesrealisateur,
                'nationaliterealisateur' => $request->nationaliterealisateur
            ]);
        }

        if ($request->Supprimer) {
            try {
                $realisateur->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Realisateur::create([
                'nomrealisateur' => $request->nomrealisateur,
                'prenomrealisateur' => $request->prenomrealisateur,
                'datenaissancerealisateur' => $request->datenaissancerealisateur,
                'datedecesrealisateur' => $request->datedecesrealisateur,
                'nationaliterealisateur' => $request->nationaliterealisateur
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
    public function film(Request $request, Film $film=null)
    {

        if ($request->Valider) {

            $film->update([
                'titre' => $request->titre ?? $film->titre,
                'duree' => $request->duree ?? $film->duree,
                'datesortie' => $request->datesortie ?? $film->datesortie,
                'synopsis' => $request->synopsis ?? $film->synopsis,
                'photo' => $request->photo ?? $film->photo,
                'lien_bo' => $request->lien_bo ?? $film->lien_bo,
                'idgenre' => $request->idgenre ?? $film->idgenre,
                'idtheme' => $request->idtheme ?? $film->idtheme,
                'idrealisateur' => $request->idrealisateur ?? $film->idrealisateur,
                'idproducteur' => $request->idproducteur ?? $film->idproducteur
            ]);
        }

        if ($request->Supprimer) {
            try {
                $film->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            $cv = $request->file('photo');

            $cv->move('C:\Users\MameCoumbaNDAO\Desktop\SUP3DEV\Cinematheque\public\img\photo\\', $cv->getClientOriginalName());


            $photo = 'img\photo\\' . $cv->getClientOriginalName();
            try {
                Film::create([
                    'titre' => $request->titre,
                    'duree' => $request->duree,
                    'datesortie' => $request->datesortie,
                    'synopsis' => $request->synopsis,
                    'photo' => $photo,
                    'lien_bo' => $request->lien_bo,
                    'idgenre' => $request->idgenre,
                    'idtheme' => $request->idtheme,
                    'idrealisateur' => $request->idrealisateur,
                    'idproducteur' => $request->idproducteur
                ]);
            } catch (\Exception $e) {
                return back()->withInput();
            }
        }

        return redirect()->route('admin.dashboard');
    }
    public function jouer(Request $request, Jouer $jouer=null)
    {

        if ($request->Valider) {

            $jouer->update([
                'datedebut' => $request->datedebut,
                'datefin' => $request->datefin,
                'idacteur' => $request->idacteur ?? $jouer->idacteur,
                'idfilm' => $request->idfilm ?? $jouer->idfilm
            ]);
        }

        if ($request->Supprimer) {
            try {
                $jouer->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Jouer::create([
                'datedebut' => $request->datedebut,
                'datefin' => $request->datefin,
                'idacteur' => $request->idacteur,
                'idfilm' => $request->idfilm
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
    public function cinema(Request $request, Cinema $cinema=null)
    {

        if ($request->Valider) {

            $cinema->update([
                'nomcinema' => $request->nomcinema
            ]);
        }

        if ($request->Supprimer) {
            try {
                $cinema->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Cinema::create([
                'nomcinema' => $request->nomcinema
            ]);
        }

        return redirect()->route('admin.dashboard');
    }
    public function seance(Request $request, Seance $seance=null)
    {

        if ($request->Valider) {

            $seance->update([
                'idcinema' => $request->idcinema ?? $seance->idcinema,
                'idfilm' => $request->idfilm ?? $seance->idfilm
            ]);
        }

        if ($request->Supprimer) {
            try {
                $seance->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Seance::create([
                'idcinema' => $request->idcinema,
                'idfilm' => $request->idfilm
            ]);
        }

        return redirect()->route('admin.dashboard');
    }

}
