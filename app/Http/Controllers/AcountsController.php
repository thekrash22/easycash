<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcountsRequest;
use App\Http\Requests\UpdateAcountsRequest;
use App\Repositories\AcountsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\DocumentsType;
use App\Models\Banks;
use App\Models\AcountsType;

class AcountsController extends AppBaseController
{
    /** @var  AcountsRepository */
    private $acountsRepository;

    public function __construct(AcountsRepository $acountsRepo)
    {
        $this->acountsRepository = $acountsRepo;
    }

    /**
     * Display a listing of the Acounts.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->acountsRepository->pushCriteria(new RequestCriteria($request));
        $acounts = $this->acountsRepository->all();

        return view('acounts.index')
            ->with('acounts', $acounts);
    }

    /**
     * Show the form for creating a new Acounts.
     *
     * @return Response
     */
    public function create()
    {
        $acountstype = AcountsType::pluck("name", "id")->prepend('Por favor seleccione uno', null);
        $documentstype = DocumentsType::pluck('name','id')->prepend('Por favor seleccione uno',null);
        $banks = Banks::pluck('name','id')->prepend('Por favor seleccione uno',null);
        return view('acounts.create',compact('acountstype','documentstype','banks'));
    }

    /**
     * Store a newly created Acounts in storage.
     *
     * @param CreateAcountsRequest $request
     *
     * @return Response
     */
    public function store(CreateAcountsRequest $request)
    {
        $input = $request->all();

        $acounts = $this->acountsRepository->create($input);

        Flash::success('Acounts saved successfully.');

        return redirect(route('acounts.index'));
    }

    /**
     * Display the specified Acounts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $acounts = $this->acountsRepository->findWithoutFail($id);

        if (empty($acounts)) {
            Flash::error('Acounts not found');

            return redirect(route('acounts.index'));
        }

        return view('acounts.show')->with('acounts', $acounts);
    }

    /**
     * Show the form for editing the specified Acounts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $acounts = $this->acountsRepository->findWithoutFail($id);
        $acountstype = AcountsType::pluck("name", "id")->prepend('Por favor seleccione uno', null);
        $documentstype = DocumentsType::pluck('name','id')->prepend('Por favor seleccione uno',null);
        $banks = Banks::pluck('name','id')->prepend('Por favor seleccione uno',null);

        if (empty($acounts)) {
            Flash::error('Acounts not found');

            return redirect(route('acounts.index'));
        }

        return view('acounts.edit',compact('acountstype','documentstype','banks','acounts'));
    }

    /**
     * Update the specified Acounts in storage.
     *
     * @param  int              $id
     * @param UpdateAcountsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcountsRequest $request)
    {
        $acounts = $this->acountsRepository->findWithoutFail($id);

        if (empty($acounts)) {
            Flash::error('Acounts not found');

            return redirect(route('acounts.index'));
        }

        $acounts = $this->acountsRepository->update($request->all(), $id);

        Flash::success('Acounts updated successfully.');

        return redirect(route('acounts.index'));
    }

    /**
     * Remove the specified Acounts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $acounts = $this->acountsRepository->findWithoutFail($id);

        if (empty($acounts)) {
            Flash::error('Acounts not found');

            return redirect(route('acounts.index'));
        }

        $this->acountsRepository->delete($id);

        Flash::success('Acounts deleted successfully.');

        return redirect(route('acounts.index'));
    }
}
