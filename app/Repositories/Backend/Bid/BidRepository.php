<?php

namespace App\Repositories\Backend\Bid;

use DB;
use Carbon\Carbon;
use App\Models\Bid\Bid;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BidRepository.
 */
class BidRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Bid::class;

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
                config('module.bids.table').'.id',
                config('module.bids.table').'.created_at',
                config('module.bids.table').'.updated_at',
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
        if (Bid::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.bids.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Bid $bid
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Bid $bid, array $input)
    {
    	if ($bid->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.bids.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Bid $bid
     * @throws GeneralException
     * @return bool
     */
    public function delete(Bid $bid)
    {
        if ($bid->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.bids.delete_error'));
    }
}
