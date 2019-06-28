<?php

namespace App\Http\Controllers\Backend\purchaseorderdetail;

use App\Models\purchaseorderdetail\Purchaseorderdetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\purchaseorderdetail\CreateResponse;
use App\Http\Responses\Backend\purchaseorderdetail\EditResponse;
use App\Repositories\Backend\purchaseorderdetail\PurchaseorderdetailRepository;
use App\Http\Requests\Backend\purchaseorderdetail\ManagePurchaseorderdetailRequest;
use App\Http\Requests\Backend\purchaseorderdetail\CreatePurchaseorderdetailRequest;
use App\Http\Requests\Backend\purchaseorderdetail\StorePurchaseorderdetailRequest;
use App\Http\Requests\Backend\purchaseorderdetail\EditPurchaseorderdetailRequest;
use App\Http\Requests\Backend\purchaseorderdetail\UpdatePurchaseorderdetailRequest;
use App\Http\Requests\Backend\purchaseorderdetail\DeletePurchaseorderdetailRequest;

use App\Models\Product\Product;

/**
 * PurchaseorderdetailsController
 */
class PurchaseorderdetailsController extends Controller
{
    /**
     * variable to store the repository object
     * @var PurchaseorderdetailRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PurchaseorderdetailRepository $repository;
     */
    public function __construct(PurchaseorderdetailRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\purchaseorderdetail\ManagePurchaseorderdetailRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePurchaseorderdetailRequest $request)
    {
        return new ViewResponse('backend.purchaseorderdetails.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePurchaseorderdetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\purchaseorderdetail\CreateResponse
     */
    public function create(CreatePurchaseorderdetailRequest $request)
    {
        return new CreateResponse('backend.purchaseorderdetails.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePurchaseorderdetailRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePurchaseorderdetailRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.purchaseorderdetails.index'), ['flash_success' => trans('alerts.backend.purchaseorderdetails.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\purchaseorderdetail\Purchaseorderdetail  $purchaseorderdetail
     * @param  EditPurchaseorderdetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\purchaseorderdetail\EditResponse
     */
    public function edit(Purchaseorderdetail $purchaseorderdetail, EditPurchaseorderdetailRequest $request)
    {
        $product = Product::getSelectData();
        return new EditResponse($purchaseorderdetail,$product);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePurchaseorderdetailRequestNamespace  $request
     * @param  App\Models\purchaseorderdetail\Purchaseorderdetail  $purchaseorderdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePurchaseorderdetailRequest $request, Purchaseorderdetail $purchaseorderdetail)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $purchaseorderdetail, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.purchaseorderdetails.index'), ['flash_success' => trans('alerts.backend.purchaseorderdetails.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePurchaseorderdetailRequestNamespace  $request
     * @param  App\Models\purchaseorderdetail\Purchaseorderdetail  $purchaseorderdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Purchaseorderdetail $purchaseorderdetail, DeletePurchaseorderdetailRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($purchaseorderdetail);
        //returning with successfull message
        return new RedirectResponse(route('admin.purchaseorderdetails.index'), ['flash_success' => trans('alerts.backend.purchaseorderdetails.deleted')]);
    }
    
}
