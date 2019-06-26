<?php

namespace App\Http\Controllers\Backend\CustomerOrder;

use App\Models\CustomerOrder\CustomerOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\CustomerOrder\CreateResponse;
use App\Http\Responses\Backend\CustomerOrder\EditResponse;
use App\Repositories\Backend\CustomerOrder\CustomerOrderRepository;
use App\Http\Requests\Backend\CustomerOrder\ManageCustomerOrderRequest;
use App\Http\Requests\Backend\CustomerOrder\CreateCustomerOrderRequest;
use App\Http\Requests\Backend\CustomerOrder\StoreCustomerOrderRequest;
use App\Http\Requests\Backend\CustomerOrder\EditCustomerOrderRequest;
use App\Http\Requests\Backend\CustomerOrder\UpdateCustomerOrderRequest;
use App\Http\Requests\Backend\CustomerOrder\DeleteCustomerOrderRequest;

use App\Models\Factory\Factory;

/**
 * CustomerordersController
 */
class CustomerOrdersController extends Controller
{
    /**
     * variable to store the repository object
     * @var CustomerorderRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param CustomerorderRepository $repository;
     */
    public function __construct(CustomerOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\customerorder\ManageCustomerorderRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageCustomerOrderRequest $request)
    {
        return new ViewResponse('backend.customerorders.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateCustomerorderRequestNamespace  $request
     * @return \App\Http\Responses\Backend\customerorder\CreateResponse
     */
    public function create(CreateCustomerOrderRequest $request)
    {
        $factories = Factory::getSelectData();
        //return new CreateResponse('backend.customerorders.create');
        return new CreateResponse($factories);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCustomerorderRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreCustomerOrderRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.customerorders.index'), ['flash_success' => trans('alerts.backend.customerorders.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\customerorder\Customerorder  $customerorder
     * @param  EditCustomerorderRequestNamespace  $request
     * @return \App\Http\Responses\Backend\customerorder\EditResponse
     */
    public function edit(CustomerOrder $customerorder, EditCustomerOrderRequest $request)
    {
        $factories = Factory::getSelectData();
        return new EditResponse($customerorder,$factories);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCustomerorderRequestNamespace  $request
     * @param  App\Models\customerorder\Customerorder  $customerorder
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateCustomerOrderRequest $request, CustomerOrder $customerorder)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $customerorder, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.customerorders.index'), ['flash_success' => trans('alerts.backend.customerorders.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteCustomerorderRequestNamespace  $request
     * @param  App\Models\customerorder\Customerorder  $customerorder
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(CustomerOrder $customerorder, DeleteCustomerOrderRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($customerorder);
        //returning with successfull message
        return new RedirectResponse(route('admin.customerorders.index'), ['flash_success' => trans('alerts.backend.customerorders.deleted')]);
    }
    
}
