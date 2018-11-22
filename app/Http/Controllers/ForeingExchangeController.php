<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateForeingExchangeRequest;
use App\Http\Requests\UpdateForeingExchangeRequest;
use App\Repositories\ForeingExchangeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ForeingExchangeController extends AppBaseController
{
    /** @var  ForeingExchangeRepository */
    private $foreingExchangeRepository;

    public function __construct(ForeingExchangeRepository $foreingExchangeRepo)
    {
        $this->foreingExchangeRepository = $foreingExchangeRepo;
    }

    /**
     * Display a listing of the ForeingExchange.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->foreingExchangeRepository->pushCriteria(new RequestCriteria($request));
        $foreingExchanges = $this->foreingExchangeRepository->all();

        return view('foreing_exchanges.index')
            ->with('foreingExchanges', $foreingExchanges);
    }

    /**
     * Show the form for creating a new ForeingExchange.
     *
     * @return Response
     */
    public function create()
    {
        return view('foreing_exchanges.create');
    }

    /**
     * Store a newly created ForeingExchange in storage.
     *
     * @param CreateForeingExchangeRequest $request
     *
     * @return Response
     */
    public function store(CreateForeingExchangeRequest $request)
    {
        $input = $request->all();

        $foreingExchange = $this->foreingExchangeRepository->create($input);

        Flash::success('Foreing Exchange saved successfully.');

        return redirect(route('foreingExchanges.index'));
    }

    /**
     * Display the specified ForeingExchange.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $foreingExchange = $this->foreingExchangeRepository->findWithoutFail($id);

        if (empty($foreingExchange)) {
            Flash::error('Foreing Exchange not found');

            return redirect(route('foreingExchanges.index'));
        }

        return view('foreing_exchanges.show')->with('foreingExchange', $foreingExchange);
    }

    /**
     * Show the form for editing the specified ForeingExchange.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $foreingExchange = $this->foreingExchangeRepository->findWithoutFail($id);

        if (empty($foreingExchange)) {
            Flash::error('Foreing Exchange not found');

            return redirect(route('foreingExchanges.index'));
        }

        return view('foreing_exchanges.edit')->with('foreingExchange', $foreingExchange);
    }

    /**
     * Update the specified ForeingExchange in storage.
     *
     * @param  int              $id
     * @param UpdateForeingExchangeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateForeingExchangeRequest $request)
    {
        $foreingExchange = $this->foreingExchangeRepository->findWithoutFail($id);

        if (empty($foreingExchange)) {
            Flash::error('Foreing Exchange not found');

            return redirect(route('foreingExchanges.index'));
        }

        $foreingExchange = $this->foreingExchangeRepository->update($request->all(), $id);

        Flash::success('Foreing Exchange updated successfully.');

        return redirect(route('foreingExchanges.index'));
    }

    /**
     * Remove the specified ForeingExchange from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $foreingExchange = $this->foreingExchangeRepository->findWithoutFail($id);

        if (empty($foreingExchange)) {
            Flash::error('Foreing Exchange not found');

            return redirect(route('foreingExchanges.index'));
        }

        $this->foreingExchangeRepository->delete($id);

        Flash::success('Foreing Exchange deleted successfully.');

        return redirect(route('foreingExchanges.index'));
    }
}
