<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTranferenciasAPIRequest;
use App\Http\Requests\API\UpdateTranferenciasAPIRequest;
use App\Models\Tranferencias;
use App\Repositories\TranferenciasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TranferenciasController
 * @package App\Http\Controllers\API
 */

class TranferenciasAPIController extends AppBaseController
{
    /** @var  TranferenciasRepository */
    private $tranferenciasRepository;

    public function __construct(TranferenciasRepository $tranferenciasRepo)
    {
        $this->tranferenciasRepository = $tranferenciasRepo;
    }

    /**
     * Display a listing of the Tranferencias.
     * GET|HEAD /tranferencias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tranferenciasRepository->pushCriteria(new RequestCriteria($request));
        $this->tranferenciasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tranferencias = $this->tranferenciasRepository->all();

        return $this->sendResponse($tranferencias->toArray(), 'Tranferencias retrieved successfully');
    }

    /**
     * Store a newly created Tranferencias in storage.
     * POST /tranferencias
     *
     * @param CreateTranferenciasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTranferenciasAPIRequest $request)
    {
        $input = $request->all();

        $tranferencias = $this->tranferenciasRepository->create($input);

        return $this->sendResponse($tranferencias->toArray(), 'Tranferencias saved successfully');
    }

    /**
     * Display the specified Tranferencias.
     * GET|HEAD /tranferencias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tranferencias $tranferencias */
        $tranferencias = $this->tranferenciasRepository->findWithoutFail($id);

        if (empty($tranferencias)) {
            return $this->sendError('Tranferencias not found');
        }

        return $this->sendResponse($tranferencias->toArray(), 'Tranferencias retrieved successfully');
    }

    /**
     * Update the specified Tranferencias in storage.
     * PUT/PATCH /tranferencias/{id}
     *
     * @param  int $id
     * @param UpdateTranferenciasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTranferenciasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tranferencias $tranferencias */
        $tranferencias = $this->tranferenciasRepository->findWithoutFail($id);

        if (empty($tranferencias)) {
            return $this->sendError('Tranferencias not found');
        }

        $tranferencias = $this->tranferenciasRepository->update($input, $id);

        return $this->sendResponse($tranferencias->toArray(), 'Tranferencias updated successfully');
    }

    /**
     * Remove the specified Tranferencias from storage.
     * DELETE /tranferencias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tranferencias $tranferencias */
        $tranferencias = $this->tranferenciasRepository->findWithoutFail($id);

        if (empty($tranferencias)) {
            return $this->sendError('Tranferencias not found');
        }

        $tranferencias->delete();

        return $this->sendResponse($id, 'Tranferencias deleted successfully');
    }
}
