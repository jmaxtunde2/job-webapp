<?php

namespace App\Http\Controllers\accounts\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
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
            $types = Type::Where('name','like', '%'.$request->get('field').'%')
                                   ->orderBy('id', 'DESC'); 
            $data['count'] = $types->count();
        }

        else 
        {             
            // List of types available
            $data['title'] = "List des types disponibles";
            $types  = Type::orderBy('id', 'DESC');            
        }

        $types = $types->paginate(20);
            
            $data['user_type'] = $this->user_type;
            $user = $this->user;

        return view('account.'.$this->user_type.'.types_list')->with(compact( 'data', 'types', 'user'));
        
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
        $data['title'] = "Ajouter un Nouveau Type";
        $user = $this->user;
        return view('account.'.$this->user_type.'.add_type')->with(compact( 'data', 'user'));
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

            $save = Type::create($postData);
				//
				if ($save) {
					//
					$msgData['success'] = true;
					return $this->sendResponse(true, $msgData, 'Type ajouté avec succès.  Redirection dans 3 secondes !');
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
        $type = Type::find($id);

         //
         if ($type == null) return redirect()->route($this->user_type.'.type_index');
         $data = array();
         $data['title'] = "Editer le type ".$type->name;
         $data['user_type'] = $this->user_type;
         $user = $this->user;
 
         return view('account.'.$this->user_type.'.edit_type')->with(compact( 'data', 'type' , 'user'));
     
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
            $type = Type::find($id);

            $saveType= $type->update($postData);
            //

            if ($saveType) {

                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Type mis à jour avec succès.. Redirecting in 3 seconds !');
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
        $delete = Type::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }

    public function findType() {
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Rechercher un Type";
        $user = $this->user;
        return view('account.'.$this->user_type.'.find_type')->with(compact( 'data', 'user'));
    }
}
