<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssignmentsRequest;
use App\Http\Requests\UpdateAssignmentsRequest;
use App\Repositories\AssignmentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Transaction;
use DB;
use Auth;

class AssignmentsController extends AppBaseController
{
    /** @var  AssignmentsRepository */
    private $assignmentsRepository;

    public function __construct(AssignmentsRepository $assignmentsRepo)
    {
        $this->assignmentsRepository = $assignmentsRepo;
    }

    /**
     * Display a listing of the Assignments.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /*$mias = DB::table('assignments')
                    ->leftJoin('transactions','transactions.id','=','assignments.transaction_id')
                    ->where('users_id','=',Auth::user()->id)
                    ->where('transactions.statuses_id','<>',3)
                    ->where('transactions.statuses_id','<>',4)
                    ->select('transactions.amount','transactions.id')
                    ->get();*/
        
        $asa =  DB::table('assignments')
                            ->rightJoin('transactions','transactions.id','=','assignments.transaction_id')
                            ->where('users_id','=',null)
                            ->where('transactions.statuses_id','<>',3)
                            ->where('transactions.statuses_id','<>',4)
                            ->get();
                            
        $disponibles = Transaction::leftJoin('assignments','transactions.id','=','assignments.transaction_id')
                        ->where('users_id','=',null)
                        ->where('transactions.statuses_id','<>',3)
                        ->where('transactions.statuses_id','<>',4)
                        ->select('transactions.*')
                        ->get();
        
        $mias = Transaction::rightJoin('assignments','transactions.id','=','assignments.transaction_id')
                    ->where('users_id','=',Auth::user()->id)
                    ->where('transactions.statuses_id','<>',3)
                    ->where('transactions.statuses_id','<>',4)
                    ->select('transactions.*')
                    ->get();
        //dd($disponibles);
        return view('assignments.index',compact('disponibles','mias'));
    }

    /**
     * Show the form for creating a new Assignments.
     *
     * @return Response
     */
    public function create()
    {
        return view('assignments.create');
    }

    /**
     * Store a newly created Assignments in storage.
     *
     * @param CreateAssignmentsRequest $request
     *
     * @return Response
     */
    public function store(CreateAssignmentsRequest $request)
    {
        $input = $request->all();

        $assignments = $this->assignmentsRepository->create($input);

        Flash::success('Assignments saved successfully.');

        return redirect(route('assignments.index'));
    }

    /**
     * Display the specified Assignments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $assignments = $this->assignmentsRepository->findWithoutFail($id);

        if (empty($assignments)) {
            Flash::error('Assignments not found');

            return redirect(route('assignments.index'));
        }

        return view('assignments.show')->with('assignments', $assignments);
    }

    /**
     * Show the form for editing the specified Assignments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $assignments = $this->assignmentsRepository->findWithoutFail($id);

        if (empty($assignments)) {
            Flash::error('Assignments not found');

            return redirect(route('assignments.index'));
        }

        return view('assignments.edit')->with('assignments', $assignments);
    }

    /**
     * Update the specified Assignments in storage.
     *
     * @param  int              $id
     * @param UpdateAssignmentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssignmentsRequest $request)
    {
        $assignments = $this->assignmentsRepository->findWithoutFail($id);

        if (empty($assignments)) {
            Flash::error('Assignments not found');

            return redirect(route('assignments.index'));
        }

        $assignments = $this->assignmentsRepository->update($request->all(), $id);

        Flash::success('Assignments updated successfully.');

        return redirect(route('assignments.index'));
    }

    /**
     * Remove the specified Assignments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $assignments = $this->assignmentsRepository->findWithoutFail($id);

        if (empty($assignments)) {
            Flash::error('Assignments not found');

            return redirect(route('assignments.index'));
        }

        $this->assignmentsRepository->delete($id);

        Flash::success('Assignments deleted successfully.');

        return redirect(route('assignments.index'));
    }
    public function atender(Request $request){
        $transaccion = Transaction::find($request->id);
        //dd($transaccion->assignments->first());
        if(!$transaccion->assignments->first())
        {
            $input['transaction_id'] = $request->id;
            $input['users_id'] = Auth::user()->id;
            $assignments = $this->assignmentsRepository->create($input);
            $transaccion->statuses_id = 2;
            $transaccion->save();
            Flash::success('Tomado.');
            
        }
        else{
            Flash::error('Otro lo tomo antes.');
            
        }
        return redirect(route('assignments.index'));
    }
}
