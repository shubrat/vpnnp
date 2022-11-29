<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ImageUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
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
            : view('cms.products.index');
    }
    // Create
    public function create()
    {
        $this->setPageTitle('Products', 'Fill in the required fields to create a new Products.');

        return view('cms.products.create', [
            'categories' => Category::all(),
        ]);
    }

    // Store
    public function store(ProductStoreRequest $request)
    {
        try {
            // $product = $this->productRepository->storeProduct($request->validated());
            $product = Product::create($request->validated());

         
            if ($product) {
                $this->imageUploadService->uploadImageFromRequestUrl($request, $product, 'image', 'image');
                $this->imageUploadService->uploadMultipleMediaFromRequest($request, $product, 'gallery_image_url', 'gallery_image');
            }

            return $product
                ? $this->responseRedirect('cms.products.index', 'Product has been created successfully.', 'success')
                : $this->responseRedirectBacK('There was some with the server. Please try again later.');
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }

    // Edit
    public function edit(Product $product): View
    {
        // dd($product);    

        $this->setPageTitle('Products', 'Please update the required fields');
        $gallerys=$product->getMedia('gallery_image');


        return view('cms.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'gallerys'=>$gallerys,


        ]);
    }



    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            // $updatepPoduct = $this->productRepository->updateProduct($product->id, $request->all());
            $updatepPoduct = $product->update($request->validated());
            // $this->imageUploadService->uploadImageFromRequestUrl($request, $product);

              if ($updatepPoduct) {
                $this->imageUploadService->uploadImageFromRequestUrl($request, $product, 'image', 'image');
                $this->imageUploadService->uploadMultipleMediaFromRequest($request, $product, 'gallery_image_url', 'gallery_image');
            }

            return $product
                ? $this->responseRedirect('admin.products.index', 'Product has been updated successfully.', 'success')
                : $this->responseRedirectBack('There was some problem occurred with  the server. Please try again later.');
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }




    public function delete(Product $product)
    {
        return $product->delete()
            ? response()->json(['success' => 'Product Successfully Deleted.'])
            : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }

    protected function datatable()
    {
        // $products = $this->productRepository->listProducts('created_at', 'desc');
        $query = Product::query();
        $products = $query->latest()->get();
        return DataTables::of($products)
            ->addColumn('actions', function ($data) {
                return '
                <div class="d-flex flex-wrap gap-2">
                    <a
                    href="' . route('cms.products.edit', $data) . '"
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
            ->editColumn('title', function ($data) {
                return '<div class="col-auto" style="display: inline-block">
                <img src="' . $data->getFirstOrDefaultMediaUrl('image', 'original') . '" alt="Product Image" height="50" width="50"/>
            </div>
            <div class="col-auto" style="display: inline-block">
                <span class="text-muted text-truncate">' . $data->title . ' </span>
            </div>';
            })
            ->addColumn('info', function ($data) {
                
                return '<strong>Selling Price : </strong>' . $data->selling_price . '<br />' .
                    '<strong>Cost Price : </strong>' . $data->cost_price  . '<br />';
            })
        
            ->editColumn('is_featured', function ($data) {
                $checked = $data->is_featured == 1 ? 'checked' : '';

                return '
                <label for="is-featured-switch-' . $data->id . '"></label>
                <input
                    type="checkbox"
                    id="is-featured-switch-' . $data->id . '"
                    data-id="' . $data->id . '"
                    name="is_featured"
                    class="js-switch"
                    ' . $checked . '
                    autocomplete="off"
                    onchange="toggleIsFeatured(' . $data->id . ')"
                />
            ';
            })
          
            ->addIndexColumn()
            ->rawColumns(['actions', 'title', 'info', 'is_featured'])
            ->make(true);
    }

    public function galleryUpdate(Request $request, Product $product)
    {
        try {
            $this->imageUploadService->uploadMultipleMediaFromRequest($request, $product, 'gallery_image_url', 'gallery_image');
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
        return $this->responseRedirect('admin.products.index', 'Product Gallery Updated successfully.', 'success');
    }
    public function deleteGallery(int $id)
    {
        
    }

    public function galleryDestroy($id)
    {
        // $product= Product::findOrFail($id);
        $media = Media::find($id);
        $media->delete();
        return $media
        // return $this->deleteGallery($id)
       
        // return $this->productRepository->deleteGallery($id)
            ? response()->json(['success' => 'Gallery Image Successfully Deleted.'])
            : response()->json(['success' => 'There was some issue with the server. Please try again.']);
    }


    public function toggleIsFeatured(Request $request): JsonResponse
    {
        return $this->productRepository->updateProductFeature($request->all())
            ? response()->json(['message' => 'Product Featured Updated Successfully.', 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating product featured status.', 'status' => 'error']);
    }

    public function toggleIsTaxable(Request $request): JsonResponse
    {
        return $this->productRepository->updateProductTaxable($request->all())
            ? response()->json(['message' => 'Product Taxable Updated Successfully.', 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating product taxable status.', 'status' => 'error']);
    }

    public function toggleIsRefundable(Request $request): JsonResponse
    {
        return $this->productRepository->updateProductRefundable($request->all())
            ? response()->json(['message' => 'Product Refundable Updated Successfully.', 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating product refundable status.', 'status' => 'error']);
    }
    public function toggleIsTrending(Request $request): JsonResponse
    {
        return $this->productRepository->updateProductTrending($request->all())
            ? response()->json(['message' => 'Product Trending Updated Successfully.', 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating product trending status.', 'status' => 'error']);
    }

    public function toggleIsSellable(Request $request): JsonResponse
    {
        return $this->productRepository->updateProductSellable($request->all())
            ? response()->json(['message' => 'Product Sellable Updated Successfully.', 'status' => 'success'])
            : response()->json(['message' => 'Error occurred while updating product sellable status.', 'status' => 'error']);
    }
}
