<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerStoreRequest;
use App\Http\Requests\PartnerUpdateRequest;
use App\Http\Requests\PertnerStoreRequest;
use App\Models\Partner;
use App\Services\ImageUploadService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class PartnerController extends Controller
{

    private $imageService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageService = $imageUploadService;
    }

    public function index()
    {


        $this->setPageTitle('Partner', 'List of all Partners');

        return request()->ajax()
            ? $this->datatable()
            : view('cms.partners.index');
    }

    public function create()
    {
        $this->setPageTitle('Partners', 'Fill in the required fields to create a new Partners.');

        return view('cms.partners.create');
    }
    public function store(PartnerStoreRequest $request): RedirectResponse
    {
        $partner = Partner::create($request->validated());
        $this->imageService->uploadImageFromRequestUrl($request, $partner);

        return $partner
            ? $this->responseRedirect('cms.partners.index', 'Partner added successfully.', 'success')
            : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
    }

    public function edit(Partner $partner): View
    {
        $this->setPageTitle('Partners', 'Please update the required fields');

        return view('cms.partners.edit', [
            'partner' => $partner,
        ]);
    }


    public function update(PartnerUpdateRequest $request, Partner $partner): RedirectResponse
    {
        $status = $partner->update($request->validated());
        $this->imageService->uploadImageFromRequestUrl($request, $partner);

        return $status
            ? $this->responseRedirect('cms.partners.index', 'Partner added successfully.', 'success')
            : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
    }



    // delete function
    public function delete(Partner $partner)
    {
        return $partner->delete()
        ? response()->json(['success' => 'Partner Successfully Deleted.'])
        : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }


    protected function datatable()
    {
        $data = Partner::latest()->get();
        return DataTables::of($data)
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                        <a
                        href="' . route('cms.partners.edit', $data) . '"
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


            ->editColumn('image', function ($data) {
                return ' <img src="'. $data->getFirstOrDefaultMediaUrl("image", 'thumb-sm').'" style="width: 110px; height:80px;">
                    ';
            })

            ->editColumn('url', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->url . '"
                                data-bs-original-title="' . $data->url . '"
                            >' . Str::limit($data->url, 17) . '</p>
                            
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
            ->rawColumns(['actions', 'url','name', 'image','status'])
            ->make(true);
    }


    
    
//    toggle status
public function toggleStatus(Request $request): JsonResponse
{
    $partner = Partner::findOrFail($request['id']);

    $partner->status = !$partner->status;

    return $partner->update()
        ? response()->json(['message' => 'Partner Status Updated Successfully.', 'partner' => $partner, 'status' => 'success'])
        : response()->json(['message' => 'Error occurred while updating partner status.', 'status' => 'error']);
}


}
