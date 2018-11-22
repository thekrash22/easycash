<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDocumentsTypeAPIRequest;
use App\Http\Requests\API\UpdateDocumentsTypeAPIRequest;
use App\Models\DocumentsType;
use App\Repositories\DocumentsTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DocumentsTypeController
 * @package App\Http\Controllers\API
 */

class DocumentsTypeAPIController extends AppBaseController
{
    /** @var  DocumentsTypeRepository */
    private $documentsTypeRepository;

    public function __construct(DocumentsTypeRepository $documentsTypeRepo)
    {
        $this->documentsTypeRepository = $documentsTypeRepo;
    }

    /**
     * Display a listing of the DocumentsType.
     * GET|HEAD /documentsTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->documentsTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->documentsTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $documentsTypes = $this->documentsTypeRepository->all();

        return $this->sendResponse($documentsTypes->toArray(), 'Documents Types retrieved successfully');
    }

    /**
     * Store a newly created DocumentsType in storage.
     * POST /documentsTypes
     *
     * @param CreateDocumentsTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentsTypeAPIRequest $request)
    {
        $input = $request->all();

        $documentsTypes = $this->documentsTypeRepository->create($input);

        return $this->sendResponse($documentsTypes->toArray(), 'Documents Type saved successfully');
    }

    /**
     * Display the specified DocumentsType.
     * GET|HEAD /documentsTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DocumentsType $documentsType */
        $documentsType = $this->documentsTypeRepository->findWithoutFail($id);

        if (empty($documentsType)) {
            return $this->sendError('Documents Type not found');
        }

        return $this->sendResponse($documentsType->toArray(), 'Documents Type retrieved successfully');
    }

    /**
     * Update the specified DocumentsType in storage.
     * PUT/PATCH /documentsTypes/{id}
     *
     * @param  int $id
     * @param UpdateDocumentsTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentsTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var DocumentsType $documentsType */
        $documentsType = $this->documentsTypeRepository->findWithoutFail($id);

        if (empty($documentsType)) {
            return $this->sendError('Documents Type not found');
        }

        $documentsType = $this->documentsTypeRepository->update($input, $id);

        return $this->sendResponse($documentsType->toArray(), 'DocumentsType updated successfully');
    }

    /**
     * Remove the specified DocumentsType from storage.
     * DELETE /documentsTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DocumentsType $documentsType */
        $documentsType = $this->documentsTypeRepository->findWithoutFail($id);

        if (empty($documentsType)) {
            return $this->sendError('Documents Type not found');
        }

        $documentsType->delete();

        return $this->sendResponse($id, 'Documents Type deleted successfully');
    }
}
