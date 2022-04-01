<?php

namespace App\Http\Controllers\accounts\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ville;
use App\Pays;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VilleController extends Controller
{
    private $user_type;
    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            $level = $user->level;
            $this->user_type = getLevel($level);
            $this->user = $user;

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array();
        // Search for category
        if($request->isMethod("post"))
        {           
            $data['title'] = "Resultat de votre recherche";
            $villes = Ville::Where('name','like', '%'.$request->get('field').'%')
                                   ->orderBy('id', 'DESC'); 
            $data['count'] = $villes->count();
        }

        else 
        {             
            // List of villes available
            $data['title'] = "List des Villes disponibles";
            $villes  = Ville::orderBy('id', 'DESC');            
        }

        $villes = $villes->paginate(20);
            
            $data['user_type'] = $this->user_type;
            $user = $this->user;

        return view('account.'.$this->user_type.'.villes_list')->with(compact( 'data', 'villes', 'user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Ajouter une Nouvelle Ville";
        $pays = Pays::orderBy('id', 'DESC')->get();  
        $user = $this->user;
        return view('account.'.$this->user_type.'.add_Ville')->with(compact( 'data', 'user', 'pays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Sauvegarder dans la base de donnee

        if($request->ajax()) {

            $this->validate($request, [
                'name' => 'required|string',       
            ]);

            $postData = $request->all();
            $postData['user_id'] = $this->user->id;

            $save = Ville::create($postData);
				//
				if ($save) {
					//
					$msgData['success'] = true;
					return $this->sendResponse(true, $msgData, 'Ville ajoutée avec succès.  Redirection dans 3 secondes !');
				} else {
					$msgData['success'] = false;
					return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
				}
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ville = Ville::find($id);

         //
         if ($ville == null) return redirect()->route($this->user_type.'.ville_index');
         $data = array();
         $data['title'] = "Editer la ville ".$ville->name;
         $data['user_type'] = $this->user_type;
         $user = $this->user;
 
         return view('account.'.$this->user_type.'.edit_ville')->with(compact( 'data', 'ville' , 'user'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->ajax()) {
            //
            $this->validate($request, [
                'name' => 'required|string',                  
            ]);

            //
            $postData = $request->all();
            $ville = Ville::find($id);
            $saveVille= $ville->update($postData);
            //

            if ($saveVille) {

                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Ville mise à jour avec succès.. Redirecting in 3 seconds !');
            }
            else {
                $msgData['success'] = false;
                return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $delete = Ville::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }

    public function findVille() {
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Rechercher une Ville";
        $user = $this->user;
        return view('account.'.$this->user_type.'.find_ville')->with(compact( 'data', 'user'));
    }
}
