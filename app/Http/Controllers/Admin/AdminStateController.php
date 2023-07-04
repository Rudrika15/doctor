<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class AdminStateController extends Controller
{
    //
    public function index(Request $req){
        $stateName = $req->stateName;
        $status = $req->status;

        if (isset($stateName) && isset($status)) {
            $state = State::orderBy('name', 'ASC')
                ->where('name', 'like', "%$stateName%")
                ->where('status', '=', $status)
                ->paginate(5);
            $count = count($state);
        } else if (!isset($stateName) && isset($status)) {
            $state = State::orderBy('name', 'ASC')
                ->where('status', '=', $status)
                ->paginate(5);
            $count = count($state);
        } else if (isset($stateName) && !isset($status)) {
            $state = State::orderBy('name', 'ASC')
                ->where('name', 'like', "%$stateName%")
                ->paginate(5);
            $count = count($state);
        } else {
            $state = State::orderBy('name', 'ASC')
                ->paginate(5);
            $count = count($state);
        }
        return view('admin.state.index',compact('state','count'));
    }

    public function create()
    {
        return view('admin.state.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $state = new State();
        $state->name = $request->name;
        $state->status = "Active";
    

        if ($state->save()) {
            return redirect('admin/state-index')->with('success', 'state Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function edit($id)
    {
        $state=State::find($id);
        return view('admin.state.edit',compact('state'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $id=$request->id;
        $state =State::find($id);
        $state->name = $request->name;
        $state->status = "Active";
    

        if ($state->save()) {
            return redirect('admin/state-index')->with('success', 'state Update successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function delete($id)
    {
        $state = State::find($id);
        $state->status = "Delete";
        if ($state->save()) {
            return redirect('admin/state-index')->with('success', 'state$state Deleted successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }

}
