<?php

namespace App\Http\Controllers\accounts\recrutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Publicite;
use App\Emploi;
use App\Candidat;

class DashboardController extends Controller
{
    
     //
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
        $data['title'] = ucwords($this->user_type)." Dashboard";
        $data['user_type'] = $this->user_type;
        $user = $this->user;
        $emplois  = Emploi::where('company_id', $this->user->id)->orderBy('id', 'DESC');          
        $publicites  = Publicite::where('user_id', $this->user->id)->orderBy('id', 'DESC');  
        $candidat  = Candidat::orderBy('id', "DESC")->paginate(10);   
        
        return view('account.'.$this->user_type.'.dashboard')->with(compact('data', 'user','emplois','candidat', 'publicites'));
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
    public function store(Request $request)
    {
        //
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
        //
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
    public function destroy($id)
    {
        //
    }
}
