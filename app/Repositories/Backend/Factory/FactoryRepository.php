<?php

namespace App\Repositories\Backend\Factory;

use DB;
use Carbon\Carbon;
use App\Models\Factory\Factory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FactoryRepository.
 */
class FactoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Factory::class;

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
                config('module.factories.table').'.id',
                config('module.factories.table').'.name',
                config('module.factories.table').'.created_at',
                config('module.factories.table').'.updated_at',
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
        if (Factory::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.factories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Factory $factory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Factory $factory, array $input)
    {
    	if ($factory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.factories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Factory $factory
     * @throws GeneralException
     * @return bool
     */
    public function delete(Factory $factory)
    {
        if ($factory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.factories.delete_error'));
    }
}
