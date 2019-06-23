<?php

namespace App\Http\Controllers\Backend\product;

use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\product\CreateResponse;
use App\Http\Responses\Backend\product\EditResponse;
use App\Repositories\Backend\product\ProductRepository;
use App\Http\Requests\Backend\product\ManageProductRequest;
use App\Http\Requests\Backend\product\CreateProductRequest;
use App\Http\Requests\Backend\product\StoreProductRequest;
use App\Http\Requests\Backend\product\EditProductRequest;
use App\Http\Requests\Backend\product\UpdateProductRequest;
use App\Http\Requests\Backend\product\DeleteProductRequest;

/**
 * ProductsController
 */
class ProductsController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ProductRepository $repository;
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\product\ManageProductRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageProductRequest $request)
    {
        return new ViewResponse('backend.products.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateProductRequestNamespace  $request
     * @return \App\Http\Responses\Backend\product\CreateResponse
     */
    public function create(CreateProductRequest $request)
    {
        return new CreateResponse('backend.products.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.products.index'), ['flash_success' => trans('alerts.backend.products.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\product\Product  $product
     * @param  EditProductRequestNamespace  $request
     * @return \App\Http\Responses\Backend\product\EditResponse
     */
    public function edit(Product $product, EditProductRequest $request)
    {
        return new EditResponse($product);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequestNamespace  $request
     * @param  App\Models\product\Product  $product
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $product, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.products.index'), ['flash_success' => trans('alerts.backend.products.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteProductRequestNamespace  $request
     * @param  App\Models\product\Product  $product
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Product $product, DeleteProductRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($product);
        //returning with successfull message
        return new RedirectResponse(route('admin.products.index'), ['flash_success' => trans('alerts.backend.products.deleted')]);
    }
    
}
