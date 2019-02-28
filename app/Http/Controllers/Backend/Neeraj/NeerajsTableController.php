<?php

namespace App\Http\Controllers\Backend\Neeraj;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Neeraj\NeerajRepository;
use App\Http\Requests\Backend\Neeraj\ManageNeerajRequest;

/**
 * Class NeerajsTableController.
 */
class NeerajsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var NeerajRepository
     */
    protected $neeraj;

    /**
     * contructor to initialize repository object
     * @param NeerajRepository $neeraj;
     */
    public function __construct(NeerajRepository $neeraj)
    {
        $this->neeraj = $neeraj;
    }

    /**
     * This method return the data of the model
     * @param ManageNeerajRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageNeerajRequest $request)
    {
        return Datatables::of($this->neeraj->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($neeraj) {
                return Carbon::parse($neeraj->created_at)->toDateString();
            })
            ->addColumn('actions', function ($neeraj) {
                return $neeraj->action_buttons;
            })
            ->make(true);
    }
}
