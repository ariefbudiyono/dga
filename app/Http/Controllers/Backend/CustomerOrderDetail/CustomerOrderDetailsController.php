<?php

namespace App\Http\Controllers\Backend\CustomerOrderDetail;

use App\Models\CustomerOrderDetail\CustomerOrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\CustomerOrderDetail\CreateResponse;
use App\Http\Responses\Backend\CustomerOrderDetail\EditResponse;
use App\Repositories\Backend\CustomerOrderDetail\CustomerOrderDetailRepository;
use App\Http\Requests\Backend\CustomerOrderDetail\ManageCustomerOrderDetailRequest;
use App\Http\Requests\Backend\CustomerOrderDetail\CreateCustomerOrderDetailRequest;
use App\Http\Requests\Backend\CustomerOrderDetail\StoreCustomerOrderDetailRequest;
use App\Http\Requests\Backend\CustomerOrderDetail\EditCustomerOrderDetailRequest;
use App\Http\Requests\Backend\CustomerOrderDetail\UpdateCustomerOrderDetailRequest;
use App\Http\Requests\Backend\CustomerOrderDetail\DeleteCustomerOrderDetailRequest;


use App\Models\CustomerOrder\CustomerOrder;
use App\Models\Product\Product;

use App\Models\Factory\Factory;
/**
 * CustomerorderdetailsController
 */
class CustomerOrderDetailsController extends Controller
{
    /**
     * variable to store the repository object
     * @var CustomerorderdetailRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param CustomerorderdetailRepository $repository;
     */
    public function __construct(CustomerOrderDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\customerorderdetail\ManageCustomerorderdetailRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageCustomerOrderDetailRequest $request)
    {
        return new ViewResponse('backend.customerorderdetails.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateCustomerorderdetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\customerorderdetail\CreateResponse
     */
    public function create(CreateCustomerOrderDetailRequest $request)
    {
        $customerOrders = CustomerOrder::getSelectData();
        return new CreateResponse($customerOrders);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCustomerorderdetailRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreCustomerOrderDetailRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.customerorderdetails.index'), ['flash_success' => trans('alerts.backend.customerorderdetails.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\customerorderdetail\Customerorderdetail  $customerorderdetail
     * @param  EditCustomerorderdetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\customerorderdetail\EditResponse
     */
    public function edit(CustomerOrderDetail $customerorderdetail, EditCustomerOrderDetailRequest $request)
    {
        $customerOrders = CustomerOrder::getSelectData();
        $product        = Product::getSelectData();
        return new EditResponse($customerorderdetail,$customerOrders,$product);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCustomerorderdetailRequestNamespace  $request
     * @param  App\Models\customerorderdetail\Customerorderdetail  $customerorderdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateCustomerOrderDetailRequest $request, CustomerOrderDetail $customerorderdetail)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $customerorderdetail, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.customerorderdetails.index'), ['flash_success' => trans('alerts.backend.customerorderdetails.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteCustomerorderdetailRequestNamespace  $request
     * @param  App\Models\customerorderdetail\Customerorderdetail  $customerorderdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(CustomerOrderDetail $customerorderdetail, DeleteCustomerOrderDetailRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($customerorderdetail);
        //returning with successfull message
        return new RedirectResponse(route('admin.customerorderdetails.index'), ['flash_success' => trans('alerts.backend.customerorderdetails.deleted')]);
    }


    public function getcustomerorder(Request $request)
    {
        $query = $request->get('query','');  
        $posts = Factory::where('name','LIKE','%'.$query.'%')->get();     
        //$posts = '';
        return response()->json($posts);
        //return $posts;
    }


    public function getProduct(Request $request)
    {

        $query = $request->get('query','');  
        $posts = Product::where('name','LIKE','%'.$query.'%')->get();     
        //$posts = '';
        return response()->json($posts);

    }
    
}
