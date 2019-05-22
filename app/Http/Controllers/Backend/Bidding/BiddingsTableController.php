<?php

namespace App\Http\Controllers\Backend\Bidding;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Bidding\BiddingRepository;
use App\Http\Requests\Backend\Bidding\ManageBiddingRequest;

/**
 * Class BiddingsTableController.
 */
class BiddingsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BiddingRepository
     */
    protected $bidding;

    /**
     * contructor to initialize repository object
     * @param BiddingRepository $bidding;
     */
    public function __construct(BiddingRepository $bidding)
    {
        $this->bidding = $bidding;
    }

    /**
     * This method return the data of the model
     * @param ManageBiddingRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBiddingRequest $request)
    {
        return Datatables::of($this->bidding->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($bidding) {
                return Carbon::parse($bidding->created_at)->toDateString();
            })
            ->addColumn('actions', function ($bidding) {
                return $bidding->action_buttons;
            })
            ->make(true);
    }
}
