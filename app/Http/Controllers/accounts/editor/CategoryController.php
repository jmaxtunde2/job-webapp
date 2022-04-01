<?php

namespace App\Http\Controllers\accounts\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
            $categories = Category::Where('name','like', '%'.$request->get('field').'%')
                                   ->orderBy('id', 'DESC'); 
            $data['count'] = $categories->count();
        }

        else 
        {             
            // List of categories available
            $data['title'] = "List des categories disponibles";
            $categories  = Category::orderBy('id', 'DESC');            
        }

        $categories = $categories->paginate(20);
            
            $data['user_type'] = $this->user_type;
            $user = $this->user;

        return view('account.'.$this->user_type.'.categories_list')->with(compact( 'data', 'categories', 'user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  Ajouter une nouvelle categorie
        
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Ajouter une Nouvelle Categorie";
        $user = $this->user;
        return view('account.'.$this->user_type.'.add_Category')->with(compact( 'data', 'user'));
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

            $save = Category::create($postData);
				//
				if ($save) {
					//
					$msgData['success'] = true; 
					return $this->sendResponse(true, $msgData, 'Categorie ajoutée avec succès.  Redirection dans 3 secondes !');
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
         $category = Category::find($id);

         //
         if ($category == null) return redirect()->route($this->user_type.'.category_index');
         $data = array();
         $data['title'] = "Editer la categorie ".$category->name;
         $data['user_type'] = $this->user_type;
         $user = $this->user;
 
         return view('account.'.$this->user_type.'.edit_category')->with(compact( 'data', 'category' , 'user'));
     
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
            $category = Category::find($id); 

            $saveCategory= $category->update($postData);
            //

            if ($saveCategory) {

                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Categorie mis à jour avec succès.. Redirecting in 3 seconds !');
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
        $delete = Category::destroy($id);
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
        $data['title'] = "Rechercher une Categorie";
        $user = $this->user;
        return view('account.'.$this->user_type.'.find_category')->with(compact( 'data', 'user'));
    }
}
