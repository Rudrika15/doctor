<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Str;
class AdminCityController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:city-list|city-create|city-edit|city-delete', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:city-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:city-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:city-delete', ['only' => ['delete']]);
    // }

    public function index(Request $req)
    {
        $cityName = $req->cityName;
        $status = $req->status;

        if (isset($cityName) && isset($status)) {
            $city = City::orderBy('name', 'ASC')
                ->where('name', 'like', "%$cityName%")
                ->where('status', '=', $status)

                ->paginate(5);
            $count = count($city);
        } else if (!isset($cityName) && isset($status)) {
            $city = City::orderBy('name', 'ASC')
                ->where('status', '=', $status)

                ->paginate(5);
            $count = count($city);
        } else if (isset($cityName) && !isset($status)) {
            $city = City::orderBy('name', 'ASC')
                ->where('name', 'like', "%$cityName%")

                ->paginate(5);
            $count = count($city);
        } else {
            $city = City::orderBy('name', 'ASC')
                ->with('state')
                ->paginate(5);
            $count = count($city);
        }

        return view('admin.city.index', compact('city', 'count'));
    }

    public function create()
    {
        $state = State::all();
        return view('admin.city.create', compact('state'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'stateId' => 'required'
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->slug =$this->generateSlug($request->name);
        $city->stateId = $request->stateId;

        if ($city->save()) {
            return redirect('admin/city-index')->with('success', 'City Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($slug)
    {
        $state = State::all();
        $city = City::where('slug','=',$slug)->first();
        return view('admin.city.edit', compact('city', 'state'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $slug = $request->slug;
        $city = City::where('slug','=',$slug)->first();
        $city->name = $request->name;
        $city->slug =$this->generateSlug($request->name);
        $city->status = "Active";

        if ($city->save()) {
            return redirect('admin/city-index')->with('success', 'City Updated successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function delete($id)
    {
        $city = City::find($id);
        $city->status = "Delete";
        if ($city->save()) {
            return redirect('admin/city-index')->with('success', 'City Deleted successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    private function generateSlug($name)
    {
        return Str::slug($name);
    }
}
