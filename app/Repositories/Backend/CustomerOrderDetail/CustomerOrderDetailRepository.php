<?php

namespace App\Repositories\Backend\CustomerOrderDetail;

use DB;
use Carbon\Carbon;
use App\Models\CustomerOrderDetail\CustomerOrderDetail;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerorderdetailRepository.
 */
class CustomerOrderDetailRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = CustomerOrderDetail::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('module.customerorders.table'), config('module.customerorders.table').'.id', '=', config('module.customerorderdetails.table').'.customer_order_id')
            ->select([
                config('module.customerorderdetails.table').'.id',
                config('module.customerorders.table').'.no_po',
                config('module.customerorderdetails.table').'.created_at',
                config('module.customerorderdetails.table').'.updated_at',
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
        if (CustomerOrderdetail::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.customerorderdetails.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Customerorderdetail $customerorderdetail
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Customerorderdetail $customerorderdetail, array $input)
    {
    	if ($customerorderdetail->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.customerorderdetails.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Customerorderdetail $customerorderdetail
     * @throws GeneralException
     * @return bool
     */
    public function delete(Customerorderdetail $customerorderdetail)
    {
        if ($customerorderdetail->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.customerorderdetails.delete_error'));
    }
}
