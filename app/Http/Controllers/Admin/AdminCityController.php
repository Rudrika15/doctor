<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class AdminCityController extends Controller
{
    public function index(Request $req)
    {
        $cityName = $req->cityName;
        $status = $req->status;

        if(isset($cityName) && isset($status))
        {
            $city = City::where('name','=',$cityName)
            ->where('status','=',$status)
            ->paginate(5);
        }
        else if(!isset($cityName)&&isset($status))
            {
                $city = City::where('status','=',$status)
                ->paginate(5);
            }
        else if(isset($cityName)&&!isset($status))
            {
                $city = City::where('name','=',$cityName)
                ->paginate(5);
            }
        else{
            $city = City::paginate(5);
        }
        return view('admin.city.index', compact('city'));
    }

    public function create()
    {
        return view('admin.city.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $city = new City();
        $city->name = $request->name;

        if ($city->save()) {
            return redirect('admin/city-index')->with('success', 'City Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

    public function edit($id)
    {
        $city = City::find($id);
        return view('admin.city.edit', compact('city'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $id = $request->id;
        $city = City::find($id);
        $city->name = $request->name;
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
}
