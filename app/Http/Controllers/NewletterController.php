<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newletter;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewletterController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "List des abonnés à la Newletter";
        $newletters  = Newletter::orderBy('id', 'DESC')->paginate(20);
        return view('newletters')->with(compact( 'data', 'newletters'));               
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
        if($request->ajax()) {

            $this->validate($request, [
                
                'email' => 'required|email|unique:newletters,email',  
                'whatsapp' => 'nullable|string|unique:newletters,phone',     
            ]);

            $postData = $request->all();

            $save = Newletter::create($postData);
				//
				if ($save) {
					//
                    foreach (loadEditors() as $editor) 
                        {
                            //$not = new Notifications();
                            Notification::create([
                                'msg' => '  Nouveau abonné à la newlleter',
                                'link' => route('newletter_index'),
                                'read' => 0,
                                'user_id' => $editor->id
                            ]);
                        }
					$msgData['success'] = true; 
					return $this->sendResponse(true, $msgData, 'Félicitation, vous etes abonnes à la Newletter.  Redirection dans 3 secondes !');
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
    public function delete($id)
    {
        //
        $delete = Newletter::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }
}
