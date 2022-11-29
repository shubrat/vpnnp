<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsLetterStoreRequest;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;


class NewsLetterController extends Controller
{
    public function show()
    {
        $this->setPageTitle('Newsletter', '');

        return view('cms.admin.newsletters.show');
    }

    public function subscribe(NewsLetterStoreRequest $request, NewsLetter $newsletter)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|unique:newsletters,email',
        ]);


        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $email = $request['email'];
            $newsletter->create($request->validated());

            return response()->json(['status' => 1, 'message' => 'Thank you for subscribing.']);
            
        }
    }



    public function create()
    {
        $this->setPageTitle('NewsLetter', '');

        return view('cms.newsletters.create');
    }

    public function index()
    {
        $this->setPageTitle('NewsLetter', '');
        return (request()->ajax())
            ? $this->datatable()
            : view('cms.newsletters.index');
    }

    protected function datatable()
    {
        $newsletters = NewsLetter::orderBy('created_at', 'desc')->get();
        return DataTables::of($newsletters)
      
            ->addColumn('actions', function ($data) {
                return '
                    <div class="d-flex flex-wrap gap-2">
                      
                        <a
                            href="#"
                            id="delete-btn"
                            data-id="' . $data->id . '"
                            type="button"
                            class="btn btn-danger waves-effect waves-light btn-md "
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Delete"
                            data-bs-original-title="Delete"
                        ><i class="bx bx-trash font-size-16 align-middle"></i></a>
                    </div>
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function destroy(NewsLetter $newsletter)
    {
        return $newsletter->delete()
            ? response()->json(['success' => 'NewsLetter Successfully Deleted.'])
            : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }
}
