<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessMailStoreRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'distance'=> 'required',
            'deliveryCity'=> 'required',
            'weight'=> 'required',
            'service_id' => 'required',
            'subject' => 'required',
            'usermessage' => 'required',
            'status' => '0',
            'address'=>'required',
        ];
    }
}
