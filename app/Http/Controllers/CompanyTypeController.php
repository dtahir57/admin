<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyType;
use App\Http\Requests\CompanyTypeRequest;
use Session;

class CompanyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_types = CompanyType::all();
        return view('company_type.index', compact('company_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyTypeRequest $request)
    {
        $company_type = new CompanyType;
        $company_type->name = $request->name;
        $company_type->save();
        if ($company_type) {
            Session::flash('created', 'Company Type Created Successfully!');
            return redirect()->route('company_type.index');
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
        $company_type = CompanyType::find($id);
        return view('company_type.edit', compact('company_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyTypeRequest $request, $id)
    {
        $company_type = CompanyType::find($id);
        $company_type->name = $request->name;
        $company_type->update();
        if ($company_type) {
            Session::flash('updated', 'Company Type Updated Successfully!');
            return redirect()->route('company_type.index');
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
        $company_type = CompanyType::findOrFail($id);
        $company_type->delete();
        if ($company_type) {
            Session::flash('deleted', 'Company Type Deleted Successfully!');
            return redirect()->route('company_type.index');
        }
    }
}
