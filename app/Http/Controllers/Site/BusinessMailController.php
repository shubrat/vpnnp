<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessMailStoreRequest;
use App\Models\BusinessMail;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class BusinessMailController extends Controller
{
    

    public function createBusiness()
    {
        $this->setPageTitle('Business', '');

        return view('cms.business.create',[
        'serviceTypes' => Service::select(['id', 'title'])->whereStatus(true)->get(),
        ]);

    }

    public function businessList()
    {
        $this->setPageTitle('Business', '');
        return request()->ajax()
            ? $this->datatable()
            : view('cms.business.businessList');
    }

    public function sendMail(BusinessMailStoreRequest $request, BusinessMail $business)
    {

        try{

            // $test = $business->services->title;
            
        //    dd($request);
        $data = $request->validated();
        $serviceTitle = $request->title;
        $business->create($data);        
        $user['to'] = 'shubrat.stylustechnology@gmail.com';


        Mail::send('cms.business.emailMessage', $data
       
        , function ($message) use ($user, $data ) {
            $message->from($data['email']);
            $message->to($user['to'])
                ->subject($data['subject']);
               
           });

           return redirect()->route('site.')->with('success','Thank you for contacting us , We promise to respond to you as quickly as we can.!');

        //    return redirect()->route('site.page.business')->with('success','Thank you for contacting us , We promise to respond to you as quickly as we can.!');
          }  catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    

    }

    public function businessdelete(BusinessMail $businessMail)

    {
        return $businessMail->delete()
            ? response()->json(['success' => 'Selected Business Request Successfully Deleted.'])
            : response()->json(['error' => 'There was some issue with the server. Please try again.']);
    }

    protected function datatable()
    {
        $businessMail = BusinessMail::latest()->get();
        return DataTables::of($businessMail)
            ->addColumn('actions', function ($data) {
                return '
                <div class="d-flex flex-wrap gap-2">
               <a
                href="#"
                    id="delete-btn"
                    data-id="' . $data->id . '"
                    type="button"
                    class="btn btn-danger waves-effect waves-light btn-md"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Delete"
                    data-bs-original-title="Delete"
                ><i class="bx bx-trash font-size-16 align-middle"></i></a>
            </div>
                ';
            })


            ->editColumn('name', function ($data) {
                return '
                        <div class="d-flex flex-column">
                        <p
                        class="text-body font-size-14 "
                        data-bs-original-title="' . $data->name . '"
                            >' . Str::limit($data->name, 22) .  '</p>
                        </div>
                    ';
            })

            ->editColumn('email', function ($data) {
                return '
                <div class="d-flex flex-column">
                <h4
                    class="text-body font-size-13 mb-1"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="' . $data->email . '"
                    
                >' . Str::limit($data->email, 42) . '</h4>
            </div>
                ';
            })

            ->editColumn('phone', function ($data) {
                return '
                <span>' . $data->phone .
                    '</span>';
            })

            ->editColumn('subject', function ($data) {
                return '
                        <div class="d-flex flex-column">
                        <p
                        class="text-body font-size-14 "
                        data-bs-original-title="' . $data->subject . '"
                            >' . Str::limit($data->subject, 42) . '</p>
                        </div>
                    ';
            })

            ->editColumn('usermessage', function ($data) {
                return '
                 <div class="d-flex flex-column">
                            <h5
                                class="text-body font-size-13 mb-1"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->usermessage . '"
                                
                            >' . Str::limit($data->usermessage, 42) . '</h5>
                        </div>
            ';
            })

            ->editColumn('status', function ($data) {
                $checked = $data->status == 1 ? 'checked' : '';
                return '
                    <label for="status-' . $data->id . '"></label>
                        <input
                        type="checkbox"
                        id="status-' . $data->id . '"
                        data-id="' . $data->id . '"
                                               name="status"
                        class="js-switch"
                        ' . $checked . '
                        autocomplete="off"
                        onchange="toggleIsStatus(' . $data->id . ')"
                    />';
            })->addColumn('status_text', function($data){
                $text = ($data->status == 0) ? 'Not-Responded' : 'Responded';
                if($text=='Not-Responded'){
                return '<span id="status-' . $data->id . '"
                class="badge rounded-pill font-size-12 bg-soft-danger text-primary">'.
                $text
                .'</span>';
                }
                else
                {
                    return '<span id="status-' . $data->id . '"
                    class="badge rounded-pill font-size-12 bg-soft-success text-primary">'.
                    $text
                    .'</span>'; 
                }


            })

            ->addIndexColumn()
            ->rawColumns(['actions', 'name', 'email', 'phone', 'subject', 'usermessage','status','status_text'])
            ->make(true);
    }


    //  toggle status
    public function toggleStatus(Request $request): JsonResponse
    {
        $businessMail = BusinessMail::findOrFail($request['id']);
        $businessMail->status = !$businessMail->status;
            return $businessMail->update()
            ? response()->json(['message' => 'Business Status Updated Successfully.',  'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating business status.', 'status' => 'error']);
    }
}
