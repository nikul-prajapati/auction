<?php

namespace App\Http\Controllers\Backend\Bid;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Bid\BidRepository;
use App\Http\Requests\Backend\Bid\ManageBidRequest;

/**
 * Class BidsTableController.
 */
class BidsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BidRepository
     */
    protected $bid;

    /**
     * contructor to initialize repository object
     * @param BidRepository $bid;
     */
    public function __construct(BidRepository $bid)
    {
        $this->bid = $bid;
    }

    /**
     * This method return the data of the model
     * @param ManageBidRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBidRequest $request)
    {
        return Datatables::of($this->bid->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($bid) {
                return Carbon::parse($bid->created_at)->toDateString();
            })
            ->addColumn('actions', function ($bid) {
                return $bid->action_buttons;
            })
            ->make(true);
    }
}
