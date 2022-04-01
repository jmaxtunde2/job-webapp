<?php

namespace App\Http\Controllers\accounts\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Publicite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PubliciteController extends Controller
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
            $publicites = Publicite::Where('title','like', '%'.$request->get('field').'%')
                                   ->orderBy('id', 'DESC'); 
            $data['count'] = $categories->count();
        }

        else 
        {             
            // List of categories available
            $data['title'] = "List des Publicités disponibles";
            $publicites  = Publicite::orderBy('id', 'DESC');            
        }

        $publicites = $publicites->paginate(20);
            
            $data['user_type'] = $this->user_type;
            $user = $this->user;

        return view('account.'.$this->user_type.'.publicites_list')->with(compact( 'data', 'publicites', 'user'));
        
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
        $data['title'] = "Ajouter une Nouvelle Publicité";
        $user = $this->user;
        $users = User::where('level','6034')->get();
        return view('account.'.$this->user_type.'.add_publicite')->with(compact( 'data', 'user', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {

            $this->validate($request, [
                'title' => 'required|string',     
                'url' => 'required|string',  
                'status' => 'required|string',   
                'activate_date' => 'required|date',   
                'end_date' => 'required|date',    
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',       
            ]);

            $postData = $request->all();

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/dashboards/images/publicites', $name);
                $postData['image'] = $name;
            }

            $save = Publicite::create($postData);
				//
				if ($save) {
					//
					$msgData['success'] = true; 
					return $this->sendResponse(true, $msgData, 'Publicité ajoutée avec succès.  Redirection dans 3 secondes !');
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
        $publicite = Publicite::find($id);
        if ($publicite == null) return redirect()->route($this->user_type.'.publicite_index');
        $data = array();
        $data['title'] = "Modifier la Publicité ".$category->name;
        $data['user_type'] = $this->user_type;
        $user = $this->user;
        return view('account.'.$this->user_type.'.edit_publicite')->with(compact( 'data', 'publicite' , 'user'));
    
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
            $this->validate($request, [
                'title' => 'required|string',     
                'url' => 'required|string',  
                'status' => 'required|string',   
                'activate_date' => 'required|date',   
                'end_date' => 'required|date',    
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',      
            ]);

            $postData = $request->all();
            $publicite = Publicite::find($id); 

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/dashboards/images/publicites', $name);
                $postData['image'] = $name;
            }



            $savePublicite= $publicite->update($postData);
            //

            if ($savePublicite) {

                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Publicité mis à jour avec succès.. Redirecting in 3 seconds !');
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
        $delete = Publicite::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }

    public function findCategorie() {
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Rechercher une Publicité";
        $user = $this->user;
        return view('account.'.$this->user_type.'.find_publicite')->with(compact( 'data', 'user'));
    }
}
