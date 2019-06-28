<?php

namespace App\Repositories\Backend\purchaseorder;

use DB;
use Carbon\Carbon;
use App\Models\purchaseorder\Purchaseorder;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseorderRepository.
 */
class PurchaseorderRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Purchaseorder::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
        ->leftjoin(config('module.suppliers.table'), config('module.suppliers.table').'.id', '=', config('module.purchaseorders.table').'.supplier_id')
            ->select([
                config('module.purchaseorders.table').'.id',
                config('module.suppliers.table').'.name as supplier',
                config('module.purchaseorders.table').'.po_code',
                config('module.purchaseorders.table').'.tgl',
                config('module.purchaseorders.table').'.partial_first_delivery',
                //config('module.purchaseorders.table').'.created_at',
                config('module.purchaseorders.table').'.updated_at',
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
        if (Purchaseorder::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.purchaseorders.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Purchaseorder $purchaseorder
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Purchaseorder $purchaseorder, array $input)
    {
    	if ($purchaseorder->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.purchaseorders.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Purchaseorder $purchaseorder
     * @throws GeneralException
     * @return bool
     */
    public function delete(Purchaseorder $purchaseorder)
    {
        if ($purchaseorder->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.purchaseorders.delete_error'));
    }
}
