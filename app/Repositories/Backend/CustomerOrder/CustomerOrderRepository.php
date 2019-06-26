<?php

namespace App\Repositories\Backend\CustomerOrder;

use DB;
use Carbon\Carbon;
use App\Models\CustomerOrder\Customerorder;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerOrderRepository.
 */
class CustomerOrderRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Customerorder::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('module.factories.table'), config('module.factories.table').'.id', '=', config('module.customerorders.table').'.factory_id')
            ->select([
                config('module.customerorders.table').'.id',
                config('module.factories.table').'.name as factory',
                config('module.customerorders.table').'.no_po',
                config('module.customerorders.table').'.tgl',                
                config('module.customerorders.table').'.created_at',
                config('module.customerorders.table').'.updated_at',
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
         $tgl = date('Y-m-d',strtotime($input['tgl']));
         $input['tgl'] = $tgl;
        //$input['tgl'] = Carbon::parse($input['tgl']);
        if (Customerorder::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.customerorders.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Customerorder $customerorder
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(CustomerOrder $customerorder, array $input)
    {
         $tgl = date('Y-m-d',strtotime($input['tgl']));
         $input['tgl'] = $tgl;
        //$input['tgl'] = Carbon::parse($input['tgl'])->toDateString();
    	if ($customerorder->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.customerorders.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Customerorder $customerorder
     * @throws GeneralException
     * @return bool
     */
    public function delete(Customerorder $customerorder)
    {
        if ($customerorder->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.customerorders.delete_error'));
    }
}
