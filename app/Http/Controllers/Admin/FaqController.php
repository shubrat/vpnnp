<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Http\Requests\FaqTypeStoreRequest;
use App\Http\Requests\FaqUpdateRequest;
use App\Models\Faq;
use App\Models\FaqType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FaqController extends Controller
{
  
    // Create FAQ
    public function createFaq()
    {
        $this->setPageTitle('Create', 'Fill in the required fields to create a new FAQ');
        return view('cms.faq.create');
    }

    // Store FAQ
    public function storeFaq(FaqStoreRequest $faqStoreRequest, Faq $faq)
    {
        
        

        // return redirect()->route('cms.faqs.index');
        return $faq->create($faqStoreRequest->validated())
        ? $this->responseRedirect('cms.faqs.index', 'Faq added successfully.', 'success')
        : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
    }

    // view Faq
    public function viewFaq(){
        $this->setPageTitle('Faq', ' List Of All FAQ');
        return request()->ajax()
        ? $this->faqDatatable()
        : view('cms.faq.index');
    }

    // Return FAQ  Data In Data Table
    function faqDatatable()
        {
        $data = Faq::latest()->get();
        return DataTables::of($data)
        ->addColumn('actions', function($data){
            return '<div class="d-flex flex-wrap gap-2">
            <a href="'.route('cms.faq.edit', $data).'"
            type="button"
            class="btn btn-success waves-effect waves-light btn-md"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Edit"
            data-bs-original-title="Edit">
            <i class="bx bx-pencil font-size-16 align-middle"></i></a>

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

        // Question
        ->editColumn('question', function($data){
            return '
            <div class="d-flex flex-column">
            <p
                class="text-body font-size-14 "
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="' . $data->question . '"
                data-bs-original-title="' . $data->question . '"
            >' . Str::limit($data->question, 17) . '</p>

        </div>

            ';
        })

        ->editColumn('answer', function($data){
            return '
            <div class="d-flex flex-column">
            <p
                class="text-body font-size-14 "
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="' . $data->answer . '"
                data-bs-original-title="' . $data->answer . '"
            >' . Str::limit($data->answer, 17) . '</p>

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
        ->rawColumns(['actions', 'question', 'answer','status'])
        ->make(true);
    }

    // Edit FAQ Data
    public function editFaq(Faq $faq): View
    {
        // $faqType = FaqType::all();
        $this->setPageTitle(' FAQ', 'Please Update The Required Field');

        return view('cms.faq.edit', [
            'faq' => $faq,
            
        ]);

    }

    // Update FAq Data
    public function updateFaq(FaqUpdateRequest $request, Faq $faq){
        return $faq->update($request->validated())
        ? $this->responseRedirect('cms.faqs.index', 'Faq updated successfully.', 'success')
        : $this->responseRedirectBack('Error while handing your request', 'error', TRUE, TRUE);
    }

    // FAQ Delete
    public function DeleteFaq(Faq $faq): RedirectResponse
    {
        return $faq->delete()
        ? $this->responseRedirectBack('Faq Deleted Successfully', 'success')
        : $this->responseRedirectBack('Error While Handing Your Requrst', 'error');
    }


          // toggle status
          public function toggleStatus(Request $request): JsonResponse
          {
              $faq = Faq::findOrFail($request['id']);
      
              $faq->status = !$faq->status;
      
              return $faq->update()
                  ? response()->json(['message' => 'Faq Status Updated Successfully.', 'faq' => $faq, 'status' => 'success'])
                  : response()->json(['message' => 'Error occurred while updating faq status.', 'status' => 'error']);
          }


}

