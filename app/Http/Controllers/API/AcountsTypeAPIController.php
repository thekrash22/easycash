<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAcountsTypeAPIRequest;
use App\Http\Requests\API\UpdateAcountsTypeAPIRequest;
use App\Models\AcountsType;
use App\Repositories\AcountsTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AcountsTypeController
 * @package App\Http\Controllers\API
 */

class AcountsTypeAPIController extends AppBaseController
{
    /** @var  AcountsTypeRepository */
    private $acountsTypeRepository;

    public function __construct(AcountsTypeRepository $acountsTypeRepo)
    {
        $this->acountsTypeRepository = $acountsTypeRepo;
    }

    /**
     * Display a listing of the AcountsType.
     * GET|HEAD /acountsTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->acountsTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->acountsTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $acountsTypes = $this->acountsTypeRepository->all();

        return $this->sendResponse($acountsTypes->toArray(), 'Acounts Types retrieved successfully');
    }

    /**
     * Store a newly created AcountsType in storage.
     * POST /acountsTypes
     *
     * @param CreateAcountsTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAcountsTypeAPIRequest $request)
    {
        $input = $request->all();

        $acountsTypes = $this->acountsTypeRepository->create($input);

        return $this->sendResponse($acountsTypes->toArray(), 'Acounts Type saved successfully');
    }

    /**
     * Display the specified AcountsType.
     * GET|HEAD /acountsTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AcountsType $acountsType */
        $acountsType = $this->acountsTypeRepository->findWithoutFail($id);

        if (empty($acountsType)) {
            return $this->sendError('Acounts Type not found');
        }

        return $this->sendResponse($acountsType->toArray(), 'Acounts Type retrieved successfully');
    }

    /**
     * Update the specified AcountsType in storage.
     * PUT/PATCH /acountsTypes/{id}
     *
     * @param  int $id
     * @param UpdateAcountsTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcountsTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var AcountsType $acountsType */
        $acountsType = $this->acountsTypeRepository->findWithoutFail($id);

        if (empty($acountsType)) {
            return $this->sendError('Acounts Type not found');
        }

        $acountsType = $this->acountsTypeRepository->update($input, $id);

        return $this->sendResponse($acountsType->toArray(), 'AcountsType updated successfully');
    }

    /**
     * Remove the specified AcountsType from storage.
     * DELETE /acountsTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AcountsType $acountsType */
        $acountsType = $this->acountsTypeRepository->findWithoutFail($id);

        if (empty($acountsType)) {
            return $this->sendError('Acounts Type not found');
        }

        $acountsType->delete();

        return $this->sendResponse($id, 'Acounts Type deleted successfully');
    }
}
