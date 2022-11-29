<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
class categoryController extends Controller
{
       //Index page of category
       public function index()
       {
           $this->setPageTitle('Category', 'List of all  Categories');
   
           return request()->ajax()
               ? $this->datatable()
               : view('cms.categories.index');
       }
   
       // Create a new category
       public function create()
       {
           $this->setPageTitle('Category', 'Fill in the required fields to create a new category.');
           return view('cms.categories.create');
       }
   
   
       // Store the category field data in  your database
       public function store(CategoryStoreRequest $request)
       {
           try {
               $category = Category::create($request->validated());
   
               return $category
                   ? $this->responseRedirect('cms.categories.index', 'Category Successfully Created.', 'success')
                   : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
           } catch (\Throwable $exception) {
               return $exception->getMessage();
           }
       }
   
       // Edit the category 
       public function edit(Category $category): View
       {
           $this->setPageTitle('Category', 'Please update the required fields');
   
           return view('cms.categories.edit', [
               'category' => $category,
           ]);
       }
   
       // please update your category data in your database
       public function update(CategoryUpdateRequest $request, Category $category)
       {
           try {
               $status = $category->update($request->validated());
   
               return $status
                   ? $this->responseRedirect('cms.categories.index', 'Category created Sucessfully', 'success')
                   : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
           } catch (\Throwable $exception) {
               return $exception->getMessage();
           }
       }
   
   
   
       // this will delete the category from your database
       public function delete(Category $category)
       {
           return $category->delete()
               ? response()->json(['success' => 'Category Successfully Deleted.'])
               : response()->json(['success' => 'There was some issue with the server. Please try again.']);
       }
   
   
       // it used for the datatable in other to show the data in the index page
       protected function datatable()
       {
           $data = Category::latest()->get();
           return DataTables::of($data)
               ->addColumn('actions', function ($data) {
                   return '
                       <div class="d-flex flex-wrap gap-2">
                           <a
                           href="' . route('cms.categories.edit', $data) . '"
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
                                   class="text-body font-size-14 "
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="' . $data->title . '"
                                   data-bs-original-title="' . $data->title . '"
                               >' . Str::limit($data->title, 17) . '</p>
   
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
               ->rawColumns(['actions', 'title', 'status'])
               ->make(true);
       }
   
   
   
       // toggle status
       public function toggleStatus(Request $request): JsonResponse
       {
           $category = Category::findOrFail($request['id']);
   
           $category->status = !$category->status;
   
           return $category->update()
               ? response()->json(['message' => 'Category Status Updated Successfully.', 'Category' => $category->title , 'status' => 'success'])
               : response()->json(['message' => 'Error occurred while updating caegory status.', 'status' => 'error']);
       }
}
