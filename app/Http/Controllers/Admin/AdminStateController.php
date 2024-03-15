<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use Illuminate\Support\Str;
class AdminStateController extends Controller
{
    //
    public function index(Request $req)
    {
        $stateName = $req->stateName;
        $status = $req->status;

        if (isset($stateName) && isset($status)) {
            $state = State::orderBy('stateName', 'ASC')
                ->where('stateName', 'like', "%$stateName%")
                ->where('status', '=', $status)
                ->paginate(10);
            $count = count($state);
        } else if (!isset($stateName) && isset($status)) {
            $state = State::orderBy('stateName', 'ASC')
                ->where('status', '=', $status)
                ->paginate(10);
            $count = count($state);
        } else if (isset($stateName) && !isset($status)) {
            $state = State::orderBy('stateName', 'ASC')
                ->where('stateName', 'like', "%$stateName%")
                ->paginate(10);
            $count = count($state);
        } else {
            $state = State::orderBy('stateName', 'ASC')
                ->paginate(10);
            $count = count($state);
        }
        return view('admin.state.index', compact('state', 'count'));
    }

    public function create()
    {
        return view('admin.state.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'stateName' => 'required',
        ]);

        $state = new State();
        $state->stateName = $request->stateName;
        $state->slug = $this->generateSlug($request->stateName);
        $state->status = "Active";


        if ($state->save()) {
            return redirect('admin/state-index')->with('success', 'state Added successfully!');
        } else {
            return back()->with('error', 'You have no permission for this page!');
        }
    }
    public function edit($slug)
    {
        $state = State::where('slug','=',$slug)->first();
        return view('admin.state.edit', compact('state'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'stateName' => 'required',
        ]);

        $slug = $request->slug;
        $state = State::where('slug','=',$slug)->first();
        $state->stateName = $request->stateName;
        $state->slug = $this->generateSlug($request->stateName);
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
    private function generateSlug($stateName){
        return Str::slug($stateName);
    }
}
