<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectUnit;
use App\Http\Requests\ProjectUnitRequest;
use Session;
use App\City;
use App\ProjectType;
use Auth;

class ProjectUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            $project_units = ProjectUnit::latest()->get();
            return view('project_unit.index', compact('project_units'));   
        } else {
            $project_units = ProjectUnit::where('user_id', Auth::user()->id)->get();
            return view('project_unit.index', compact('project_units'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $cities = City::all();
        $project_types = ProjectType::all();
        return view('project_unit.create', compact('projects', 'cities', 'project_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectUnitRequest $request)
    {
        $city = explode('|', $request->city);
        $type = explode('|', $request->type);
        $project_unit = new ProjectUnit;
        $project_unit->project_id = $request->project_name;
        $project_unit->user_id = Auth::user()->id;
        $project_unit->name = $request->name;
        $project_unit->city_id = $city[0];
        $project_unit->project_type_id = $type[0];
        $project_unit->rate_card = $request->rate_card;
        $project_unit->cost = $request->cost;
        $project_unit->down_payment = $request->down_payment;
        $project_unit->installment = $request->installment;
        $project_unit->year_of_installment = $request->year_of_installment;
        $project_unit->area = $request->area;
        $project_unit->city = $city[1];
        $project_unit->type = $type[1];
        $project_unit->installment_monthly = $request->installment_monthly;
        $project_unit->installment_quarter = $request->installment_quarter;
        $project_unit->half_year = $request->half_year;
        $project_unit->installment_annually = $request->installment_annually;
        $project_unit->offer_discount = $request->offer_discount;
        $project_unit->description = $request->description;
        $project_unit->save();
        if ($project_unit) {
            Session::flash('created', 'New project Unit has been Added!');
            return redirect()->route('project_unit.index');
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
        $project_unit = ProjectUnit::findOrFail($id);
        return view('project_unit.show', compact('project_unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_unit = ProjectUnit::find($id);
        $projects = Project::all();
        $cities = City::all();
        $project_types = ProjectType::all();
        return view('project_unit.edit', compact('projects', 'project_unit', 'cities', 'project_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUnitRequest $request, $id)
    {
        $city = explode('|', $request->city);
        $type = explode('|', $request->type);
        $project_unit = ProjectUnit::find($id);
        $project_unit->project_id = $request->project_name;
        $project_unit->name = $request->name;
        $project_unit->user_id = Auth::user()->id;
        $project_unit->city_id = $city[0];
        $project_unit->project_type_id = $type[0];
        $project_unit->rate_card = $request->rate_card;
        $project_unit->cost = $request->cost;
        $project_unit->down_payment = $request->down_payment;
        $project_unit->installment = $request->installment;
        $project_unit->year_of_installment = $request->year_of_installment;
        $project_unit->area = $request->area;
        $project_unit->city = $city[1];
        $project_unit->type = $type[1];
        $project_unit->installment_monthly = $request->installment_monthly;
        $project_unit->installment_quarter = $request->installment_quarter;
        $project_unit->half_year = $request->half_year;
        $project_unit->flexible_plan = (array_has($request, 'flexible_plan'))?1:0;
        $project_unit->installment_annually = $request->installment_annually;
        $project_unit->offer_discount = $request->offer_discount;
        $project_unit->description = $request->description;
        $project_unit->update();
        if ($project_unit) {
            Session::flash('updated', 'Project Unit has been updated!');
            return redirect()->route('project_unit.index');
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
        $project_unit = ProjectUnit::find($id);
        $project_unit->delete();
        if ($project_unit) {
            Session::flash('deleted', 'Project Unit has been deleted');
            return redirect()->route('project_unit.index');
        }
    }
}
