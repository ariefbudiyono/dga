<?php

namespace App\Http\Controllers\Backend\purchaseorder;

use App\Models\purchaseorder\Purchaseorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\purchaseorder\CreateResponse;
use App\Http\Responses\Backend\purchaseorder\EditResponse;
use App\Repositories\Backend\purchaseorder\PurchaseorderRepository;
use App\Http\Requests\Backend\purchaseorder\ManagePurchaseorderRequest;
use App\Http\Requests\Backend\purchaseorder\CreatePurchaseorderRequest;
use App\Http\Requests\Backend\purchaseorder\StorePurchaseorderRequest;
use App\Http\Requests\Backend\purchaseorder\EditPurchaseorderRequest;
use App\Http\Requests\Backend\purchaseorder\UpdatePurchaseorderRequest;
use App\Http\Requests\Backend\purchaseorder\DeletePurchaseorderRequest;

use App\Models\supplier\Supplier;

/**
 * PurchaseordersController
 */
class PurchaseordersController extends Controller
{
    /**
     * variable to store the repository object
     * @var PurchaseorderRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PurchaseorderRepository $repository;
     */
    public function __construct(PurchaseorderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\purchaseorder\ManagePurchaseorderRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePurchaseorderRequest $request)
    {
        return new ViewResponse('backend.purchaseorders.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePurchaseorderRequestNamespace  $request
     * @return \App\Http\Responses\Backend\purchaseorder\CreateResponse
     */
    public function create(CreatePurchaseorderRequest $request)
    {
        $supplier   = Supplier::getSelectData();
        return new CreateResponse($supplier);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePurchaseorderRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePurchaseorderRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.purchaseorders.index'), ['flash_success' => trans('alerts.backend.purchaseorders.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\purchaseorder\Purchaseorder  $purchaseorder
     * @param  EditPurchaseorderRequestNamespace  $request
     * @return \App\Http\Responses\Backend\purchaseorder\EditResponse
     */
    public function edit(Purchaseorder $purchaseorder, EditPurchaseorderRequest $request)
    {
        $suppliers = Supplier::getSelectData();
        return new EditResponse($purchaseorder,$suppliers);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePurchaseorderRequestNamespace  $request
     * @param  App\Models\purchaseorder\Purchaseorder  $purchaseorder
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePurchaseorderRequest $request, Purchaseorder $purchaseorder)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $purchaseorder, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.purchaseorders.index'), ['flash_success' => trans('alerts.backend.purchaseorders.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePurchaseorderRequestNamespace  $request
     * @param  App\Models\purchaseorder\Purchaseorder  $purchaseorder
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Purchaseorder $purchaseorder, DeletePurchaseorderRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($purchaseorder);
        //returning with successfull message
        return new RedirectResponse(route('admin.purchaseorders.index'), ['flash_success' => trans('alerts.backend.purchaseorders.deleted')]);
    }



    public function getSuppliers(Request $request)
    {
        $query = $request->get('query','');  
        $posts = Supplier::where('name','LIKE','%'.$query.'%')->get();     
        //$posts = '';
        return response()->json($posts);
    }
    
}
