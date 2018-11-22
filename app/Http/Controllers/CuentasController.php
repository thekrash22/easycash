<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCuentasRequest;
use App\Http\Requests\UpdateCuentasRequest;
use App\Repositories\CuentasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CuentasController extends AppBaseController
{
    /** @var  CuentasRepository */
    private $cuentasRepository;

    public function __construct(CuentasRepository $cuentasRepo)
    {
        $this->cuentasRepository = $cuentasRepo;
    }

    /**
     * Display a listing of the Cuentas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cuentasRepository->pushCriteria(new RequestCriteria($request));
        $cuentas = $this->cuentasRepository->all();

        return view('cuentas.index')
            ->with('cuentas', $cuentas);
    }

    /**
     * Show the form for creating a new Cuentas.
     *
     * @return Response
     */
    public function create()
    {
        return view('cuentas.create');
    }

    /**
     * Store a newly created Cuentas in storage.
     *
     * @param CreateCuentasRequest $request
     *
     * @return Response
     */
    public function store(CreateCuentasRequest $request)
    {
        $input = $request->all();

        $cuentas = $this->cuentasRepository->create($input);

        Flash::success('Cuentas saved successfully.');

        return redirect(route('cuentas.index'));
    }

    /**
     * Display the specified Cuentas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cuentas = $this->cuentasRepository->findWithoutFail($id);

        if (empty($cuentas)) {
            Flash::error('Cuentas not found');

            return redirect(route('cuentas.index'));
        }

        return view('cuentas.show')->with('cuentas', $cuentas);
    }

    /**
     * Show the form for editing the specified Cuentas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cuentas = $this->cuentasRepository->findWithoutFail($id);

        if (empty($cuentas)) {
            Flash::error('Cuentas not found');

            return redirect(route('cuentas.index'));
        }

        return view('cuentas.edit')->with('cuentas', $cuentas);
    }

    /**
     * Update the specified Cuentas in storage.
     *
     * @param  int              $id
     * @param UpdateCuentasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCuentasRequest $request)
    {
        $cuentas = $this->cuentasRepository->findWithoutFail($id);

        if (empty($cuentas)) {
            Flash::error('Cuentas not found');

            return redirect(route('cuentas.index'));
        }

        $cuentas = $this->cuentasRepository->update($request->all(), $id);

        Flash::success('Cuentas updated successfully.');

        return redirect(route('cuentas.index'));
    }

    /**
     * Remove the specified Cuentas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cuentas = $this->cuentasRepository->findWithoutFail($id);

        if (empty($cuentas)) {
            Flash::error('Cuentas not found');

            return redirect(route('cuentas.index'));
        }

        $this->cuentasRepository->delete($id);

        Flash::success('Cuentas deleted successfully.');

        return redirect(route('cuentas.index'));
    }
}
