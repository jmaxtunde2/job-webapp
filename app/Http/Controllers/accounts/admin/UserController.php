<?php

namespace App\Http\Controllers\accounts\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
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
        if($request->isMethod('post')) {

            // Search for user

            $data['title'] = "Search Result";
            $users = User::where('names', $request->get('field'))
                            ->orWhere('phone', $request->get('field'))
                            ->orWhere('email', $request->get('field'))
                            ->paginate(10);                            
        }

        else{
            
            // List users 
            
            $data['title'] = "List of Users";
            $users  = User::orderBy('id', 'DESC')->paginate(10);            
        }

        $user = $this->user;
        $data['user_type'] = $this->user_type;
        return view('account.'.$this->user_type.'.users_list')->with(compact( 'data', 'users', 'user'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a new user {staff, Accountant, Logistics}
        
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Add New User";
        $user = $this->user;
        return view('account.'.$this->user_type.'.add_user')->with(compact( 'data', 'user'));
  
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

        if($request->ajax()) {

            $this->validate($request, [
                'names' => 'required|string|min:3|max:50',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|string|unique:users,phone',
                'password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6|same:password',
                'level' => 'numeric|nullable',
            ]);



            $postData = $request->all();

            //encrypt password
            $postData['password'] = bcrypt($postData['password']);

            if ($request->hasFile('photo')) {

                $file = $request->file('photo');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/dashboards/images/users', $name);
                $postData['photo'] = $name;
            }



            $addUser = User::create($postData);

           
            if ($addUser) {
               
                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Utilisateur ajoutée avec succès.  Redirection dans 3 secondes !');
            }
            else {
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
        $userSelected = User::find($id);

        //
        if ($userSelected == null) return redirect()->route($this->user_type.'.users_index');
        $data = array();
        $data['title'] = "Modifier un utilisateur - ".$userSelected->names;
        $data['user_type'] = $this->user_type;
        $user = $this->user;

        return view('account.'.$this->user_type.'.edit_user')->with(compact( 'data', 'userSelected' , 'user'));
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
        if($request->ajax()) {
            //
            $this->validate($request,['names' => 'nullable|string|min:6',
            'level' => 'nullable|nullable']);

            //
            $user = User::find($id);
            //$postData = $request->only('names', 'level', 'return_percent', 'balance');

            $postData = $request->all();

            if ($request->hasFile('photo')) {

                $file = $request->file('photo');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/dashboards/images/users', $name);
                $postData['photo'] = $name;
            }


            $saveUser= $user->update($postData);
            //

            if ($saveUser) {

                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Utilisateur mis à jour avec succès.. Redirecting in 3 seconds !');
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
        //
        $delete = User::destroy($id);
        //
        if ($delete) {
            return back();
        }
        else {
            return back();
        }
    }


    // Search for a user
    public function finduser() {
        $data = array();
        $data['user_type'] = $this->user_type;
        $data['title'] = "Recherche un utilisateur";
        $user = $this->user;
        return view('account.'.$this->user_type.'.find_user')->with(compact( 'data', 'user'));
    }
}
