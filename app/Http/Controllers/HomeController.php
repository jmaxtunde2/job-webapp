<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Setting;
use App\Emploi;
use App\Category;
use App\Type;
use App\Ville;
use App\User;
use App\Candidat;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{
    
    use AuthenticatesUsers;
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
            return redirect()->route('access');
        }else{
             
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
            case '6035':
                return redirect()->route('editor.dashboard');
                break;
            case '6031':
                return redirect()->route('user.dashboard');
                break;
            case '6034':
                return redirect()->route('recrutor.dashboard');
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
            $file->move(public_path() . '/dashboards/images/users', $name);
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
            $this->validate($request,['names' => 'nullable|string|min:6']);

            //
            $user = Auth::user();
            $postData = $request->only('names','phone','description','photo','address');
            if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/dashboards/images/users', $name);
            $postData['photo'] = $name;
            }
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



    public function index()
    {
        $setting = Setting::where('status',1)->first();
        $emplois = Emploi::where('status',1)->latest()->take(25)->get();
        $categories = Category::orderBy('name','ASC')->get();
        $companies  = User::where('level', '6034')->where('status', 1)->take(10)->get(); 
        $candidat  = Candidat::orderBy('id', "DESC")->take(10)->get();   

        $count = array();
        $count['categorie1'] = count(Emploi::where('category_id', 1)->get());
        $count['categorie2'] = count(Emploi::where('category_id', 2)->get());
        $count['categorie3'] = count(Emploi::where('category_id', 26)->get());
        $count['categorie4'] = count(Emploi::where('category_id', 4)->get());
        $count['categorie5'] = count(Emploi::where('category_id', 5)->get());
        $count['categorie6'] = count(Emploi::where('category_id', 9)->get());
        $count['categorie7'] = count(Emploi::where('category_id', 12)->get());
        $count['categorie8'] = count(Emploi::where('category_id', 25)->get());
        
        $data['title'] = "Le No 1 de platform de Jobs et bourses en Afrique Francophone";
        return view('website.homepage')->with(compact( 'data', 'setting', 'emplois', 'categories', 'count','companies','candidat'));
    }

    public function search(Request $request)
    {
        $title = $request->search;
        $category = $request->select;
        $setting = Setting::where('status',1)->first();

        if($title && $category)
        {
            $emplois = Emploi::where('title','like', '%'.$title.'%')->where('category_id',$category)->where('status',1)->latest()->paginate();
        } else if($title)
        {
            $emplois = Emploi::where('title','like', '%'.$title.'%')->where('status',1)->latest()->paginate();
        }
        else if($category)
        {
            $emplois = Emploi::where('category_id',$category)->where('status',1)->latest()->paginate();
        }
        else
        {
            $emplois = Emploi::where('status', 1)->latest()->paginate(20);
        }

        $categories = Category::orderBy('name','ASC')->get();
        $types = Type::orderBy('name','ASC')->get();
		$emploiss = Emploi::where('status', 1)->latest()->get();
        
        $data['title'] = "Le No 1 de platform de Jobs et bourses en Afrique Francophone";
        return view('website.jobs_listing')->with(compact( 'data', 'setting', 'emplois', 'emploiss', 'categories', 'types'));
    }


    public function jobListing(Request $request,$duration="All")
    {
        $setting = Setting::where('status', 1)->first();
        $emplois = Emploi::where('status', 1)->latest();
        $emploiss = Emploi::where('status', 1)->latest()->get();
        $categories = Category::orderBy('name','ASC')->get();
        $types = Type::orderBy('name','ASC')->get();

      
                
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
    
                else if ($duration == 'yesterday') {
                    $start_1 = Carbon::yesterday();
                    $data['duration'] = "Hier";

                    //
                    $emplois = $emplois->where
                    ('created_at', $start_1);
                    $data['count'] = $emplois->count();
                }
    
    
                else if ($duration == 'date_depot') {
                   
                    $data['duration'] = "date_depot";
                    //
                    $emplois = $emplois->latest();
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


        $data['title'] = "Les emplois disponibles";
        return view('website.jobs_listing')->with(compact( 'data', 'setting', 'emplois', 'emploiss', 'categories', 'types'));
    }
    
    public function jobByType($type)
    {
            $setting = Setting::where('status',1)->first();
            $emplois = Emploi::where('type_id',$type)->where('status',1)->latest()->paginate(20);
            $categories = Category::orderBy('name','ASC')->get();
            $types = Type::orderBy('name','ASC')->get();
            $villes = Ville::orderBy('name','ASC')->get();
			 $emploiss = Emploi::where('status', 1)->latest()->get();

            $data['title'] = "Les emplois disponibles";
            return view('website.jobs_listing')->with(compact( 'data', 'setting', 'emplois', 'emploiss', 'categories', 'types', 'villes'));
        
    }


    public function jobByPays($pays)
    {
            $setting = Setting::where('status',1)->first();
            $emplois = Emploi::where('pays',$pays)->where('status',1)->latest()->paginate(20);
            $categories = Category::orderBy('name','ASC')->get();
            $types = Type::orderBy('name','ASC')->get();
            $villes = Ville::orderBy('name','ASC')->get();
			 $emploiss = Emploi::where('status', 1)->latest()->get();

            $data['title'] = "Les emplois disponibles ".$pays ;
            return view('website.jobs_listing')->with(compact( 'data', 'setting', 'emplois', 'emploiss', 'categories', 'types', 'villes'));
        
    }



    public function jobByCategory($category)
    {
            $setting = Setting::where('status',1)->first();
            $emplois = Emploi::where('category_id',$category)->where('status',1)->latest()->paginate(20);
            $categories = Category::orderBy('name','ASC')->get();
            $types = Type::orderBy('name','ASC')->get();
            $villes = Ville::orderBy('name','ASC')->get();

			$emploiss = Emploi::where('status', 1)->latest()->get();
            $data['title'] = "Les emplois disponibles";
            return view('website.jobs_listing')->with(compact( 'data', 'setting', 'emplois', 'emploiss', 'categories', 'types', 'villes'));
        
    }

    
    public function jobDetail($slug)
    {
        $setting = Setting::where('status',1)->first();
        $emploi = Emploi::where('slug',$slug)->first();
        $emploi->nbView++;
        $emploi->save();

        $emplois = Emploi::where('category_id',$emploi->category_id)->orderBy('created_at','DESC')->paginate(30);


        $data['title'] = "Detail de l'annonce ";
        return view('website.job_detail')->with(compact( 'data', 'setting', 'emploi','emplois'));
    }

    public function about()
    {
        $setting = Setting::where('status',1)->first();
        $data['title'] = "Detail de l'annonce ";
        return view('website.about')->with(compact( 'data', 'setting'));
    }

    public function candidat()
    {
        $setting = Setting::where('status',1)->first();
        $data['title'] = "Profils de Candidats ";
        $candidat  = Candidat::orderBy('id', "DESC")->take(10)->get();   
        return view('website.candidat')->with(compact( 'data', 'setting','candidat'));
    }

    public function contacts()
    {
        $setting = Setting::where('status',1)->first();
        $data['title'] = "Detail de l'annonce ";
        return view('website.contact')->with(compact( 'data', 'setting'));
    }

    public function registerForm()
    {
        $data['title'] = "Inscription ";
        return view('account.register')->with('data', $data);
    }

    public function registerFormCandidat()
    {
        $data['title'] = "Inscription du Candidat";
        return view('account.register_candidat')->with('data', $data);
    }

    public function sitemap()
    {
        $emplois = Emploi::where('status',1)->orderBy('id','desc')->get();

        return response()->view('sitemap', compact('emplois'))
          ->header('Content-Type', 'text/xml');

    }


    public function register(Request $request)
    {
        if($request->ajax()) {

            $this->validate($request, [
                'names' => 'required|string|min:3|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6|same:password',
            ]);



            $postData = $request->all();

            //encrypt password
            $postData['password'] = bcrypt($postData['password']);
            $postData['level'] = 6034;

            if ($request->hasFile('photo')) {

                $file = $request->file('photo');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/dashboards/images/users', $name);
                $postData['photo'] = $name;
            }



            $addUser = User::create($postData);

           
            if ($addUser) {
               
                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Fécilitation, Inscription réussie.  Redirection dans 3 secondes !');
            }
            else {
                $msgData['success'] = false;
                return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
            }
        }
    }

    public function registerCandidat(Request $request)
    {
        if($request->ajax()) {

            $this->validate($request, [
                'names' => 'required|string|min:3|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6|same:password',
            ]);



            $postData = $request->all();

            //encrypt password
            $postData['password'] = bcrypt($postData['password']);
            $postData['level'] = 6031;

            if ($request->hasFile('photo')) {

                $file = $request->file('photo');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/dashboards/images/users', $name);
                $postData['photo'] = $name;
            }



            $addUser = User::create($postData);           
            if ($addUser) {
               
                $msgData['success'] = true;
                return $this->sendResponse(true, $msgData, 'Fécilitation, Inscription réussie.  Redirection dans 3 secondes !');
            }
            else {
                $msgData['success'] = false;
                return $this->sendResponse(false, $msgData, 'Une Erreur est Intervenue. Essayer à nouveau !!');
            }
        }
    }

}
