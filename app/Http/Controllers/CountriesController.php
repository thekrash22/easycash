<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountriesRequest;
use App\Http\Requests\UpdateCountriesRequest;
use App\Repositories\CountriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CountriesController extends AppBaseController
{
    /** @var  CountriesRepository */
    private $countriesRepository;

    public function __construct(CountriesRepository $countriesRepo)
    {
        $this->countriesRepository = $countriesRepo;
    }

    /**
     * Display a listing of the Countries.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->countriesRepository->pushCriteria(new RequestCriteria($request));
        $countries = $this->countriesRepository->all();

        return view('countries.index')
            ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new Countries.
     *
     * @return Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created Countries in storage.
     *
     * @param CreateCountriesRequest $request
     *
     * @return Response
     */
    public function store(CreateCountriesRequest $request)
    {
        $input = $request->all();

        $countries = $this->countriesRepository->create($input);

        Flash::success('Countries saved successfully.');

        return redirect(route('countries.index'));
    }

    /**
     * Display the specified Countries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        return view('countries.show')->with('countries', $countries);
    }

    /**
     * Show the form for editing the specified Countries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        return view('countries.edit')->with('countries', $countries);
    }

    /**
     * Update the specified Countries in storage.
     *
     * @param  int              $id
     * @param UpdateCountriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountriesRequest $request)
    {
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        $countries = $this->countriesRepository->update($request->all(), $id);

        Flash::success('Countries updated successfully.');

        return redirect(route('countries.index'));
    }

    /**
     * Remove the specified Countries from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        $this->countriesRepository->delete($id);

        Flash::success('Countries deleted successfully.');

        return redirect(route('countries.index'));
    }
}
