<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Services\ImageUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{


    public function __construct(
        private ImageUploadService $imageUploadService
    ) {
    }
    public function index()
    {

        $this->setPageTitle('Blog', 'List of all Blogs');
        return request()->ajax()
            ? $this->datatable()
            : view('cms.blogs.index');
    }

    public function create()
    {
        $this->setPageTitle('Blogs', 'Fill in the required fields to create a new Blog.');
        return view('cms.blogs.create', [
            
        ]);
    }

    public function store(BlogStoreRequest $request)
    {

        try {

            $blog = Blog::create($request->validated());
            if ($blog) {
                $this->imageUploadService->uploadImageFromRequestUrl($request, $blog);
            }
            return $blog
                ? $this->responseRedirect('cms.blogs.index', 'Blog Successfully Created.', 'success')
                : $this->responseRedirectBack('There was some issue with the server. Please try again.', 'error', true, true);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }

    public function edit(Blog $blog)
    {
        $this->setPageTitle('Blogs', 'Fill in the required fields to create a new Careers.');
        return view(
            'cms.blogs.edit',
            [
                'blog' => $blog,
                
            ]
        );
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        try {
            $status = $blog->update($request->validated());
            $this->imageUploadService->uploadImageFromRequestUrl($request, $blog);

            return $status
                ? $this->responseRedirect('cms.blogs.index', 'Blog updated Sucessfully', 'success')
                : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }

    public function delete(Blog $blog)
    {
        return  $blog->delete()
            ? response()->json(['success' => 'Blog Successfully Deleted.'])
            : response()->json(['error' => 'There was some issue with the server. Please try again.']);
    }


    protected function datatable()
    {
        $blog = Blog::latest()->get();
        return DataTables::of($blog)
            ->addColumn('actions', function ($data) {
                return '
                <div class="d-flex flex-wrap gap-2">
                <a
                href="' . route('cms.blogs.edit', $data) . '"
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


            ->editColumn('source', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->source . '"
                                data-bs-original-title="' . $data->source . '"
                            >' . Str::limit($data->source, 17) . '</p>
                            
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



            ->editColumn('content', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . Str::limit($data->content, 17) . '"
                                data-bs-original-title="' .Str::limit($data->content, 17) . '"
                            >' . Str::limit($data->content, 17) . '</p>
                            
                        </div>
                    ';
            })


            ->editColumn('source_url', function ($data) {
                return '
                        <div class="d-flex flex-column">
                            <p
                                class="text-body font-size-14 "
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="' . $data->source_url . '"
                                data-bs-original-title="' . $data->source_url . '"
                            >' . Str::limit($data->source_url, 17) . '</p>
                            
                        </div>
                    ';
            })


       

            ->editColumn('published_at', function ($data) {
                return '
                    <p
                        class="text-body font-size-14 "
                                title="' . $data->published_at . '"
                                data-bs-original-title="' . $data->published_at . '"
                            >' . Carbon::parse($data->published_at)->isoFormat('LL') . '
                     </p>
                            
                    ';
            })

            ->editColumn('image', function ($data) {
                return ' <img src="' . $data->getFirstOrDefaultMediaUrl("image", 'thumb') . '" style="width: 80px; height:80px;">
                    ';
            })

            // ,'image'
            ->addIndexColumn()
            ->rawColumns(['actions', 'title', 'source', 'source_url',  'published_at', 'content', 'status', 'image'])
            ->make(true);
    }


    //    toggle status
    public function toggleStatus(Request $request): JsonResponse
    {
        $blog = Blog::findOrFail($request['id']);

        $blog->status = !$blog->status;

        return $blog->update()
            ? response()->json(['message' => 'Blog Status Updated Successfully.', 'blog' => $blog, 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating blog status.', 'status' => 'error']);
    }
}
