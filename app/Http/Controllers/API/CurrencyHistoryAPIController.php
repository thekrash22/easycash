<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCurrencyHistoryAPIRequest;
use App\Http\Requests\API\UpdateCurrencyHistoryAPIRequest;
use App\Models\CurrencyHistory;
use App\Repositories\CurrencyHistoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CurrencyHistoryController
 * @package App\Http\Controllers\API
 */

class CurrencyHistoryAPIController extends AppBaseController
{
    /** @var  CurrencyHistoryRepository */
    private $currencyHistoryRepository;

    public function __construct(CurrencyHistoryRepository $currencyHistoryRepo)
    {
        $this->currencyHistoryRepository = $currencyHistoryRepo;
    }

    /**
     * Display a listing of the CurrencyHistory.
     * GET|HEAD /currencyHistories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->currencyHistoryRepository->pushCriteria(new RequestCriteria($request));
        $this->currencyHistoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $currencyHistories = $this->currencyHistoryRepository->all();

        return $this->sendResponse($currencyHistories->toArray(), 'Currency Histories retrieved successfully');
    }

    /**
     * Store a newly created CurrencyHistory in storage.
     * POST /currencyHistories
     *
     * @param CreateCurrencyHistoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCurrencyHistoryAPIRequest $request)
    {
        $input = $request->all();

        $currencyHistories = $this->currencyHistoryRepository->create($input);

        return $this->sendResponse($currencyHistories->toArray(), 'Currency History saved successfully');
    }

    /**
     * Display the specified CurrencyHistory.
     * GET|HEAD /currencyHistories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CurrencyHistory $currencyHistory */
        $currencyHistory = $this->currencyHistoryRepository->findWithoutFail($id);

        if (empty($currencyHistory)) {
            return $this->sendError('Currency History not found');
        }

        return $this->sendResponse($currencyHistory->toArray(), 'Currency History retrieved successfully');
    }

    /**
     * Update the specified CurrencyHistory in storage.
     * PUT/PATCH /currencyHistories/{id}
     *
     * @param  int $id
     * @param UpdateCurrencyHistoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCurrencyHistoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var CurrencyHistory $currencyHistory */
        $currencyHistory = $this->currencyHistoryRepository->findWithoutFail($id);

        if (empty($currencyHistory)) {
            return $this->sendError('Currency History not found');
        }

        $currencyHistory = $this->currencyHistoryRepository->update($input, $id);

        return $this->sendResponse($currencyHistory->toArray(), 'CurrencyHistory updated successfully');
    }

    /**
     * Remove the specified CurrencyHistory from storage.
     * DELETE /currencyHistories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CurrencyHistory $currencyHistory */
        $currencyHistory = $this->currencyHistoryRepository->findWithoutFail($id);

        if (empty($currencyHistory)) {
            return $this->sendError('Currency History not found');
        }

        $currencyHistory->delete();

        return $this->sendResponse($id, 'Currency History deleted successfully');
    }
}
