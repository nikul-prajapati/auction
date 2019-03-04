<?php

namespace App\Http\Controllers\Backend\Detail;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Detail\DetailRepository;
use App\Http\Requests\Backend\Detail\ManageDetailRequest;

/**
 * Class DetailsTableController.
 */
class DetailsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var DetailRepository
     */
    protected $detail;

    /**
     * contructor to initialize repository object
     * @param DetailRepository $detail;
     */
    public function __construct(DetailRepository $detail)
    {
        $this->detail = $detail;
    }

    /**
     * This method return the data of the model
     * @param ManageDetailRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageDetailRequest $request)
    {
        return Datatables::of($this->detail->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($detail) {
                return Carbon::parse($detail->created_at)->toDateString();
            })
            ->addColumn('actions', function ($detail) {
                return $detail->action_buttons;
            })
            ->make(true);
    }
}
