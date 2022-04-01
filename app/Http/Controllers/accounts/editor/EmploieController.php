<?php

namespace App\Http\Controllers\accounts\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Emploi;
use App\Type;
use App\Category;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmploieController extends Controller
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
    public function index(Request $request,$duration="Tous")
    {
        $data = array();
        
        // List of emplois available
            $data['title'] = "List des empois disponibles";
            $emplois  = Emploi::orderBy('id', 'DESC');  
            
            
            if ($duration == 'daily') {
                $start_1 = Carbon::now()->startOfDay();
                $end_1 = Carbon::now()->endOfDay();
                $data['duration'] = "daily";
                //
                $emplois = $emplois->whereBetween('created_at', [$start_1, $end_1]);
                $data['count'] = $emplois->count();

            }

            else if ($duration == 'weekly') {

                $start_1 = Carbon::now()->startOfWeek();
                $end_1 = Carbon::now()->endOfWeek();
                $data['duration'] = "weekly";
                //
                $emplois = $emplois->whereBetween('created_at', [$start_1, $end_1]);
                $data['count'] = $emplois->count();
            }

            else if ($duration == 'monthly') {

                $start_1 = Carbon::now()->startOfMonth();
                $end_1 = Carbon::now()->endOfMonth();
                $data['duration'] = "monthly";
                //
                $emplois = $emplois->whereBetween('created_at', [$start_1, $end_1]);
                $data['count'] = $emplois->count();
            }

            else if ($duration == 'last_month') {
                $start = new Carbon('first day of last month');
                $start_1 = $start->startOfMonth()->toDateTimeString();
                $end = new Carbon('last day of last month');
                $end_1 = $end->endOfMonth()->toDateTimeString();
                $data['duration'] = "last_month";
                //
                $emplois = $emplois->whereBetween('created_at', [$start_1, $end_1]);
                $data['count'] = $emplois->count();
            }


            else if ($duration == 'yearly') {
                $start_1 = Carbon::now()->startOfYear();
                $end_1 = Carbon::now()->endOfYear();
                $data['duration'] = "yearly";
                //
                $emplois = $emplois->whereBetween('created_at', [$start_1, $end_1]);
                //
                $data['count'] = $emplois->count();

            }

            else {
                $emplois = $emplois;
                $data['duration'] = "all";
                //
                $data['count'] = $emplois->count();
            }
         

        $data['status'] = $request->duration;

        $emplois = $emplois->paginate(20);
            
            $data['user_type'] = $this->user_type;
            $user = $this->user;

        return view('account.'.$this->user_type.'.emploi_list')->with(compact( 'data', 'emplois', 'user'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a product
        
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Ajouter Un nouveau Emploi";
        $user = $this->user;
        $categories = Category::orderBy('name', 'ASC')->get();
        $types = Type::orderBy('name', 'ASC')->get();
        return view('account.'.$this->user_type.'.add_emploi')->with(compact( 'data', 'types', 'categories', 'user'));
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
                'location' => 'required|string',
            ]);

            

            $postData = $request->all();
            $postData['slug'] =  Str::slug($request->title,"-");

            if($this->user->level != 6036)
            {
                $postData['company_id'] =  $this->user->id;
                $postData['status'] =  0;
            }

                            
            $save = Emploi::create($postData);

                //
                
                if ($save) 
                {
                    if($this->user->level != 6036)
                    {
                        //send Notifications to Admin and Editors
                        foreach (loadEditors() as $editor) 
                        {
                            //$not = new Notifications();
                            Notification::create([
                                'msg' => $this->user->names.'  a Posté un nouveau Emploi.',
                                'link' => route(getLevel($editor->level).'.jobs_index'),
                                'read' => 0,
                                'user_id' => $editor->id
                            ]);
                        }
                    }

                        $msgData['success'] = true;
					    return $this->sendResponse(true, $msgData, 'Categorie ajoutée avec succès.  Redirection dans 3 secondes !');
				
                }
				} else {
					$msgData['success'] = false;
					return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
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
         $data = array();
         $data['title'] = "Detail du Job #".$id;
         $data['user_type'] = $this->user_type;
         $user = $this->user;
 
         //
         $job = Emploi::where('id', $id)
                         ->first();
         if ($job == null) {
             return back();
                 
             } else {
                 return view('account.'.$this->user_type.'.jobs_detail')->with(compact( 'data', 'user', 'job'));
             }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $job = Emploi::find($id);

        //
        if ($job == null) return redirect()->route($this->user_type.'.emploi_index');
        $data = array();
        $data['title'] = "Editer l'emoloi ".$job->title;
        $data['user_type'] = $this->user_type;
        $user = $this->user;
        $categories = Category::orderBy('name', 'ASC')->get();
        $types = Type::orderBy('name', 'ASC')->get();
        

        return view('account.'.$this->user_type.'.edit_emploi')->with(compact( 'data', 'job' , 'user', 'categories' , 'types'));
    
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
                'title' => 'required|string',
                'location' => 'required|string',
            ]);
            //

            $postData = $request->all();
            $jobs = Emploi::find($id);

            $saveJobs= $jobs->update($postData);
            //

            if ($saveJobs) {

                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Emploi mis à jour avec succès.. Redirection dans 3 seconds !');
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
        $delete = Emploi::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }

    public function searchJob(Request $request)
    {

        $data['title'] = "Resultat de votre recherche";
            $emplois = Emploi::where('title','like', '%'.$request->get('search').'%')
                            ->orWhere('location','like', '%'.$request->get('search').'%')
                            ->orderBy('id', 'DESC')
                            ->paginate(10);
                            $emplois->appends(['search' => $request->get('search')]);
                            $user = $this->user;
                            $data['user_type'] = $this->user_type;
                            return view('account.'.$this->user_type.'.emploi_list')->with(compact( 'data', 'emplois', 'user'));

    }

    // Rechercher emploi
    public function findemploi() {
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Rechercher un emploi";
        $user = $this->user;
        return view('account.'.$this->user_type.'.find_emploi')->with(compact( 'data', 'user'));
    }

}
