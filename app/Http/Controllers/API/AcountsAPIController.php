<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAcountsAPIRequest;
use App\Http\Requests\API\UpdateAcountsAPIRequest;
use App\Models\Acounts;
use App\Repositories\AcountsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AcountsController
 * @package App\Http\Controllers\API
 */

class AcountsAPIController extends AppBaseController
{
    /** @var  AcountsRepository */
    private $acountsRepository;

    public function __construct(AcountsRepository $acountsRepo)
    {
        $this->acountsRepository = $acountsRepo;
    }

    /**
     * Display a listing of the Acounts.
     * GET|HEAD /acounts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->acountsRepository->pushCriteria(new RequestCriteria($request));
        $this->acountsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $acounts = $this->acountsRepository->all();

        return $this->sendResponse($acounts->toArray(), 'Acounts retrieved successfully');
    }

    /**
     * Store a newly created Acounts in storage.
     * POST /acounts
     *
     * @param CreateAcountsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAcountsAPIRequest $request)
    {
        $input = $request->all();

        $acounts = $this->acountsRepository->create($input);

        return $this->sendResponse($acounts->toArray(), 'Acounts saved successfully');
    }

    /**
     * Display the specified Acounts.
     * GET|HEAD /acounts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Acounts $acounts */
        $acounts = $this->acountsRepository->findWithoutFail($id);

        if (empty($acounts)) {
            return $this->sendError('Acounts not found');
        }

        return $this->sendResponse($acounts->toArray(), 'Acounts retrieved successfully');
    }

    /**
     * Update the specified Acounts in storage.
     * PUT/PATCH /acounts/{id}
     *
     * @param  int $id
     * @param UpdateAcountsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcountsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Acounts $acounts */
        $acounts = $this->acountsRepository->findWithoutFail($id);

        if (empty($acounts)) {
            return $this->sendError('Acounts not found');
        }

        $acounts = $this->acountsRepository->update($input, $id);

        return $this->sendResponse($acounts->toArray(), 'Acounts updated successfully');
    }

    /**
     * Remove the specified Acounts from storage.
     * DELETE /acounts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Acounts $acounts */
        $acounts = $this->acountsRepository->findWithoutFail($id);

        if (empty($acounts)) {
            return $this->sendError('Acounts not found');
        }

        $acounts->delete();

        return $this->sendResponse($id, 'Acounts deleted successfully');
    }
}
