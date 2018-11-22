<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCountriesAPIRequest;
use App\Http\Requests\API\UpdateCountriesAPIRequest;
use App\Models\Countries;
use App\Repositories\CountriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CountriesController
 * @package App\Http\Controllers\API
 */

class CountriesAPIController extends AppBaseController
{
    /** @var  CountriesRepository */
    private $countriesRepository;

    public function __construct(CountriesRepository $countriesRepo)
    {
        $this->countriesRepository = $countriesRepo;
    }

    /**
     * Display a listing of the Countries.
     * GET|HEAD /countries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->countriesRepository->pushCriteria(new RequestCriteria($request));
        $this->countriesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $countries = $this->countriesRepository->all();

        return $this->sendResponse($countries->toArray(), 'Countries retrieved successfully');
    }

    /**
     * Store a newly created Countries in storage.
     * POST /countries
     *
     * @param CreateCountriesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCountriesAPIRequest $request)
    {
        $input = $request->all();

        $countries = $this->countriesRepository->create($input);

        return $this->sendResponse($countries->toArray(), 'Countries saved successfully');
    }

    /**
     * Display the specified Countries.
     * GET|HEAD /countries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Countries $countries */
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            return $this->sendError('Countries not found');
        }

        return $this->sendResponse($countries->toArray(), 'Countries retrieved successfully');
    }

    /**
     * Update the specified Countries in storage.
     * PUT/PATCH /countries/{id}
     *
     * @param  int $id
     * @param UpdateCountriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Countries $countries */
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            return $this->sendError('Countries not found');
        }

        $countries = $this->countriesRepository->update($input, $id);

        return $this->sendResponse($countries->toArray(), 'Countries updated successfully');
    }

    /**
     * Remove the specified Countries from storage.
     * DELETE /countries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Countries $countries */
        $countries = $this->countriesRepository->findWithoutFail($id);

        if (empty($countries)) {
            return $this->sendError('Countries not found');
        }

        $countries->delete();

        return $this->sendResponse($id, 'Countries deleted successfully');
    }
}
