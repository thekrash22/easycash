<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDivisasRequest;
use App\Http\Requests\UpdateDivisasRequest;
use App\Repositories\DivisasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DivisasController extends AppBaseController
{
    /** @var  DivisasRepository */
    private $divisasRepository;

    public function __construct(DivisasRepository $divisasRepo)
    {
        $this->divisasRepository = $divisasRepo;
    }

    /**
     * Display a listing of the Divisas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->divisasRepository->pushCriteria(new RequestCriteria($request));
        $divisas = $this->divisasRepository->all();

        return view('divisas.index')
            ->with('divisas', $divisas);
    }

    /**
     * Show the form for creating a new Divisas.
     *
     * @return Response
     */
    public function create()
    {
        return view('divisas.create');
    }

    /**
     * Store a newly created Divisas in storage.
     *
     * @param CreateDivisasRequest $request
     *
     * @return Response
     */
    public function store(CreateDivisasRequest $request)
    {
        $input = $request->all();

        $divisas = $this->divisasRepository->create($input);

        Flash::success('Divisas saved successfully.');

        return redirect(route('divisas.index'));
    }

    /**
     * Display the specified Divisas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $divisas = $this->divisasRepository->findWithoutFail($id);

        if (empty($divisas)) {
            Flash::error('Divisas not found');

            return redirect(route('divisas.index'));
        }

        return view('divisas.show')->with('divisas', $divisas);
    }

    /**
     * Show the form for editing the specified Divisas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $divisas = $this->divisasRepository->findWithoutFail($id);

        if (empty($divisas)) {
            Flash::error('Divisas not found');

            return redirect(route('divisas.index'));
        }

        return view('divisas.edit')->with('divisas', $divisas);
    }

    /**
     * Update the specified Divisas in storage.
     *
     * @param  int              $id
     * @param UpdateDivisasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDivisasRequest $request)
    {
        $divisas = $this->divisasRepository->findWithoutFail($id);

        if (empty($divisas)) {
            Flash::error('Divisas not found');

            return redirect(route('divisas.index'));
        }

        $divisas = $this->divisasRepository->update($request->all(), $id);

        Flash::success('Divisas updated successfully.');

        return redirect(route('divisas.index'));
    }

    /**
     * Remove the specified Divisas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $divisas = $this->divisasRepository->findWithoutFail($id);

        if (empty($divisas)) {
            Flash::error('Divisas not found');

            return redirect(route('divisas.index'));
        }

        $this->divisasRepository->delete($id);

        Flash::success('Divisas deleted successfully.');

        return redirect(route('divisas.index'));
    }
}
