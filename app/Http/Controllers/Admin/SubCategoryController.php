<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

use Illuminate\View\View;

use function view;
 
class SubCategoryController extends Controller
{
    //Index page of SubCategory
    public function index()
    {
        $this->setPageTitle('SubCategory', 'List of all  sub-categories');

        return request()->ajax()
            ? $this->datatable()
            : view('cms.subCategories.index',[
            'categories' => Category::select('id','title')->get(),

            ]);
    }

    // Create a new SubCategory
    public function create()
    {
        $this->setPageTitle('SubCategory', 'Fill in the required fields to create a new sub-category.');
        return view('cms.subCategories.create',[
            'categories' => Category::select('id','title')->get(),
        ]);
    }

    // Store the SubCategory field data in  your database
    public function store(SubCategoryStoreRequest $request)
    {
        try {
            $SubCategory = SubCategory::create($request->validated());

            return $SubCategory
                ? $this->responseRedirect('cms.subCategories.index', 'Sub-Category  Successfully Created.', 'success')
                : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }

    // Edit the SubCategory 
    public function edit(SubCategory $SubCategory): View
    {
        $this->setPageTitle('SubCategory', 'Please update the required fields');
        return view('cms.subCategories.edit', [
            'categories' => Category::select('id','title')->where('status', 1)->get(),
            'subCategories' => $SubCategory,
        ]);
    }


    // please update your SubCategory data in your database
    public function update(SubCategoryUpdateRequest $request, SubCategory $subCategory)
    {
        try {
            $status = $subCategory->update($request->validated());

            return $status
                ? $this->responseRedirect('cms.subCategories.index', 'SubCategory created Sucessfully', 'success')
                : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }



    // this will delete the SubCategory from your database
    public function delete(SubCategory $subCategory)
    {
        return $subCategory->delete()
            ? response()->json(['success' => 'Sub-Category  Successfully Deleted.'])
            : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }


    // it used for the datatable in other to show the data in the index page
    protected function datatable()
    {
        $data = SubCategory::latest()->get();
        return DataTables::of($data)
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                        <a
                        href="' . route('cms.subCategories.edit', $data) . '"
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

            ->editColumn('title', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->title . '"
                                data-bs-original-title="' . $data->title . '"
                            >' . Str::limit($data->title, 17) . '</p>

                        </div>
                    ';
            })

           
                ->editColumn('category_id', function ($data) {
                return '

                        <div class="d-flex flex-column">
                            <p
                            class="text-body font-size-12 mb-1 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->category->title . '"
                                data-bs-original-title="' .$data->category->title . '"
                                >' . Str::limit($data->category->title , 60) .'|' . Str::limit($data->category->category_np , 60) . ' </p>
                            
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
            ->rawColumns(['actions', 'title', 'subcategory_np', 'category_id', 'status'])
            ->make(true);
    }



    // toggle status
    public function toggleStatus(Request $request): JsonResponse
    {
        $subCategory = SubCategory::findOrFail($request['id']);

        $subCategory->status = !$subCategory->status;

        return $subCategory->update()
            ? response()->json(['message' => 'SubCategory Status Updated Successfully.', 'Sub-Category ' => $subCategory, 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating caegory status.', 'status' => 'error']);
    }
}
