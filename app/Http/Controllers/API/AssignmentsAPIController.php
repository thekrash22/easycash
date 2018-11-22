<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAssignmentsAPIRequest;
use App\Http\Requests\API\UpdateAssignmentsAPIRequest;
use App\Models\Assignments;
use App\Repositories\AssignmentsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AssignmentsController
 * @package App\Http\Controllers\API
 */

class AssignmentsAPIController extends AppBaseController
{
    /** @var  AssignmentsRepository */
    private $assignmentsRepository;

    public function __construct(AssignmentsRepository $assignmentsRepo)
    {
        $this->assignmentsRepository = $assignmentsRepo;
    }

    /**
     * Display a listing of the Assignments.
     * GET|HEAD /assignments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->assignmentsRepository->pushCriteria(new RequestCriteria($request));
        $this->assignmentsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $assignments = $this->assignmentsRepository->all();

        return $this->sendResponse($assignments->toArray(), 'Assignments retrieved successfully');
    }

    /**
     * Store a newly created Assignments in storage.
     * POST /assignments
     *
     * @param CreateAssignmentsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAssignmentsAPIRequest $request)
    {
        $input = $request->all();

        $assignments = $this->assignmentsRepository->create($input);

        return $this->sendResponse($assignments->toArray(), 'Assignments saved successfully');
    }

    /**
     * Display the specified Assignments.
     * GET|HEAD /assignments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Assignments $assignments */
        $assignments = $this->assignmentsRepository->findWithoutFail($id);

        if (empty($assignments)) {
            return $this->sendError('Assignments not found');
        }

        return $this->sendResponse($assignments->toArray(), 'Assignments retrieved successfully');
    }

    /**
     * Update the specified Assignments in storage.
     * PUT/PATCH /assignments/{id}
     *
     * @param  int $id
     * @param UpdateAssignmentsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssignmentsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Assignments $assignments */
        $assignments = $this->assignmentsRepository->findWithoutFail($id);

        if (empty($assignments)) {
            return $this->sendError('Assignments not found');
        }

        $assignments = $this->assignmentsRepository->update($input, $id);

        return $this->sendResponse($assignments->toArray(), 'Assignments updated successfully');
    }

    /**
     * Remove the specified Assignments from storage.
     * DELETE /assignments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Assignments $assignments */
        $assignments = $this->assignmentsRepository->findWithoutFail($id);

        if (empty($assignments)) {
            return $this->sendError('Assignments not found');
        }

        $assignments->delete();

        return $this->sendResponse($id, 'Assignments deleted successfully');
    }
}
