<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\CompanyType;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Input;
use Session;
use File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_types = CompanyType::all();
        return view('company.create', compact('company_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        if (Input::hasFile('logo')) {
            $company = Company::create([
                'company_type_id' => $request->company_type,
                'name' => $request->name,
                'tel' => $request->tel,
                'email' => $request->email,
                'logo' => $request->logo->store('public/companies')
            ]);
        }
        if ($company) {
            Session::flash('created', 'Company Created Sucessfully');
            return redirect()->route('company.index');
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
        $company = Company::find($id);
        $company_types = CompanyType::all();
        return view('company.edit', compact('company', 'company_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->company_type_id = $request->company_type;
        $company->name = $request->name;
        $company->tel = $request->tel;
        $company->email = $request->email;
        $company->is_active = ($request->is_active)?1:0;
        $company->update();
        if ($company) {
            Session::flash('updated', 'Company Updated Successfully');
            return redirect()->route('company.index');
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
        $company = Company::findOrFail($id);
        File::delete($company->logo);
        $company->delete();
        if ($company) {
            Session::flash('deleted', 'Company Deleted Successfully');
            return redirect()->route('company.index');
        }
    }
}
