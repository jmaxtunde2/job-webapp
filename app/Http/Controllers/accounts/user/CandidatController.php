<?php

namespace App\Http\Controllers\accounts\user;

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
    public function index()
    {
        //
        $data = array();
        //
        $data['title'] = ucwords($this->user_type)." Curriculun Vitae";
        $data['user_type'] = $this->user_type;
        $user = $this->user;
        $candidat  = Candidat::where('candidat_id', $this->user->id)->first(); 
        $candidatform  = CandidatFormation::where('candidat_id', $this->user->id)->where('mention', '<>','experience_professionel')->get(); 
        $candidatexp  = CandidatFormation::where('candidat_id', $this->user->id)->where('mention', 'experience_professionel')->get(); 
        $candidatref  = CandidatReference::where('candidat_id', $this->user->id)->get(); 
       
        return view('account.'.$this->user_type.'.cv')->with(compact('data', 'user','candidat', 'candidatform','candidatexp','candidatref'));
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
        if($request->ajax()) {

            $save = CompanySuivre::create([
                'candidat_id' => $this->user->id,
                'recruteur_id' => $id,
                ]
            );

            if ($save) {
                //
                $msgData['success'] = true; 
                return $this->sendResponse(true, $msgData, 'Profil ajoutée avec succès.  Redirection dans 3 secondes !');
            } else {
                $msgData['success'] = false;
                return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
            }

        }
    }
     public function store(Request $request)
    {
        if($request->ajax()) {

            $this->validate($request, [
                'title' => 'required|string',  
                'langue' => 'required|string',  
                'dob' => 'required|date',       
            ]);

            $postData = $request->all();
            $postData['candidat_id'] = $this->user->id;

            $user = Candidat::where('candidat_id',$this->user->id)->first();
                if ($user !== null) {
                    $save = $user->update($postData);
                } else {
                    $save = Candidat::create($postData);
                }
				//
				if ($save) {
					//
					$msgData['success'] = true; 
					return $this->sendResponse(true, $msgData, 'Profil ajoutée avec succès.  Redirection dans 3 secondes !');
				} else {
					$msgData['success'] = false;
					return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
				}
        }
    }

    public function storeFormation(Request $request)
    {
        if($request->ajax()) {

            $this->validate($request, [
                'school' => 'required|string',  
                'diplome_obtenue' => 'required|string',  
                'debut' => 'required|date', 
                'fin' => 'required|date',   
                'mention' => 'required|string',     
            ]);

            $postData = $request->all();
            $postData['candidat_id'] = $this->user->id;

            $save = CandidatFormation::create($postData);
				//
				if ($save) {
					//
					$msgData['success'] = true; 
					return $this->sendResponse(true, $msgData, 'Cursus Scholaire ajoutée avec succès.  Redirection dans 3 secondes !');
				} else {
					$msgData['success'] = false;
					return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
				}
        }
    }

    public function storeReference(Request $request)
    {
        if($request->ajax()) {

            $this->validate($request, [
                'names' => 'required|string',  
                'relation' => 'required|string',  
                'phone' => 'required|string', 
                'email' => 'required|email',     
            ]);

            $postData = $request->all();
            $postData['candidat_id'] = $this->user->id;

            $save = CandidatReference::create($postData);
				//
				if ($save) {
					//
					$msgData['success'] = true; 
					return $this->sendResponse(true, $msgData, 'Personne à Contacter avec succès.  Redirection dans 3 secondes !');
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
    public function edit()
    {
    $data = array();
    //
    $data['title'] = ucwords($this->user_type)." Edit Profil";
    $data['user_type'] = $this->user_type;
    $user = $this->user;
    $candidat  = Candidat::where('candidat_id', $this->user->id)->first();  
    $candidatform  = CandidatFormation::where('candidat_id', $this->user->id)->where('mention', '<>','experience_professionel')->get(); 
    $candidatexp  = CandidatFormation::where('candidat_id', $this->user->id)->where('mention', 'experience_professionel')->get(); 
    $candidatref  = CandidatReference::where('candidat_id', $this->user->id)->get(); 
    /*
    $emplois  = Emploi::where('company_id', $this->user->id)->orderBy('id', 'DESC');          
    $publicites  = Publicite::where('user_id', $this->user->id)->orderBy('id', 'DESC');  */  
    
    return view('account.'.$this->user_type.'.edit_profil')->with(compact('data', 'user', 'candidat','candidatform','candidatexp','candidatref'));
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
    public function deleteCursus($id)
    {
        $delete = CandidatFormation::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }
    public function deleteExperience($id)
    {
        $delete = CandidatFormation::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }
    public function deleteReference($id)
    {
        $delete = CandidatReference::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }
}
