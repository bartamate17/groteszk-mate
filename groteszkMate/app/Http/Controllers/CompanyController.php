<?php

namespace App\Http\Controllers;

use App\Models\companyModel;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCompanyReminderMail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = companyModel::orderBy('id', 'desc')->paginate(10);

        return view('language.eng.company', [
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language.eng.createCompany');
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
            'name' => 'required',
            'file' => 'dimensions:min_width=100,min_height=100'
        ]);

        //if pictures exist
        if (isset($request->file)) {
            $newImageName = strtolower($request->name . '.' . $request->file->extension());
            $copiedImageName = str_replace(' ', '', $newImageName);

            $test = $request->file->move(public_path('logo'), $copiedImageName);

            $company = new companyModel;
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->logo = $copiedImageName;
            $company->url = $request->input('url');
            $company->save();

            //if pictures not exist
        } else {
            $company = new companyModel;
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->logo = "";
            $company->url = $request->input('url');
            $company->save();
        }
        
        Mail::to('info@tableadmin.com')->send(New NewCompanyReminderMail());
        return redirect('/company');
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
        $company = companyModel::find($id);
        return view('language.eng.editCompany', ['company' => $company]);
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
        $request->validate([
            'name' => 'required',
            'file' => 'dimensions:min_width=100,min_height=100'
        ]);

        if (isset($request->file)) {

            $newImageName = strtolower($request->name . '.' . $request->file->extension());
            $copiedImageName = str_replace(' ', '', $newImageName);

            $test = $request->file->move(public_path('logo'), $copiedImageName);

            $company = companyModel::where('id', $id)
                ->update([
                    "name" => $request->input('name'),
                    "email" => $request->input('email'),
                    "logo" => $copiedImageName,
                    "url" => $request->input('url')
                ]);
        } else {

            $company = companyModel::where('id', $id)
                ->update([
                    "name" => $request->input('name'),
                    "email" => $request->input('email'),
                    "url" => $request->input('url')
                ]);
        }

        return redirect('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = companyModel::where('id', $id)->delete();

        return redirect('/company');
    }
}
