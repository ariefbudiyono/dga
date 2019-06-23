<?php

namespace App\Http\Controllers\Backend\product;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\product\ProductRepository;
use App\Http\Requests\Backend\product\ManageProductRequest;

/**
 * Class ProductsTableController.
 */
class ProductsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductRepository
     */
    protected $product;

    /**
     * contructor to initialize repository object
     * @param ProductRepository $product;
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * This method return the data of the model
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductRequest $request)
    {
        return Datatables::of($this->product->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('name', function ($product) {
                return $product->name;
            })
            
            ->addColumn('created_at', function ($product) {
                return Carbon::parse($product->created_at)->toDateString();
            })
            ->addColumn('actions', function ($product) {
                return $product->action_buttons;
            })
            ->make(true);
    }
}
