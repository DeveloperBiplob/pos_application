<?php

namespace App\Http\Controllers;

use App\Models\Group;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;


class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groups = Group::all();
        return view()->exists('groups.index') ? view('groups.index', compact('groups')) : abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view()->exists('groups.create') ? view('groups.create') : abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required']
        ]);
        $data = $request->only('title');
        $result = Group::create($data);

        if($result){
            $this->setNotification('Data Save Successfully!', 'success');
            return redirect()->route('group.index');
        }else{
            return back();
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
        $group = Group::findOrFail($id);
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
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
        $group = Group::findOrFail($id);
        // $data = $request->title;
        // $result = $group->update($data);

        $result = $group->update([
            'title' => $request->title
        ]);

        if($result){
            $this->setNotification('Data Update Successfully!', 'success');
            return redirect()->route('group.index');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        if($group->delete()){
            $this->setNotification('Data Delete Successfully!', 'success');
            return redirect()->route('group.index');
        }else{
            return back();
        }
    }
}
