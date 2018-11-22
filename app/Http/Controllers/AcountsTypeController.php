<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcountsTypeRequest;
use App\Http\Requests\UpdateAcountsTypeRequest;
use App\Repositories\AcountsTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AcountsTypeController extends AppBaseController
{
    /** @var  AcountsTypeRepository */
    private $acountsTypeRepository;

    public function __construct(AcountsTypeRepository $acountsTypeRepo)
    {
        $this->acountsTypeRepository = $acountsTypeRepo;
    }

    /**
     * Display a listing of the AcountsType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->acountsTypeRepository->pushCriteria(new RequestCriteria($request));
        $acountsTypes = $this->acountsTypeRepository->all();

        return view('acounts_types.index')
            ->with('acountsTypes', $acountsTypes);
    }

    /**
     * Show the form for creating a new AcountsType.
     *
     * @return Response
     */
    public function create()
    {
        return view('acounts_types.create');
    }

    /**
     * Store a newly created AcountsType in storage.
     *
     * @param CreateAcountsTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateAcountsTypeRequest $request)
    {
        $input = $request->all();

        $acountsType = $this->acountsTypeRepository->create($input);

        Flash::success('Acounts Type saved successfully.');

        return redirect(route('acountsTypes.index'));
    }

    /**
     * Display the specified AcountsType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $acountsType = $this->acountsTypeRepository->findWithoutFail($id);

        if (empty($acountsType)) {
            Flash::error('Acounts Type not found');

            return redirect(route('acountsTypes.index'));
        }

        return view('acounts_types.show')->with('acountsType', $acountsType);
    }

    /**
     * Show the form for editing the specified AcountsType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $acountsType = $this->acountsTypeRepository->findWithoutFail($id);

        if (empty($acountsType)) {
            Flash::error('Acounts Type not found');

            return redirect(route('acountsTypes.index'));
        }

        return view('acounts_types.edit')->with('acountsType', $acountsType);
    }

    /**
     * Update the specified AcountsType in storage.
     *
     * @param  int              $id
     * @param UpdateAcountsTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcountsTypeRequest $request)
    {
        $acountsType = $this->acountsTypeRepository->findWithoutFail($id);

        if (empty($acountsType)) {
            Flash::error('Acounts Type not found');

            return redirect(route('acountsTypes.index'));
        }

        $acountsType = $this->acountsTypeRepository->update($request->all(), $id);

        Flash::success('Acounts Type updated successfully.');

        return redirect(route('acountsTypes.index'));
    }

    /**
     * Remove the specified AcountsType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $acountsType = $this->acountsTypeRepository->findWithoutFail($id);

        if (empty($acountsType)) {
            Flash::error('Acounts Type not found');

            return redirect(route('acountsTypes.index'));
        }

        $this->acountsTypeRepository->delete($id);

        Flash::success('Acounts Type deleted successfully.');

        return redirect(route('acountsTypes.index'));
    }
}
