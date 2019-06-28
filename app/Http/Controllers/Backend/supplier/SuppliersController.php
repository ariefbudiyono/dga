<?php

namespace App\Http\Controllers\Backend\supplier;

use App\Models\supplier\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\supplier\CreateResponse;
use App\Http\Responses\Backend\supplier\EditResponse;
use App\Repositories\Backend\supplier\SupplierRepository;
use App\Http\Requests\Backend\supplier\ManageSupplierRequest;
use App\Http\Requests\Backend\supplier\CreateSupplierRequest;
use App\Http\Requests\Backend\supplier\StoreSupplierRequest;
use App\Http\Requests\Backend\supplier\EditSupplierRequest;
use App\Http\Requests\Backend\supplier\UpdateSupplierRequest;
use App\Http\Requests\Backend\supplier\DeleteSupplierRequest;

/**
 * SuppliersController
 */
class SuppliersController extends Controller
{
    /**
     * variable to store the repository object
     * @var SupplierRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SupplierRepository $repository;
     */
    public function __construct(SupplierRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\supplier\ManageSupplierRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSupplierRequest $request)
    {
        return new ViewResponse('backend.suppliers.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSupplierRequestNamespace  $request
     * @return \App\Http\Responses\Backend\supplier\CreateResponse
     */
    public function create(CreateSupplierRequest $request)
    {
        return new CreateResponse('backend.suppliers.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSupplierRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSupplierRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.suppliers.index'), ['flash_success' => trans('alerts.backend.suppliers.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\supplier\Supplier  $supplier
     * @param  EditSupplierRequestNamespace  $request
     * @return \App\Http\Responses\Backend\supplier\EditResponse
     */
    public function edit(Supplier $supplier, EditSupplierRequest $request)
    {
        return new EditResponse($supplier);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSupplierRequestNamespace  $request
     * @param  App\Models\supplier\Supplier  $supplier
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $supplier, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.suppliers.index'), ['flash_success' => trans('alerts.backend.suppliers.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSupplierRequestNamespace  $request
     * @param  App\Models\supplier\Supplier  $supplier
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Supplier $supplier, DeleteSupplierRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($supplier);
        //returning with successfull message
        return new RedirectResponse(route('admin.suppliers.index'), ['flash_success' => trans('alerts.backend.suppliers.deleted')]);
    }
    
}
