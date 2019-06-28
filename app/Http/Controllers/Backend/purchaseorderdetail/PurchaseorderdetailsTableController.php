<?php

namespace App\Http\Controllers\Backend\purchaseorderdetail;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\purchaseorderdetail\PurchaseorderdetailRepository;
use App\Http\Requests\Backend\purchaseorderdetail\ManagePurchaseorderdetailRequest;

/**
 * Class PurchaseorderdetailsTableController.
 */
class PurchaseorderdetailsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PurchaseorderdetailRepository
     */
    protected $purchaseorderdetail;

    /**
     * contructor to initialize repository object
     * @param PurchaseorderdetailRepository $purchaseorderdetail;
     */
    public function __construct(PurchaseorderdetailRepository $purchaseorderdetail)
    {
        $this->purchaseorderdetail = $purchaseorderdetail;
    }

    /**
     * This method return the data of the model
     * @param ManagePurchaseorderdetailRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePurchaseorderdetailRequest $request)
    {
        return Datatables::of($this->purchaseorderdetail->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($purchaseorderdetail) {
                return Carbon::parse($purchaseorderdetail->created_at)->toDateString();
            })
            ->addColumn('actions', function ($purchaseorderdetail) {
                return $purchaseorderdetail->action_buttons;
            })
            ->make(true);
    }
}
