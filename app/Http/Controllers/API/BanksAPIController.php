<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBanksAPIRequest;
use App\Http\Requests\API\UpdateBanksAPIRequest;
use App\Models\Banks;
use App\Repositories\BanksRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BanksController
 * @package App\Http\Controllers\API
 */

class BanksAPIController extends AppBaseController
{
    /** @var  BanksRepository */
    private $banksRepository;

    public function __construct(BanksRepository $banksRepo)
    {
        $this->banksRepository = $banksRepo;
    }

    /**
     * Display a listing of the Banks.
     * GET|HEAD /banks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->banksRepository->pushCriteria(new RequestCriteria($request));
        $this->banksRepository->pushCriteria(new LimitOffsetCriteria($request));
        $banks = $this->banksRepository->all();

        return $this->sendResponse($banks->toArray(), 'Banks retrieved successfully');
    }

    /**
     * Store a newly created Banks in storage.
     * POST /banks
     *
     * @param CreateBanksAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBanksAPIRequest $request)
    {
        $input = $request->all();

        $banks = $this->banksRepository->create($input);

        return $this->sendResponse($banks->toArray(), 'Banks saved successfully');
    }

    /**
     * Display the specified Banks.
     * GET|HEAD /banks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Banks $banks */
        $banks = $this->banksRepository->findWithoutFail($id);

        if (empty($banks)) {
            return $this->sendError('Banks not found');
        }

        return $this->sendResponse($banks->toArray(), 'Banks retrieved successfully');
    }

    /**
     * Update the specified Banks in storage.
     * PUT/PATCH /banks/{id}
     *
     * @param  int $id
     * @param UpdateBanksAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBanksAPIRequest $request)
    {
        $input = $request->all();

        /** @var Banks $banks */
        $banks = $this->banksRepository->findWithoutFail($id);

        if (empty($banks)) {
            return $this->sendError('Banks not found');
        }

        $banks = $this->banksRepository->update($input, $id);

        return $this->sendResponse($banks->toArray(), 'Banks updated successfully');
    }

    /**
     * Remove the specified Banks from storage.
     * DELETE /banks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Banks $banks */
        $banks = $this->banksRepository->findWithoutFail($id);

        if (empty($banks)) {
            return $this->sendError('Banks not found');
        }

        $banks->delete();

        return $this->sendResponse($id, 'Banks deleted successfully');
    }
}
