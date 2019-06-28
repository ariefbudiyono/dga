<?php

namespace App\Http\Controllers\Backend\warehouse;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\warehouse\WarehouseRepository;
use App\Http\Requests\Backend\warehouse\ManageWarehouseRequest;

/**
 * Class WarehousesTableController.
 */
class WarehousesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var WarehouseRepository
     */
    protected $warehouse;

    /**
     * contructor to initialize repository object
     * @param WarehouseRepository $warehouse;
     */
    public function __construct(WarehouseRepository $warehouse)
    {
        $this->warehouse = $warehouse;
    }

    /**
     * This method return the data of the model
     * @param ManageWarehouseRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageWarehouseRequest $request)
    {
        return Datatables::of($this->warehouse->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($warehouse) {
                return Carbon::parse($warehouse->created_at)->toDateString();
            })
            ->addColumn('actions', function ($warehouse) {
                return $warehouse->action_buttons;
            })
            ->make(true);
    }
}
