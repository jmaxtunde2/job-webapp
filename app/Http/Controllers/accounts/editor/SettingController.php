<?php

namespace App\Http\Controllers\accounts\editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
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
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $setting = Setting::where('id', '>', 0)->first();

        //
        if ($setting == null) return back();
        $data = array();
        $data['title'] = "Modifier le Parametre ".$setting->website_title;
        $data['user_type'] = $this->user_type;
        $user = $this->user;

        return view('account.'.$this->user_type.'.edit_setting')->with(compact( 'data', 'setting' , 'user'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()) {
            //
            $this->validate($request, [
                'website_title' => 'required|string',       
            ]);


            //
                
            $postData = $request->all();

            if ($request->hasFile('logo')) {

                $file = $request->file('logo');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/dashboards/images', $name);
                $postData['logo'] = $name;
            }


            $settings = Setting::updateOrCreate(['id' => 1], $postData);
            //

            if ($settings) {

                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Setting mis à jour avec succès..  Redirection dans 3 secondes !');
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
        $delete = Setting::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }
}
