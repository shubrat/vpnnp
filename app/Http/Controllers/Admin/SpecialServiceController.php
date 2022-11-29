<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialServiceStoreRequest;
use App\Http\Requests\SpecialServiceUpdateRequest;
use App\Models\SpecialService;
use App\Services\ImageUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

use Illuminate\View\View;

use function collect;

use function view;

class SpecialServiceController extends Controller
{

    public function __construct(
        private ImageUploadService $imageUploadService
    ) {
    }
    // Index
    public function index()
    {
        $this->setPageTitle('SpecialService', 'List of all services');

        return request()->ajax()
        ? $this->datatable()
        : view('cms.specialServices.index');

    }
    // Create
    public function create()
    {
        $this->setPageTitle('SpecialService', 'Fill in the required fields to create a new Special Service.');

        return view('cms.specialServices.create');
    }

    
        // Store
        public function store(SpecialServiceStoreRequest $request)
    {



        try {
            // dd($request);

            $specialService = SpecialService::create($request->validated());
            if ($specialService) {
                $this->imageUploadService->uploadImageFromRequestUrl($request, $specialService);
            }
            return $specialService
                ? $this->responseRedirect('cms.specialServices.index', 'Special Service Successfully Created.', 'success')
                : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }

    }
      
   // Edit
   public function edit(SpecialService $specialService): View
   {
       $this->setPageTitle('SpecialServices', 'Please update the required fields');

       return view('cms.specialServices.edit', [
           'specialService' => $specialService,
       ]);
   }


   public function update(SpecialServiceUpdateRequest $request, SpecialService $specialService)
   {
       try {
           $status = $specialService->update($request->validated());
           $this->imageUploadService->uploadImageFromRequestUrl($request, $specialService);

           return $status
               ? $this->responseRedirect('cms.specialServices.index', 'Special Service created Sucessfully', 'success')
               : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
       } catch (\Throwable $exception) {
           return $exception->getMessage();
       }
   }




    public function delete(SpecialService $specialService)
    {
        return $specialService->delete()
        ? response()->json(['success' => 'Special Service Successfully Deleted.'])
        : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }

    protected function datatable()
    {
        
        $data = SpecialService::latest()->get();
        return DataTables::of($data)
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                        <a
                        href="' . route('cms.specialServices.edit', $data) . '"
                            type="button"
                            class="btn btn-success waves-effect waves-light btn-md"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit"
                            data-bs-original-title="Edit"
                        ><i class="bx bx-pencil font-size-16 align-middle"></i></a>
                        <a
                            href=""
                            id="delete-btn"
                            data-id="'. $data->slug .'"
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
              ->editColumn('image', function ($data) {
                return ' <img src="'. $data->getFirstOrDefaultMediaUrl("image", 'thumb') .'" style="width: 80px; height:80px;">
                    ';
            })

            ->editColumn('title', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->title . '"
                                data-bs-original-title="' . $data->title . '"
                            >' . Str::limit($data->title, 17) . '</p>

                        </div>
                    ';
            })

       


            ->editColumn('description', function ($data) {
                return '

                        <div class="d-flex flex-column">
                            <h5
                            class="text-body font-size-12 mb-1 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->description . '"
                                data-bs-original-title="' . $data->description . '"
                                >'. Str::limit($data->description, 60) .' </h5>
                            
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

           
            
            ->addIndexColumn()
            ->rawColumns(['actions', 'title','image', 'description','status'])
            ->make(true);
    }



    // toggle status
    public function toggleStatus(Request $request): JsonResponse
    {
        $service = SpecialService::findOrFail($request['id']);

        $service->status = !$service->status;

        return $service->update()
            ? response()->json(['message' => 'Special Service Status Updated Successfully.', 'Special Service' => $service, 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating service status.', 'status' => 'error']);
    }





}

