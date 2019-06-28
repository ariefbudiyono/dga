<?php

namespace App\Http\Controllers\Backend\warehouse;

use App\Models\warehouse\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\warehouse\CreateResponse;
use App\Http\Responses\Backend\warehouse\EditResponse;
use App\Repositories\Backend\warehouse\WarehouseRepository;
use App\Http\Requests\Backend\warehouse\ManageWarehouseRequest;
use App\Http\Requests\Backend\warehouse\CreateWarehouseRequest;
use App\Http\Requests\Backend\warehouse\StoreWarehouseRequest;
use App\Http\Requests\Backend\warehouse\EditWarehouseRequest;
use App\Http\Requests\Backend\warehouse\UpdateWarehouseRequest;
use App\Http\Requests\Backend\warehouse\DeleteWarehouseRequest;

/**
 * WarehousesController
 */
class WarehousesController extends Controller
{
    /**
     * variable to store the repository object
     * @var WarehouseRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param WarehouseRepository $repository;
     */
    public function __construct(WarehouseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\warehouse\ManageWarehouseRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageWarehouseRequest $request)
    {
        return new ViewResponse('backend.warehouses.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateWarehouseRequestNamespace  $request
     * @return \App\Http\Responses\Backend\warehouse\CreateResponse
     */
    public function create(CreateWarehouseRequest $request)
    {
        return new CreateResponse('backend.warehouses.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreWarehouseRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreWarehouseRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.warehouses.index'), ['flash_success' => trans('alerts.backend.warehouses.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\warehouse\Warehouse  $warehouse
     * @param  EditWarehouseRequestNamespace  $request
     * @return \App\Http\Responses\Backend\warehouse\EditResponse
     */
    public function edit(Warehouse $warehouse, EditWarehouseRequest $request)
    {
        return new EditResponse($warehouse);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateWarehouseRequestNamespace  $request
     * @param  App\Models\warehouse\Warehouse  $warehouse
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $warehouse, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.warehouses.index'), ['flash_success' => trans('alerts.backend.warehouses.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteWarehouseRequestNamespace  $request
     * @param  App\Models\warehouse\Warehouse  $warehouse
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Warehouse $warehouse, DeleteWarehouseRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($warehouse);
        //returning with successfull message
        return new RedirectResponse(route('admin.warehouses.index'), ['flash_success' => trans('alerts.backend.warehouses.deleted')]);
    }
    
}
