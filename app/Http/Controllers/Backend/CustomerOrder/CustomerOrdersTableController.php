<?php

namespace App\Http\Controllers\Backend\CustomerOrder;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\CustomerOrder\CustomerOrderRepository;
use App\Http\Requests\Backend\CustomerOrder\ManageCustomerorderRequest;

/**
 * Class CustomerordersTableController.
 */
class CustomerordersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var CustomerOrderRepository
     */
    protected $customerorder;

    /**
     * contructor to initialize repository object
     * @param CustomerOrderRepository $customerorder;
     */
    public function __construct(CustomerOrderRepository $customerorder)
    {
        $this->customerorder = $customerorder;
    }

    /**
     * This method return the data of the model
     * @param ManageCustomerorderRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCustomerorderRequest $request)
    {
        return Datatables::of($this->customerorder->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($customerorder) {
                return Carbon::parse($customerorder->created_at)->toDateString();
            })
            ->addColumn('actions', function ($customerorder) {
                return $customerorder->action_buttons;
            })
            ->make(true);
    }
}
