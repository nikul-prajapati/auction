<?php

namespace App\Http\Controllers\Backend\Select_Captain;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Select_Captain\SelectcaptainRepository;
use App\Http\Requests\Backend\Select_Captain\ManageSelectcaptainRequest;

/**
 * Class SelectcaptainsTableController.
 */
class SelectcaptainsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SelectcaptainRepository
     */
    protected $selectcaptain;

    /**
     * contructor to initialize repository object
     * @param SelectcaptainRepository $selectcaptain;
     */
    public function __construct(SelectcaptainRepository $selectcaptain)
    {
        $this->selectcaptain = $selectcaptain;
    }

    /**
     * This method return the data of the model
     * @param ManageSelectcaptainRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSelectcaptainRequest $request)
    {
        return Datatables::of($this->selectcaptain->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($selectcaptain) {
                return Carbon::parse($selectcaptain->created_at)->toDateString();
            })
            ->addColumn('actions', function ($selectcaptain) {
                return $selectcaptain->action_buttons;
            })
            ->make(true);
    }
}
