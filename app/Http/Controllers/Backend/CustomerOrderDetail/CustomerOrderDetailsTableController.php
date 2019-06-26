<?php

namespace App\Http\Controllers\Backend\customerorderdetail;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\CustomerOrderDetail\CustomerOrderDetailRepository;
use App\Http\Requests\Backend\CustomerOrderDetail\ManageCustomerOrderDetailRequest;

/**
 * Class CustomerorderdetailsTableController.
 */
class CustomerOrderDetailsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var CustomerorderdetailRepository
     */
    protected $customerorderdetail;

    /**
     * contructor to initialize repository object
     * @param CustomerorderdetailRepository $customerorderdetail;
     */
    public function __construct(CustomerOrderDetailRepository $customerorderdetail)
    {
        $this->customerorderdetail = $customerorderdetail;
    }

    /**
     * This method return the data of the model
     * @param ManageCustomerorderdetailRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCustomerOrderDetailRequest $request)
    {
        return Datatables::of($this->customerorderdetail->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($customerorderdetail) {
                return Carbon::parse($customerorderdetail->created_at)->toDateString();
            })
            ->addColumn('actions', function ($customerorderdetail) {
                return $customerorderdetail->action_buttons;
            })
            ->make(true);
    }
}
