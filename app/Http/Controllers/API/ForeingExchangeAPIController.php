<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateForeingExchangeAPIRequest;
use App\Http\Requests\API\UpdateForeingExchangeAPIRequest;
use App\Models\ForeingExchange;
use App\Repositories\ForeingExchangeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ForeingExchangeController
 * @package App\Http\Controllers\API
 */

class ForeingExchangeAPIController extends AppBaseController
{
    /** @var  ForeingExchangeRepository */
    private $foreingExchangeRepository;

    public function __construct(ForeingExchangeRepository $foreingExchangeRepo)
    {
        $this->foreingExchangeRepository = $foreingExchangeRepo;
    }

    /**
     * Display a listing of the ForeingExchange.
     * GET|HEAD /foreingExchanges
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->foreingExchangeRepository->pushCriteria(new RequestCriteria($request));
        $this->foreingExchangeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $foreingExchanges = $this->foreingExchangeRepository->all();

        return $this->sendResponse($foreingExchanges->toArray(), 'Foreing Exchanges retrieved successfully');
    }

    /**
     * Store a newly created ForeingExchange in storage.
     * POST /foreingExchanges
     *
     * @param CreateForeingExchangeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateForeingExchangeAPIRequest $request)
    {
        $input = $request->all();

        $foreingExchanges = $this->foreingExchangeRepository->create($input);

        return $this->sendResponse($foreingExchanges->toArray(), 'Foreing Exchange saved successfully');
    }

    /**
     * Display the specified ForeingExchange.
     * GET|HEAD /foreingExchanges/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ForeingExchange $foreingExchange */
        $foreingExchange = $this->foreingExchangeRepository->findWithoutFail($id);

        if (empty($foreingExchange)) {
            return $this->sendError('Foreing Exchange not found');
        }

        return $this->sendResponse($foreingExchange->toArray(), 'Foreing Exchange retrieved successfully');
    }

    /**
     * Update the specified ForeingExchange in storage.
     * PUT/PATCH /foreingExchanges/{id}
     *
     * @param  int $id
     * @param UpdateForeingExchangeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateForeingExchangeAPIRequest $request)
    {
        $input = $request->all();

        /** @var ForeingExchange $foreingExchange */
        $foreingExchange = $this->foreingExchangeRepository->findWithoutFail($id);

        if (empty($foreingExchange)) {
            return $this->sendError('Foreing Exchange not found');
        }

        $foreingExchange = $this->foreingExchangeRepository->update($input, $id);

        return $this->sendResponse($foreingExchange->toArray(), 'ForeingExchange updated successfully');
    }

    /**
     * Remove the specified ForeingExchange from storage.
     * DELETE /foreingExchanges/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ForeingExchange $foreingExchange */
        $foreingExchange = $this->foreingExchangeRepository->findWithoutFail($id);

        if (empty($foreingExchange)) {
            return $this->sendError('Foreing Exchange not found');
        }

        $foreingExchange->delete();

        return $this->sendResponse($id, 'Foreing Exchange deleted successfully');
    }
}
