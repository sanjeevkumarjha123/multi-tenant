<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Auth::user()->companies;
        $activeCompanyId = Auth::user()->active_company_id;
        // \Log::info('companies', ['companies' => $companies]);
        return view('companies.index', compact('companies','activeCompanyId'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'industry' => 'required|string',
        ]);

        Auth::user()->companies()->create($validated);

        return redirect()->route('companies.index')->with('success', 'Company created!');
    }

    public function edit(Company $company)
    {
        $this->authorizeCompany($company);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $this->authorizeCompany($company);

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'industry' => 'required|string',
        ]);

        $company->update($validate);
        return redirect()->route('companies.index')->with('success', 'Company updated!');
    }

    public function destroy(Company $company)
    {
        $this->authorizeCompany($company);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted!');
    }

    public function switch(Request $request, Company $company)
    {
        $this->authorizeCompany($company);
        Auth::user()->update(['active_company_id' => $company->id]);
        return redirect()->back()->with('success', 'Switched active company!');
    }

    private function authorizeCompany($company)
    {
        if ($company->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
    }
}
