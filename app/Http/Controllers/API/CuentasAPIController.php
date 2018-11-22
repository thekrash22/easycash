<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCuentasAPIRequest;
use App\Http\Requests\API\UpdateCuentasAPIRequest;
use App\Models\Cuentas;
use App\Repositories\CuentasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CuentasController
 * @package App\Http\Controllers\API
 */

class CuentasAPIController extends AppBaseController
{
    /** @var  CuentasRepository */
    private $cuentasRepository;

    public function __construct(CuentasRepository $cuentasRepo)
    {
        $this->cuentasRepository = $cuentasRepo;
    }

    /**
     * Display a listing of the Cuentas.
     * GET|HEAD /cuentas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cuentasRepository->pushCriteria(new RequestCriteria($request));
        $this->cuentasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cuentas = $this->cuentasRepository->all();

        return $this->sendResponse($cuentas->toArray(), 'Cuentas retrieved successfully');
    }

    /**
     * Store a newly created Cuentas in storage.
     * POST /cuentas
     *
     * @param CreateCuentasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCuentasAPIRequest $request)
    {
        $input = $request->all();

        $cuentas = $this->cuentasRepository->create($input);

        return $this->sendResponse($cuentas->toArray(), 'Cuentas saved successfully');
    }

    /**
     * Display the specified Cuentas.
     * GET|HEAD /cuentas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cuentas $cuentas */
        $cuentas = $this->cuentasRepository->findWithoutFail($id);

        if (empty($cuentas)) {
            return $this->sendError('Cuentas not found');
        }

        return $this->sendResponse($cuentas->toArray(), 'Cuentas retrieved successfully');
    }

    /**
     * Update the specified Cuentas in storage.
     * PUT/PATCH /cuentas/{id}
     *
     * @param  int $id
     * @param UpdateCuentasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCuentasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cuentas $cuentas */
        $cuentas = $this->cuentasRepository->findWithoutFail($id);

        if (empty($cuentas)) {
            return $this->sendError('Cuentas not found');
        }

        $cuentas = $this->cuentasRepository->update($input, $id);

        return $this->sendResponse($cuentas->toArray(), 'Cuentas updated successfully');
    }

    /**
     * Remove the specified Cuentas from storage.
     * DELETE /cuentas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cuentas $cuentas */
        $cuentas = $this->cuentasRepository->findWithoutFail($id);

        if (empty($cuentas)) {
            return $this->sendError('Cuentas not found');
        }

        $cuentas->delete();

        return $this->sendResponse($id, 'Cuentas deleted successfully');
    }
}
