<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Hospital;
use App\Models\HospitalType;
use App\Models\Patient;
use App\Providers\RouteServiceProvider;
use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Profiler\Profile;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contactNumber' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // public function showRegistrationForm()
    // {
    //     $states = State::all();
    //     return view('auth.register', compact('states'));
    // }
    protected function create(array $data)
    {
        //$state=State::all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'contactNumber' => $data['contactNumber'],

        ]);
        // $user->assignRole('User');

        $patient = new Patient();
        $patient->userId = $user->id;
        $patient->contactNo = $user->contactNumber;
        $patient->save();
        return $user;
    }

    public function hospitalCreate(){
        $city = City::all();
        $hospitaltype = HospitalType::all();
        $category=Category::all();
        return view('auth.registerHospital',compact('city','hospitaltype','category'));
    }
    public function registerhospitalStore(Request $request){
        // $this->validate($request, [
        //     'hospitalName' => 'required',
        //     'address' => 'required',
        //     'cityId' => 'required',
        //     'hospitalTypeId' => 'required',
        //     'userId' => 'required',
        //     'siteUrl' => 'required',
        //     'category' => 'required',
        //     'hospitalLogo' => 'required',
        //     'hospitalTime' => 'required',
        //     'services' => 'required',
        // ]);
        
        $user=new User();
        $user->name=$request->hospitalName;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->contactNumber=$request->contactNo;
        $user->assignRole('Hospital');
        $user->save();
        
        $hospital=new Hospital();
        $hospital->hospitalName=$user->name;
        $hospital->slug = $user->name;
        $hospital->address=$request->address;
        $hospital->cityId=$request->cityId;
        
        $hospital->contactNo=$request->contactNo;
        $hospital->hospitalTypeId=$request->hospitalTypeId;
        $hospital->userId=$user->id;
        $hospital->siteUrl=$request->siteUrl;
        $hospital->categoryId=$request->categoryId;
        
        if ($request->hospitalLogo) {
            $hospitalLogo = $request->hospitalLogo;
            $hospital->hospitalLogo = time() . '.' . $request->hospitalLogo->extension();
            $request->hospitalLogo->move(public_path('hospital'), $hospital->hospitalLogo);
        }

        // $hospital->hospitalLogo=$request->hospitalLogo;
        $hospital->hospitalTime=$request->hospitalTime;
        $hospital->services=$request->services;
        $hospital->status="Active";
        $hospital->save();

        if($hospital){
            return redirect('/home');
        }
        
    }
}
