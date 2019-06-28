<?php

namespace App\Repositories\Backend\supplier;

use DB;
use Carbon\Carbon;
use App\Models\supplier\Supplier;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierRepository.
 */
class SupplierRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Supplier::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.suppliers.table').'.id',
                config('module.suppliers.table').'.name',
                config('module.suppliers.table').'.created_at',
                config('module.suppliers.table').'.updated_at',
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
        if (Supplier::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.suppliers.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Supplier $supplier
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Supplier $supplier, array $input)
    {
    	if ($supplier->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.suppliers.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Supplier $supplier
     * @throws GeneralException
     * @return bool
     */
    public function delete(Supplier $supplier)
    {
        if ($supplier->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.suppliers.delete_error'));
    }
}
