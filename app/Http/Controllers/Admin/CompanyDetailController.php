<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyDetailUpdateRequest;
use App\Models\CompanyDetail;
use Illuminate\Http\Request;

class CompanyDetailController extends Controller
{


    public function detailEdit()
    {
        $this->setPageTitle('Company details', 'Please update all the required field');
        return view('cms.settings.company_details', [
            'contact_detail' => CompanyDetail::firstOrFail(),
        ]);
    }

    public function detailStore(CompanyDetailUpdateRequest $request)
    {
         $detail = CompanyDetail::firstOrFail();

        return $detail->update($request->validated())
            ? $this->responseRedirect('cms.detail.create', 'Company Details updated successfully.', 'success')
            : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
    }
}
