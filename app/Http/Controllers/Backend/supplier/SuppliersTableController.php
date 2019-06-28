<?php

namespace App\Http\Controllers\Backend\supplier;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\supplier\SupplierRepository;
use App\Http\Requests\Backend\supplier\ManageSupplierRequest;

/**
 * Class SuppliersTableController.
 */
class SuppliersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SupplierRepository
     */
    protected $supplier;

    /**
     * contructor to initialize repository object
     * @param SupplierRepository $supplier;
     */
    public function __construct(SupplierRepository $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * This method return the data of the model
     * @param ManageSupplierRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSupplierRequest $request)
    {
        return Datatables::of($this->supplier->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($supplier) {
                return Carbon::parse($supplier->created_at)->toDateString();
            })
            ->addColumn('actions', function ($supplier) {
                return $supplier->action_buttons;
            })
            ->make(true);
    }
}
