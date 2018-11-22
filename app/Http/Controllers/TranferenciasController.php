<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTranferenciasRequest;
use App\Http\Requests\UpdateTranferenciasRequest;
use App\Repositories\TranferenciasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Cuentas;

class TranferenciasController extends AppBaseController
{
    /** @var  TranferenciasRepository */
    private $tranferenciasRepository;

    public function __construct(TranferenciasRepository $tranferenciasRepo)
    {
        $this->tranferenciasRepository = $tranferenciasRepo;
    }

    /**
     * Display a listing of the Tranferencias.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tranferenciasRepository->pushCriteria(new RequestCriteria($request));
        $tranferencias = $this->tranferenciasRepository->all();

        return view('tranferencias.index')
            ->with('tranferencias', $tranferencias);
    }

    /**
     * Show the form for creating a new Tranferencias.
     *
     * @return Response
     */
    public function create()
    {
        $cuentas = Cuentas::pluck("nombre_beneficiaro", "id")->prepend('Por favor selecciones uno', null);
        return view('tranferencias.create',compact('cuentas'));
    }

    /**
     * Store a newly created Tranferencias in storage.
     *
     * @param CreateTranferenciasRequest $request
     *
     * @return Response
     */
    public function store(CreateTranferenciasRequest $request)
    {
        $input = $request->all();

        $tranferencias = $this->tranferenciasRepository->create($input);

        Flash::success('Tranferencias saved successfully.');

        return redirect(route('tranferencias.index'));
    }

    /**
     * Display the specified Tranferencias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tranferencias = $this->tranferenciasRepository->findWithoutFail($id);

        if (empty($tranferencias)) {
            Flash::error('Tranferencias not found');

            return redirect(route('tranferencias.index'));
        }

        return view('tranferencias.show')->with('tranferencias', $tranferencias);
    }

    /**
     * Show the form for editing the specified Tranferencias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tranferencias = $this->tranferenciasRepository->findWithoutFail($id);
        $cuentas = Cuentas::pluck("nombre_beneficiaro", "id")->prepend('Por favor selecciones uno', null);
        if (empty($tranferencias)) {
            Flash::error('Tranferencias not found');

            return redirect(route('tranferencias.index'));
        }

        return view('tranferencias.edit',compact('tranferencias','cuentas'));
    }

    /**
     * Update the specified Tranferencias in storage.
     *
     * @param  int              $id
     * @param UpdateTranferenciasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTranferenciasRequest $request)
    {
        $tranferencias = $this->tranferenciasRepository->findWithoutFail($id);

        if (empty($tranferencias)) {
            Flash::error('Tranferencias not found');

            return redirect(route('tranferencias.index'));
        }

        $tranferencias = $this->tranferenciasRepository->update($request->all(), $id);

        Flash::success('Tranferencias updated successfully.');

        return redirect(route('tranferencias.index'));
    }

    /**
     * Remove the specified Tranferencias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tranferencias = $this->tranferenciasRepository->findWithoutFail($id);

        if (empty($tranferencias)) {
            Flash::error('Tranferencias not found');

            return redirect(route('tranferencias.index'));
        }

        $this->tranferenciasRepository->delete($id);

        Flash::success('Tranferencias deleted successfully.');

        return redirect(route('tranferencias.index'));
    }
}
