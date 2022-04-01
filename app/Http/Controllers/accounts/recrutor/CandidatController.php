<?php

namespace App\Http\Controllers\accounts\recrutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Candidat;
use App\CandidatFormation;
use App\CandidatReference;

class CandidatController extends Controller
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
             //dd($this->user_type);
 
             return $next($request);
         });
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $data = array();
        // Search for category
        if($request->isMethod("post"))
        {           
            $data['title'] = "Resultat de votre recherche";
            $candidat  = Candidat::Where('title','like', '%'.$request->get('field').'%')
                                   ->orderBy('id', 'DESC')->paginate(10);   
            $data['count'] = $candidat->count();
        }

        else 
        {   
         
         $candidat  = Candidat::orderBy('id', "DESC")->paginate(10);   
         $data['title'] = " Liste des Candidats";
        } 
        
         $data['user_type'] = $this->user_type;
         $user = $this->user;
         return view('account.'.$this->user_type.'.candidat')->with(compact('data', 'user','candidat'));
   
    }
    public function find() {
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Rechercher un candidat";
        $user = $this->user;
        return view('account.'.$this->user_type.'.find_candidat')->with(compact( 'data', 'user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveSuivre(Request  $request, $id)
    {
        
    }
     public function store(Request $request)
    {
        
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
         $data = array();
         //
         $data['title'] = ucwords($this->user_type)." Curriculun Vitae";
         $data['user_type'] = $this->user_type;
         $user = $this->user;
         $candidat  = Candidat::where('candidat_id', $id)->first(); 
         $candidatform  = CandidatFormation::where('candidat_id', $id)->where('mention', '<>','experience_professionel')->get(); 
         $candidatexp  = CandidatFormation::where('candidat_id', $id)->where('mention', 'experience_professionel')->get(); 
         $candidatref  = CandidatReference::where('candidat_id', $id)->get(); 
        
         return view('account.'.$this->user_type.'.cv')->with(compact('data', 'user','candidat', 'candidatform','candidatexp','candidatref'));
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       
    }
}
