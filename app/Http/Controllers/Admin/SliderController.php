<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;

use App\Services\ImageUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;


class SliderController extends Controller
{
    public function __construct(
        private ImageUploadService $imageUploadService
    ) {
    }
    // Index
    public function index()
    {
        $this->setPageTitle('Slider', 'List of all sliders');

        return request()->ajax()
        ? $this->datatable()
        : view('cms.sliders.index');

    }
    // Create
    public function create()
    {
        $this->setPageTitle('Slider', 'Fill in the required fields to create a new Slider.');

        return view('cms.sliders.create');
    }

    
        // Store
        public function store(SliderStoreRequest $request)
    {


        try {
            // dd($request);

            $slider = Slider::create($request->validated());
            if ($slider) {
                $this->imageUploadService->uploadImageFromRequestUrl($request, $slider, 'image_url', 'image');
            }
            return $slider
                ? $this->responseRedirect('cms.sliders.index', 'Slider Successfully Created.', 'success')
                : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }

    }
      
   // Edit
   public function edit(Slider $Slider): View
   {
       $this->setPageTitle('Sliders', 'Please update the required fields');

       return view('cms.sliders.edit', [
           'slider' => $Slider,
       ]);
   }


   public function update(SliderUpdateRequest $request, Slider $Slider)
   {
       try {
           $status = $Slider->update($request->validated());
           $this->imageUploadService->uploadImageFromRequestUrl($request, $Slider, 'image_url','image');

           return $status
               ? $this->responseRedirect('cms.sliders.index', 'Sliders created Sucessfully', 'success')
               : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
       } catch (\Throwable $exception) {
           return $exception->getMessage();
       }
   }




    public function delete(Slider $Slider)
    {
        return $Slider->delete()
        ? response()->json(['success' => 'Slider Successfully Deleted.'])
        : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }

    protected function datatable()
    {
        
        $data = Slider::latest()->get();
        return DataTables::of($data)
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                        <a
                        href="' . route('cms.sliders.edit', $data) . '"
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
        $slider = Slider::findOrFail($request['id']);

        $slider->status = !$slider->status;

        return $slider->update()
            ? response()->json(['message' => 'Slider Status Updated Successfully.', 'Slider' => $slider, 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating Slider status.', 'status' => 'error']);
    }





}

