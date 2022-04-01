<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function login()
    {
        $data = array();

        if (Auth::check()) {
           //$this->access();
           return "logged in";
        }else{
             //
             //return 123;7
            $data['title'] = "Connexion Perfect Job";
            return view('account.login')->with('data', $data);
        }
       

    }
    //

    public function access() {
        $user = Auth::user();
        $level = $user->level;
        //
        switch ($level) {
           case '6036':
                return redirect()->route('admin.dashboard');
                break;
            default:
        }
    }

    public function doLogout(Request $request) {
        Auth::logout();
        return redirect()->route('login');

    }


    public function doLogin(Request $request) {

        if($request->isMethod('post')) {

            $this->validate($request, [
                'email' => 'required|max:255|email',
                'password' => 'required',
            ]);
            //

            $user_data = array(
                'email' => $request->get('email'),
                'password' => $request->get('password')
            );


            if (Auth::attempt($user_data)) {
                //

                if (Auth::user()->status < 1) {
                    Auth::logout();
                    $data['success'] = false;
                    
                    return $this->sendResponse(false, $data, 'Votre compte est momentanément Inactive. Veuillez Contacter l’adminstrateur. Merci.');
                }

                $data['success'] = true;
                return $this->sendResponse(true, $data, 'Fécilitation, Connexion réussie. Redirection dans 3 secondes');
            } else {
                $data['success'] = false;
                return $this->sendResponse(false, $data, 'Erreur de combinaison de l’email et mot de passe');
            }

        }
    }


    function userProfile() {
        $user = Auth::user();
        //
        $data = array();
        $data['title'] = "Paramètre d’utilisateur - ".$user->names;
        $user_type = getLevel($user->level);
        $data['user_type'] = $user_type;

        return view('account.'.$user_type.'.profile_settings')->with(compact( 'data', 'user'));
    }

    function changePassword(Request $request) {

        $this->validate($request,[
            'password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!(Hash::check($request->get('password'), $user->password))) {
            $msgData['success'] = false;
            return $this->sendResponse(false, $msgData, 'Votre mot de passe est différent de celui que vous aviez fourni. SVP Essayer à nouveau. Redirection dans 3 secondes !');
        }
        //
        if(strcmp($request->get('password'), $request->get('new_password')) == 0){
            $msgData['success'] = false;
            return $this->sendResponse(false, $msgData, 'Votre mot de passe doit etre différent de l\'ancien. SVP Choississez un mot de passe différent.Redirection dans 3 secondes!');
        }
        //

        //
        $user->password = bcrypt($request->get('new_password'));

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() .'/dashboards/images/users/', $name);
            $postData['photo'] = $name;
        }

        $save = $user->save();
        //
        if ($save) {

            $msgData['success'] = true;
            return $this->sendResponse(true, $msgData, 'Fécilitation, mot de passe mis à jour avec succès. Redirection dans 3 secondes !');
        }
        else {
            $msgData['success'] = false;
            return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
        }
    }

    function profileSettings(Request $request) {

        if($request->ajax()) {
            //
            $this->validate($request,['names' => 'nullable|string|min:6','phone' => 'nullable|string|unique:users,phone']);

            //
            $user = Auth::user();
            $postData = $request->only('names','phone','description','photo','address');

            $file = $request->file('photo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/dashboards/images/users', $name);
            $postData['photo'] = $name;
            //
            $saveUser= $user->update($postData);
            if ($saveUser) {

                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Fécilitation, Profile mis à jour avec succès. Redirection dans 3 secondes !');
            }
            else {
                $msgData['success'] = false;
                return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
            }
        }
    }


}
