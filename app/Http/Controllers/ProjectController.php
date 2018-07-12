<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Company;
use App\Http\Requests\ProjectRequest;
use Session;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
        $projects = Project::latest()->get();
        return view('project.index', compact('projects')); 
        } else {
            $projects = Project::where('user_id', Auth::user()->id)->get();
            return view('project.index', compact('projects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('project.create', compact('companies'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = new Project;
        $project->company_id = $request->company_name;
        $project->user_id = Auth::user()->id;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->lat = $request->lat;
        $project->lng = $request->lng;
        $project->save();
        if ($project) {
            Session::flash('created', 'New Project Added Successfully!');
            return redirect()->route('project.index');
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
        $project = Project::find($id);
        $companies = Company::all();
        return view('project.edit', compact('project', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = Project::find($id);
        $project->company_id = $request->company_name;
        $project->user_id = Auth::user()->id;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->lat = $request->lat;
        $project->lng = $request->lng;
        $project->update();
        if ($project) {
            Session::flash('updated', 'Project Updated Successfully!');
            return redirect()->route('project.index');
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
        $project = Project::find($id);
        $project->delete();
        if ($project) {
            Session::flash('deleted', 'Project Deleted Successfully!');
            return redirect()->route('project.index');
        }
    }
}
