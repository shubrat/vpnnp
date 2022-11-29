<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberStoreRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Models\Member;
use App\Services\ImageUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function __construct(
        private ImageUploadService $imageUploadService
    ) {
    }
    public function index()
    {


        $this->setPageTitle('Member', 'List of all Members');

        return request()->ajax()
            ? $this->datatable()
            : view('cms.members.index');
    }

    public function create()
    {
        $this->setPageTitle('Member', 'Fill in the required fields to create a new Members.');

        return view('cms.members.create');
    }

    public function store(MemberStoreRequest $request): RedirectResponse
    {
        $member = Member::create($request->validated());
        $this->imageUploadService->uploadImageFromRequestUrl($request, $member);

        return $member
            ? $this->responseRedirect('cms.members.index', 'Member added successfully.', 'success')
            : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
    }

    public function edit(Member $member): View
    {
        $this->setPageTitle('Member', 'Please update the required fields');

        return view('cms.members.edit', [
            'member' => $member,
        ]);
    }


    public function update(MemberUpdateRequest $request, Member $member): RedirectResponse
    {
        $status = $member->update($request->validated());
        $this->imageUploadService->uploadImageFromRequestUrl($request, $member);

        return $status
            ? $this->responseRedirect('cms.members.index', 'Member updated successfully.', 'success')
            : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
    }



    // delete function
    public function delete(Member $member)
    {
        return $member->delete()
        ? response()->json(['success' => 'Member Successfully Deleted.'])
        : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }
    protected function datatable()
    {
        $data = Member::latest()->get();
        return DataTables::of($data)
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                        <a
                        href="' . route('cms.members.edit', $data) . '"
                            type="button"
                            class="btn btn-success waves-effect waves-light btn-md"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit"
                            data-bs-original-title="Edit"
                        ><i class="bx bx-pencil font-size-16 align-middle"></i></a>
                        <a
                            href="#"
                            id="delete-btn"
                            data-id="'. $data->id.'"
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
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->name . '"
                                data-bs-original-title="' . $data->name . '"
                            >' . Str::limit($data->name, 17) . '</p>
                            
                        </div>
                    ';
            })


            ->editColumn('about', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <span
                            class="text-body font-size-12 mb-1"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->about . '"
                                data-bs-original-title="{!!' . $data->about . '}}"
                            >' . Str::limit($data->about, 67) . '</span>
                            
                        </div>
                    ';
            })


            ->editColumn('image', function ($data) {
                return ' <img src="'. $data->getFirstOrDefaultMediaUrl("image", 'thumb') .'" style="width: 80px; height:80px;">
                    ';
            })

            // ->editColumn('url', function ($data) {
            //     return '
            //             <div class="d-flex flex-column">
            //                 <p
            //                     class="text-body font-size-14 "
            //                     data-bs-toggle="tooltip"
            //                     data-bs-placement="top"
            //                     title="' . $data->url . '"
            //                     data-bs-original-title="' . $data->url . '"
            //                 >' . Str::limit($data->url, 17) . '</p>
                            
            //             </div>
            //         ';
            // })


            ->editColumn('twitter', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->twitter . '"
                                data-bs-original-title="' . $data->twitter . '"
                            >' . Str::limit($data->twitter, 17) . '</p>
                            
                        </div>
                    ';
            })

            ->editColumn('facebook', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->facebook . '"
                                data-bs-original-title="' . $data->facebook . '"
                            >' . Str::limit($data->facebook, 17) . '</p>
                            
                        </div>
                    ';
            })

            ->editColumn('instagram', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->instagram . '"
                                data-bs-original-title="' . $data->instagram . '"
                            >' . Str::limit($data->instagram, 17) . '</p>
                            
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
            })
      
   
            // ,'image'
            ->addIndexColumn()
            ->rawColumns(['actions','name', 'about','image','twitter', 'facebook', 'instagram','status'])
            ->make(true);
    }


    
    
//    toggle status
public function toggleStatus(Request $request): JsonResponse
{
    $member = Member::findOrFail($request['id']);

    $member->status = !$member->status;

    return $member->update()
        ? response()->json(['message' => 'Member Status Updated Successfully.', 'member' => $member, 'status' => 'success'])
        : response()->json(['message' => 'Error occurred while updating member status.', 'status' => 'error']);
}


}

