<?php

namespace App\Http\Controllers\Backend\purchaseorder;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\purchaseorder\PurchaseorderRepository;
use App\Http\Requests\Backend\purchaseorder\ManagePurchaseorderRequest;

/**
 * Class PurchaseordersTableController.
 */
class PurchaseordersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PurchaseorderRepository
     */
    protected $purchaseorder;

    /**
     * contructor to initialize repository object
     * @param PurchaseorderRepository $purchaseorder;
     */
    public function __construct(PurchaseorderRepository $purchaseorder)
    {
        $this->purchaseorder = $purchaseorder;
    }

    /**
     * This method return the data of the model
     * @param ManagePurchaseorderRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePurchaseorderRequest $request)
    {
        return Datatables::of($this->purchaseorder->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($purchaseorder) {
                return Carbon::parse($purchaseorder->created_at)->toDateString();
            })
            ->addColumn('actions', function ($purchaseorder) {
                return $purchaseorder->action_buttons;
            })
            ->make(true);
    }
}
