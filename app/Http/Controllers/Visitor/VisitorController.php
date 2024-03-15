<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Specialist;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Facility;
use App\Models\HospitalType;
use App\Models\SocialLink;
use App\Models\Patient;
use App\Models\State;
use App\Models\User;
use App\Models\Lead;
use App\Models\Schedule;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\Testimonial;

use Auth;
use Illuminate\Cookie\CookieJar;

class VisitorController extends Controller
{
    public function index()
    {
        $city = City::all();
        $doctorAll = Doctor::all();
        if ($doctorAll) {
            $doctorcount = count($doctorAll);
        }

        $hospital = Hospital::where('status', '!=', 'Delete')->latest()->take(4)->get();
        if ($hospital) {
            $hospitallist = Hospital::all();
            $hospitalcount = count($hospitallist);
        }
        $specialist = Specialist::all();
        $departments = Category::where('status' ,"!=" ,'Deleted')->get();

        $doctor = Doctor::latest()->take(5)->get();

        $specialists = $specialist;
        if ($specialist) {
            $specialistcount = count($specialist);
        }
        $slider = Slider::all();
        $testimonial = Testimonial::where('status' , '!=', 'Deleted')->get();
        return view('visitor.index', compact('testimonial',  'departments', 'city', 'specialist', 'specialists', 'hospital', 'doctor', 'slider', 'hospitalcount', 'specialistcount', 'doctorcount'));
    }
    public function searchCityWiseData(Request $request)
    {
        $cityId = $request->cityId;
        $city = City::all();

        if ($cityId) {
            session()->put('cityId', $cityId);
            $doctor = Doctor::all();
            if ($doctor) {
                $doctorcount = count($doctor);
            }
            $hospital = Hospital::where('cityId', '=', $cityId)->get();
            if ($hospital) {
                $hospitalcount = count($hospital);
            }
            $specialist = Specialist::all();
            $departments = Category::where('status' ,"!=" ,'Deleted')->get();;
           
            $specialists = $specialist;
            if ($specialist) {
                $specialistcount = count($specialist);
            }
            
            $slider = Slider::all();
            return redirect()->back()->with(compact('departments', 'city', 'specialist', 'specialists', 'hospital', 'doctor', 'slider', 'hospitalcount', 'specialistcount', 'doctorcount')) ;
        }
    }
    public function hospitalDetails(Request $request)
    {
        $slug = $request->slug;
        $hospital = Hospital::where('slug', '=', $slug)->first();
        $hospitalId = $hospital->userId;
        $hospital = Hospital::with('user')->where('userId', '=', $hospitalId)->get();

        $specialist = Specialist::all();

        $doctor = Doctor::with('hospital')->where('hospitalId', '=', $hospitalId)->get();

        $gallery = Gallery::where('hospitalId', '=', $hospitalId)->get();

        $facility = Facility::where('hospitalId', '=', $hospitalId)->get();

        $sociallink = SocialLink::where('hospitalId', '=', $hospitalId)->get();
        $city = City::all();


        $visitor = Lead::where('hospitalId', '=', $hospitalId)->first();

        return view('visitor.hospitalDetails', compact('visitor', 'city', 'hospital', 'doctor', 'specialist', 'gallery', 'facility', 'sociallink'));
    }
    public function hospitalList()
    {
        $city = City::all();
        $hospital = Hospital::where('status', '!=', 'Delete')->get();
        $hospitalType = HospitalType::all();
        return view('visitor.hospitals', compact('hospitalType', 'hospital', 'city'));
    }
    public function filterHospital(Request $request)
    {
        
        $hospitalTypeId = $request->hospitalTypeId;
        $hospitalType = HospitalType::all();
        $city = City::all();
        $filterHospital = Hospital::where('hospitalTypeId', '=', $hospitalTypeId)->where('status', '!=', 'Delete')->get();
        return view('visitor.filterHospital', compact('filterHospital', 'hospitalType', 'city'));
    }
    public function profile()
    {
        $userId = Auth::user()->id;
        $patient = Patient::where('userId', '=', $userId)->with('state')->first();
        $state = State::all();
        return view('visitor.profile', compact('patient', 'state'));
    }
    // public function profile(Request $request, $id)
    // {
    //     $userId = Auth::user()->id;
    //     $patient = Patient::where('userId', '=', $userId);
    //     // $patient = Patient::find($id);
    //     return view('visitor.profile', compact('patient'));
    // }
    public function patientUpdate(Request $request)
    {
        $id = $request->userId;
        $patient = Patient::where('userId', '=', $id)->first();
        $patient->address = $request->address;
        $patient->gender = $request->gender;
        $patient->age = $request->age;
        $patient->contactNo = $request->contactNo;
        $patient->stateId = $request->stateId;
        if ($request->photo) {
            $photo = $request->photo;
            $patient->photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('profile'), $patient->photo);
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contactNumber = $request->contactNo;
        $user->save();
        $patient->save();
        return redirect()->back();
    }


    public function visitorsDetail($hospitalId)
    {
        return view('visitor.visitorsDetail');
    }

