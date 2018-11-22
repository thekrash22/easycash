<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCurrencyHistoryRequest;
use App\Http\Requests\UpdateCurrencyHistoryRequest;
use App\Repositories\CurrencyHistoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\ForeingExchange;

class CurrencyHistoryController extends AppBaseController
{
    /** @var  CurrencyHistoryRepository */
    private $currencyHistoryRepository;

    public function __construct(CurrencyHistoryRepository $currencyHistoryRepo)
    {
        $this->currencyHistoryRepository = $currencyHistoryRepo;
    }

    /**
     * Display a listing of the CurrencyHistory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->currencyHistoryRepository->pushCriteria(new RequestCriteria($request));
        $currencyHistories = $this->currencyHistoryRepository->all();

        return view('currency_histories.index')
            ->with('currencyHistories', $currencyHistories);
    }

    /**
     * Show the form for creating a new CurrencyHistory.
     *
     * @return Response
     */
    public function create()
    {
        $foreingexchange = ForeingExchange::pluck("name", "id")->prepend('Por favor seleccione uno', null);
        return view('currency_histories.create',compact('foreingexchange'));
    }

    /**
     * Store a newly created CurrencyHistory in storage.
     *
     * @param CreateCurrencyHistoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCurrencyHistoryRequest $request)
    {
        $input = $request->all();

        $currencyHistory = $this->currencyHistoryRepository->create($input);

        Flash::success('Currency History saved successfully.');

        return redirect(route('currencyHistories.index'));
    }

    /**
     * Display the specified CurrencyHistory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $currencyHistory = $this->currencyHistoryRepository->findWithoutFail($id);

        if (empty($currencyHistory)) {
            Flash::error('Currency History not found');

            return redirect(route('currencyHistories.index'));
        }

        return view('currency_histories.show')->with('currencyHistory', $currencyHistory);
    }

    /**
     * Show the form for editing the specified CurrencyHistory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $currencyHistory = $this->currencyHistoryRepository->findWithoutFail($id);
        $foreingexchange = ForeingExchange::pluck("name", "id")->prepend('Por favor seleccione uno', null);
        if (empty($currencyHistory)) {
            Flash::error('Currency History not found');

            return redirect(route('currencyHistories.index'));
        }

        return view('currency_histories.edit',compact('foreingexchange','currencyHistory'));
    }

    /**
     * Update the specified CurrencyHistory in storage.
     *
     * @param  int              $id
     * @param UpdateCurrencyHistoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCurrencyHistoryRequest $request)
    {
        $currencyHistory = $this->currencyHistoryRepository->findWithoutFail($id);

        if (empty($currencyHistory)) {
            Flash::error('Currency History not found');

            return redirect(route('currencyHistories.index'));
        }

        $currencyHistory = $this->currencyHistoryRepository->update($request->all(), $id);

        Flash::success('Currency History updated successfully.');

        return redirect(route('currencyHistories.index'));
    }

    /**
     * Remove the specified CurrencyHistory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $currencyHistory = $this->currencyHistoryRepository->findWithoutFail($id);

        if (empty($currencyHistory)) {
            Flash::error('Currency History not found');

            return redirect(route('currencyHistories.index'));
        }

        $this->currencyHistoryRepository->delete($id);

        Flash::success('Currency History deleted successfully.');

        return redirect(route('currencyHistories.index'));
    }
}
