<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectType;
use Session;
use App\Http\Requests\ProjectTypeRequest;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_types = ProjectType::latest()->get();
        return view('project_type.index', compact('project_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectTypeRequest $request)
    {
        $project_type = new ProjectType;
        $project_type->project_type = $request->project_type;
        $project_type->save();
        if ($project_type) {
            Session::flash('created', 'Project Type created Successfully');
            return redirect()->route('project_type.index');
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
        $project_type = ProjectType::findOrFail($id);
        return view('project_type.edit', compact('project_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectTypeRequest $request, $id)
    {
        $project_type = ProjectType::findOrFail($id);
        $project_type->project_type = $request->project_type;
        $project_type->update();
        if ($project_type) {
            Session::flash('updated', 'Project Type updated Successfully');
            return redirect()->route('project_type.index');
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
        $project_type = ProjectType::findOrFail($id);
        $project_type->delete();
        if ($project_type) {
            Session::flash('deleted', 'Project Type Deleted Successfully');
            return redirect()->route('project_type.index');
        }
    }
}
