<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur as UtilisateurModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Enum;
use storage\app\Villes;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;



class Utilisateur extends Controller
{
    function inscription (Request $request): RedirectResponse{
        // verification initiale des champs
        
        $donneesValidees = $request->validate([
            'nom' => ['required', 'max:255'],
            'prenom' => ['required', 'max:255'],
            'telephone' => ['required', 'size:9'],
            'email' => ['max:255','email'],
            'mot_de_passe' => ['required', 'max:255','alpha_num'],
            'ville' => ['required', 'max:255']
        ]);
        
        // creation d'un user avec les infos de base
        // l'enregistrement de la photo se fera apres de mm que les coordonnees
        $utilisateur1 = UtilisateurModel::firstOrCreate(
            [
                'email'=> $donneesValidees['email'],
            ],
            [
                'nom'=> $donneesValidees['nom'],
                'prenom'=> $donneesValidees['prenom'],
                'telephone'=> $donneesValidees['telephone'],
                'email'=> $donneesValidees['email'],
                'mot_de_passe'=> Hash::make($donneesValidees['mot_de_passe']),
                'ville'=> $donneesValidees['ville']
            ]
        );
        $utilisateur1->save();
        
        // à la fin on renvoit une notification de bonne inscription pour 
        // verification ultérieure de l'email
        event(new Registered($utilisateur1));
        
        // redirection vers l'accueil
        return redirect("/");
    }

    function modificationProfil(Request $request): RedirectResponse{
        // on modifie les paramètres spécifiés
        UtilisateurModel::where('email', $request->query('email'))
            ->update(
                [
                    'nom' => $request->query('nom'),
                    'prenom' => $request->query('prenom'),
                    'telephone' => (string)$request->query('telephone'),
                    'email' => $request->query('email'),
                    'ville' => $request->query('ville'),
                    'date_mise_a_jour' => date('Y-m-d H:i:s')
                ]
            );
        

        return redirect("/");
    }

    


    
    
}
