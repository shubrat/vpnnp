<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaUpdateRequest;
use App\Models\LocationMap;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    // adding Map Location
    public function locationMap()
    {
        $this->setPageTitle('Location' ,'Add Map Location');
        return view('cms.settings.locationMap',[
            'location'=> LocationMap::firstOrFail(),
        ]);
    }


    public function locationUpdate(Request $request)
    {
        
        $location = LocationMap::firstOrFail();
        $validatedData = $request->validate([
            'frame' =>'required',
        ]);
        // dd($validatedData);

        return $location->update($validatedData )
        ? $this->responseRedirect('cms.location.create', 'Terms and Condition Updated Sucessfully', 'success')
            : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
    }








    // for Social Media platform

     // Edit Social Media
     public function editSocialMedia()
     {
         $social = SocialMedia::first();
         $this->setPagetitle('Social Setting', 'Please Fill the required field');
         return view('cms.socials.socia_media', compact('social'));
     }
 
     // Update Social Media
     public function updateSocialMedia(SocialMediaUpdateRequest $socialMediaUpdateRequest)
     {
         $social = SocialMedia::firstOrFail();
         $social->update(
             $socialMediaUpdateRequest->validated()
         );
         return $social
             ? $this->responseRedirect('cms.social.create', 'Social Media Updated Sucessfully', 'success')
             : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
     }






}
