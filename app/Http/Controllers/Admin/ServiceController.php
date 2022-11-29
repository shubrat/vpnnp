<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Service;
use App\Services\Datatable\ServicesDatatableService;
use App\Services\ImageUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


use Illuminate\Support\Collection;
use Illuminate\View\View;

use function collect;

use function view;

class ServiceController extends Controller
{

    public function __construct(
        private ImageUploadService $imageUploadService
    ) {
    }
    // Index
    public function index()
    {
        $this->setPageTitle('Products', 'List of all products');

        return request()->ajax()
            ? $this->datatable()
            : view('cms.services.index');
    }
    // Create
    public function create()
    {
        $this->setPageTitle('Products', 'Fill in the required fields to create a new Products.');

        return view('cms.services.create');
    }

    // Store
    public function store(ServiceStoreRequest $request)
    {



        try {
            // dd($request);

            $service = Service::create($request->validated());
            if ($service) {
                $this->imageUploadService->uploadImageFromRequestUrl($request, $service);
            }
            return $service
                ? $this->responseRedirect('cms.services.index', 'Service Successfully Created.', 'success')
                : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }

    // Edit
    public function edit(Service $service): View
    {
        // dd($service);    

        $this->setPageTitle('Services', 'Please update the required fields');

        return view('cms.services.edit', [
            'service' => $service,

        ]);
    }


    public function update(ServiceUpdateRequest $request, Service $service)
    {
        // dd($service);    
        try {


            $status = $service->update($request->validated());
            $this->imageUploadService->uploadImageFromRequestUrl($request, $service);

            return $status
                ? $this->responseRedirect('cms.services.index', 'Service Updated Sucessfully', 'success')
                : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }




    public function delete(Service $service)
    {
        return $service->delete()
            ? response()->json(['success' => 'Service Successfully Deleted.'])
            : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }

    protected function datatable()
    {

        $data = Service::latest()->get();
        return DataTables::of($data)
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                        <a
                        href="' . route('cms.services.edit', $data) . '"
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
                            data-id="' . $data->slug . '"
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
                return ' <img src="' . $data->getFirstOrDefaultMediaUrl("image", 'thumb') . '" style="width: 80px; height:80px;">
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



            ->editColumn('sdescription', function ($data) {
                return '

                        <div class="d-flex flex-column">
                            <h5
                            class="text-body font-size-12 mb-1 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->sdescription . '"
                                data-bs-original-title="' . $data->sdescription . '"
                                >' . Str::limit($data->sdescription, 60) . ' </h5>
                            
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
            // <li class=post-date><i class="uil uil-calendar-alt"></i><span>{{ $blog->created_at->isoFormat('LL') }}</span>

            ->editColumn('feature', function ($data) {
                $checked = $data->feature == 1 ? 'checked' : '';
                return '
                    <label for="feature-' . $data->id . '"></label>
                        <input
                        type="checkbox"
                        id="feature-' . $data->id . '"
                        data-id="' . $data->id . '"
                                               name="feature"
                        class="js-switch"
                        ' . $checked . '
                        autocomplete="off"
                        onchange="toggleIsFeature(' . $data->id . ')"
                    />';
            })

            ->editColumn('created_at', fn ($data) => '<span title="' . $data->created_at . '">' . $data->created_at->isoformat('LLL') . '</span>')
            // ,'image'



            ->addIndexColumn()
            ->rawColumns(['actions', 'title', 'image', 'sdescription', 'created_at', 'feature', 'status'])
            ->make(true);
    }


    // toggle status
    public function toggleStatus(Request $request): JsonResponse
    {
        $service = Service::findOrFail($request['id']);
        $service->status = !$service->status;

        return $service->update()
            ? response()->json(['message' => 'Service Status Updated Successfully.', 'service' => $service, 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating service status.', 'status' => 'error']);
    }


    // feature Status
    // toggle status
    public function toggleIsFeature(Request $request): JsonResponse
    {
        $service = Service::findOrFail($request['id']);

        $service->feature = !$service->feature;

        return $service->update()
            ? response()->json(['message' => 'Service Feature Updated Successfully.', 'service' => $service, 'feature' => 'success'])
            : response()->json(['message' => 'Error occurred while updating service feature.', 'feature' => 'error']);
    }
}
