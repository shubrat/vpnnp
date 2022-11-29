<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsUpdateRequest;
use App\Http\Requests\PrivacyAndPolicyUpdateRequest;
use App\Http\Requests\TermAndConditionUpdateRequest;
use App\Models\AboutUs;
use App\Models\PrivacyAndPolicy;
use App\Models\TermsAndCondition;
use Database\Seeders\TermAndConditionSeeder;
use Illuminate\Http\Request;

class PagesController extends Controller
{
// edit and update for about

    public function editAbout()
    {
        $about = AboutUs::first();
        $this->setPageTitle('Update', 'Please Fill the required field');
        return view('cms.pages.aboutUs', compact('about'));
    }

    public function updateAbout(AboutUsUpdateRequest $request)
    {
        $about = AboutUs::firstOrFail();
        $about->update(
            $request->validated()
        );

        return $about
        ? $this->responseRedirect('cms.edit.about', 'Google About Us  Updated Sucessfully', 'success')
        : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
    }

// closed


    // Edit  Privacy&Policy and update function
    public function editPrivacyPolicy()
    {
        $this->setPageTitle('Update', 'Fill in the required fields to update a new Privacy&Policy');
        return view('cms.pages.privacy_and_policy',[
            'policy' => PrivacyAndPolicy::first(),


        ]);
    }

    
    public function updatePrivacyPolicy(Request $request)
    {
        $policy = PrivacyAndPolicy::firstOrFail();
       
             $validatedData = $request->validate([
                'description' => 'required',
            ]);
    
        return $policy->update($validatedData)
        ? $this->responseRedirect('cms.privacy.edit', 'Privacy and pollicy Updated Sucessfully', 'success')
            : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
        
    }


    // close


    // Edit Term And Condition
    public function editTermAndCondition()
    {
        $term = TermsAndCondition::firstOrFail();
        $this->setPageTitle('Update', 'Fill in the required fields to create a new Term&Condition');
        return view('cms.pages.terms_and_condition', compact('term'));
    }

    // Update TErm And Condition
    public function updateTermAndCondition(Request $request)
    {
          $term = TermsAndCondition::firstOrFail();
             $validatedData = $request->validate([
                'description' => 'required',
            ]);
    
        return $term->update($validatedData)
        ? $this->responseRedirect('cms.term.edit', 'Terms and Condition Updated Sucessfully', 'success')
            : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
    }

}