    public function storVisitorsDetail(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'phone' => 'required|max:10|min:10',
            'age' => 'required',
        ]);
        $slug = $request->slug;
        $hospital = Hospital::with('user')->where('slug', '=', $slug)->first();
        $lead = new Lead();
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->age = $request->age;
        $lead->hospitalId = $hospital->id;
        $lead->save();

        return redirect()->route('visitor.hospitalDetails', ['slug' => $slug])
            ->withCookie(cookie('name', $request->name, 1))
            ->with('message', 'Details added Successfully');
    }
    public function visitorDetalfordoctor()
    {
        return view('visitor.ForDoctorViewVisitorDetails');
    }
    public function storeVisitorDetailfordoctor(Request $request)
    {
        $slug = $request->slug;
        $doctor = Doctor::with('user')->where('slug', '=', $slug)->first();
        $lead = new Lead();
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->age = $request->age;
        $lead->hospitalId = $doctor->hospitalId;
        $lead->save();

        return redirect()->route('visitor.doctorDetails', ['slug' => $doctor->slug])
            ->withCookie(cookie('name', $request->name, 1))
            ->with('message', 'Details added Successfully');
    }
    public function specialist()
    {
        $city = City::all();
        $specialist = Specialist::all();
        return view('visitor.specialist', compact('specialist', 'city'));
    }

    public function doctorList(Request $request, $slug)
    {
        $slug = $request->slug;
        $specialist = Specialist::where('slug', '=', $slug)->first();
        $specialistId = $specialist->id;
        $city = City::all();

        $doctor = Doctor::with('hospital')->with('specialist')->where('specialistId', '=', $specialistId)->where('status', '!=', 'Delete')->get();
        // $education=Education::where('doctorId','=',$)->first();
        return view('visitor.doctor', compact('doctor', 'city'));
    }
    public function doctorDetails(Request $request)
    {
        $city = City::all();
        $slug = $request->slug;
        $doctor = Doctor::with('hospital')->with('education')->with('user')->where('slug', '=', $slug)->first();
        $schedule = Schedule::where('doctorId', '=', $doctor->id)->get();
        $hospital = Hospital::where('userId', '=', $doctor->hospitalId)->first();
        return view('visitor.doctorDetails', compact('city', 'doctor', 'hospital', 'schedule'));
    }
    public function makeAnApoinment()
    {
        $city = City::all();
        $category = Category::all();
        $data['states'] = State::get(["stateName", "id"]);
        return view('visitor.makeAnApoinment', compact('city', 'category'), $data);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("stateId", $request->stateId)
            ->where('status', '!=', 'Delete')
            ->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchHospital(Request $request)
    {
        $data['hospitals'] = Hospital::where("cityId", $request->cityId)
            ->where('status', '!=', 'Delete')
            ->get(["hospitalName", "id"]);
        return response()->json($data);
    }
    public function fetchDoctor(Request $request)
    {
        $hospital = Hospital::where('id', '=', $request->hospitalId)->first();
        $data['doctors'] = Doctor::where("hospitalId", $hospital->userId)
            ->where('status', '!=', 'Delete')
            ->get(["doctorName", "id"]);
        return response()->json($data);
    }
    public function fetchSchedule(Request $request)
    {

        $data['schedules'] = Schedule::where("doctorId", $request->doctorId)
            ->get(["day", "id"]);
        return response()->json($data);
    }
    public function createMakeAnAppoinment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:appointments',
            'contactNo' => 'required|max:10|min:10',
            'appointmentDate' => 'required',
            'hospitalId' => 'required',
            'doctorId' => 'required',
            'stateId' => 'required',
            'cityId' => 'required',
            'message' => 'required|max:2000|min:5',
            'scheduleId' => 'required',
            'categoryId' => 'required',
        ]);

        //$hospital=Hospital::where('id',$request->hospitalId)->first();
        $appoinment = new Appointment();
        $appoinment->name = $request->name;
        $appoinment->email = $request->email;
        $appoinment->contactNo = $request->contactNo;
        $appoinment->stateId = $request->stateId;
        $appoinment->cityId = $request->cityId;
        $appoinment->hospitalId = $request->hospitalId;
        $appoinment->doctorId = $request->doctorId;
        $appoinment->scheduleId = $request->scheduleId;
        $appoinment->categoryId = $request->categoryId;
        $appoinment->appointmentDate = $request->appointmentDate;
        $appoinment->message = $request->message;
        $appoinment->patientId = 1;
        $appoinment->save();

        return redirect()->back();
    }
    public function createContact()
    {
        $city = City::all();
        return view('visitor.Contact', compact('city'));
    }
    public function storeContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:contacts',
            'subject' => 'required|min:5',
            'message' => 'required|min:5',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('message', ' Thankyou, Message sent successfully');
    }
    public function viewContact(Request $request)
    {
        $city = City::all();
        $contact = Contact::all();
        $name = $request->name;
        $status = $request->status;

        if (isset($name) && isset($status)) {
            $contact = Contact::orderBy('name', 'ASC')
                ->where('name', 'like', "%$name%")
                ->where('status', '=', $status)
                ->paginate(10);
            $count = count($contact);
        } else if (isset($name) && !isset($status)) {
            $contact = Contact::orderBy('name', 'ASC')
                ->where('name', 'like', "%$name%")
                ->paginate(10);
            $count = count($contact);
        } else if (!isset($name) && isset($status)) {
            $contact = Contact::orderBy('name', 'ASC')
                ->where('status', '=', $status)
                ->paginate(10);
            $count = count($contact);
        } else {
            $contact = Contact::orderBy('name', 'ASC')
                ->paginate(20);
            $count = count($contact);
        }
        return view('visitor.viewContact', compact('contact', 'city', 'count'));
    }
    public function blogview(){
        $city = City::all();
        $blog = Blog::with('doctor')->get();
        return view('visitor.BlogView', compact('city', 'blog'));
    }
  public function blogViewSingle($id){
    $city = City::all();
    $blog = Blog::find($id);
    return view('visitor.blogViewSingle', compact('blog', 'city'));
  }  
}
