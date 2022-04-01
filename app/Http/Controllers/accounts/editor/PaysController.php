<?php

namespace App\Http\Controllers\accounts\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pays;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaysController extends Controller
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
        // Search for Pays
        if($request->isMethod("post"))
        {           
            $data['title'] = "Resultat de votre recherche";
            $pays = Pays::Where('name','like', '%'.$request->get('field').'%')
                                   ->orderBy('id', 'DESC'); 
            $data['count'] = $pays->count();
        }

        else 
        {             
            // List of pays available
            $data['title'] = "List des Pays disponibles";
            $pays  = Pays::orderBy('id', 'DESC');            
        }

        $pays = $pays->paginate(20);
            
            $data['user_type'] = $this->user_type;
            $user = $this->user;

        return view('account.'.$this->user_type.'.pays_list')->with(compact( 'data', 'pays', 'user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  Ajouter une nouveau pays
        
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Ajouter un Nouveau Pays";
        $user = $this->user;
        return view('account.'.$this->user_type.'.add_Pays')->with(compact( 'data', 'user'));
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

        $save = Pays::create($postData);
            //
            if ($save) {
                //
                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Pays ajouté avec succès.  Redirection dans 3 secondes !');
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
        $pays = Pays::find($id);

         //
         if ($pays == null) return redirect()->route($this->user_type.'.pays_index');
         $data = array();
         $data['title'] = "Editer le pays ".$pays->name;
         $data['user_type'] = $this->user_type;
         $user = $this->user;
 
         return view('account.'.$this->user_type.'.edit_pays')->with(compact( 'data', 'pays' , 'user'));
     
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
            $pays = Pays::find($id);

            $savePays= $pays->update($postData);
            //

            if ($savePays) {

                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Pays mis à jour avec succès.. Redirecting in 3 seconds !');
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
        $delete = Pays::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }

    public function findPays() {
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Rechercher un Pays";
        $user = $this->user;
        return view('account.'.$this->user_type.'.find_pays')->with(compact( 'data', 'user'));
    }
}
