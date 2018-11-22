<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDivisasAPIRequest;
use App\Http\Requests\API\UpdateDivisasAPIRequest;
use App\Models\Divisas;
use App\Repositories\DivisasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DivisasController
 * @package App\Http\Controllers\API
 */

class DivisasAPIController extends AppBaseController
{
    /** @var  DivisasRepository */
    private $divisasRepository;

    public function __construct(DivisasRepository $divisasRepo)
    {
        $this->divisasRepository = $divisasRepo;
    }

    /**
     * Display a listing of the Divisas.
     * GET|HEAD /divisas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->divisasRepository->pushCriteria(new RequestCriteria($request));
        $this->divisasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $divisas = $this->divisasRepository->all();

        return $this->sendResponse($divisas->toArray(), 'Divisas retrieved successfully');
    }

    /**
     * Store a newly created Divisas in storage.
     * POST /divisas
     *
     * @param CreateDivisasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDivisasAPIRequest $request)
    {
        $input = $request->all();

        $divisas = $this->divisasRepository->create($input);

        return $this->sendResponse($divisas->toArray(), 'Divisas saved successfully');
    }

    /**
     * Display the specified Divisas.
     * GET|HEAD /divisas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Divisas $divisas */
        $divisas = $this->divisasRepository->findWithoutFail($id);

        if (empty($divisas)) {
            return $this->sendError('Divisas not found');
        }

        return $this->sendResponse($divisas->toArray(), 'Divisas retrieved successfully');
    }

    /**
     * Update the specified Divisas in storage.
     * PUT/PATCH /divisas/{id}
     *
     * @param  int $id
     * @param UpdateDivisasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDivisasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Divisas $divisas */
        $divisas = $this->divisasRepository->findWithoutFail($id);

        if (empty($divisas)) {
            return $this->sendError('Divisas not found');
        }

        $divisas = $this->divisasRepository->update($input, $id);

        return $this->sendResponse($divisas->toArray(), 'Divisas updated successfully');
    }

    /**
     * Remove the specified Divisas from storage.
     * DELETE /divisas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Divisas $divisas */
        $divisas = $this->divisasRepository->findWithoutFail($id);

        if (empty($divisas)) {
            return $this->sendError('Divisas not found');
        }

        $divisas->delete();

        return $this->sendResponse($id, 'Divisas deleted successfully');
    }
}
