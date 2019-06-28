<?php

namespace App\Repositories\Backend\purchaseorderdetail;

use DB;
use Carbon\Carbon;
use App\Models\purchaseorderdetail\Purchaseorderdetail;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseorderdetailRepository.
 */
class PurchaseorderdetailRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Purchaseorderdetail::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
        ->leftjoin(config('module.purchaseorders.table'), config('module.purchaseorders.table').'.id', '=', config('module.purchaseorderdetails.table').'.purchase_order_id')        
        ->leftjoin(config('module.products.table'), config('module.products.table').'.id', '=', config('module.purchaseorderdetails.table').'.product_id')        
            ->select([
                config('module.purchaseorderdetails.table').'.id',
                config('module.purchaseorders.table').'.po_code',
                config('module.products.table').'.name as product',
                config('module.purchaseorderdetails.table').'.qty',
                config('module.purchaseorderdetails.table').'.unit_price',
                config('module.purchaseorderdetails.table').'.amount',
                
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Purchaseorderdetail::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.purchaseorderdetails.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Purchaseorderdetail $purchaseorderdetail
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Purchaseorderdetail $purchaseorderdetail, array $input)
    {
    	if ($purchaseorderdetail->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.purchaseorderdetails.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Purchaseorderdetail $purchaseorderdetail
     * @throws GeneralException
     * @return bool
     */
    public function delete(Purchaseorderdetail $purchaseorderdetail)
    {
        if ($purchaseorderdetail->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.purchaseorderdetails.delete_error'));
    }
}
