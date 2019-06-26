<?php

namespace App\Http\Controllers\Backend\factory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\factory\FactoryRepository;
use App\Http\Requests\Backend\factory\ManageFactoryRequest;

/**
 * Class FactoriesTableController.
 */
class FactoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var FactoryRepository
     */
    protected $factory;

    /**
     * contructor to initialize repository object
     * @param FactoryRepository $factory;
     */
    public function __construct(FactoryRepository $factory)
    {
        $this->factory = $factory;
    }

    /**
     * This method return the data of the model
     * @param ManageFactoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageFactoryRequest $request)
    {
        return Datatables::of($this->factory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($factory) {
                return Carbon::parse($factory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($factory) {
                return $factory->action_buttons;
            })
            ->make(true);
    }
}
