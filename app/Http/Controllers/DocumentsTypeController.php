<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentsTypeRequest;
use App\Http\Requests\UpdateDocumentsTypeRequest;
use App\Repositories\DocumentsTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DocumentsTypeController extends AppBaseController
{
    /** @var  DocumentsTypeRepository */
    private $documentsTypeRepository;

    public function __construct(DocumentsTypeRepository $documentsTypeRepo)
    {
        $this->documentsTypeRepository = $documentsTypeRepo;
    }

    /**
     * Display a listing of the DocumentsType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->documentsTypeRepository->pushCriteria(new RequestCriteria($request));
        $documentsTypes = $this->documentsTypeRepository->all();

        return view('documents_types.index')
            ->with('documentsTypes', $documentsTypes);
    }

    /**
     * Show the form for creating a new DocumentsType.
     *
     * @return Response
     */
    public function create()
    {
        return view('documents_types.create');
    }

    /**
     * Store a newly created DocumentsType in storage.
     *
     * @param CreateDocumentsTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentsTypeRequest $request)
    {
        $input = $request->all();

        $documentsType = $this->documentsTypeRepository->create($input);

        Flash::success('Documents Type saved successfully.');

        return redirect(route('documentsTypes.index'));
    }

    /**
     * Display the specified DocumentsType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documentsType = $this->documentsTypeRepository->findWithoutFail($id);

        if (empty($documentsType)) {
            Flash::error('Documents Type not found');

            return redirect(route('documentsTypes.index'));
        }

        return view('documents_types.show')->with('documentsType', $documentsType);
    }

    /**
     * Show the form for editing the specified DocumentsType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documentsType = $this->documentsTypeRepository->findWithoutFail($id);

        if (empty($documentsType)) {
            Flash::error('Documents Type not found');

            return redirect(route('documentsTypes.index'));
        }

        return view('documents_types.edit')->with('documentsType', $documentsType);
    }

    /**
     * Update the specified DocumentsType in storage.
     *
     * @param  int              $id
     * @param UpdateDocumentsTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentsTypeRequest $request)
    {
        $documentsType = $this->documentsTypeRepository->findWithoutFail($id);

        if (empty($documentsType)) {
            Flash::error('Documents Type not found');

            return redirect(route('documentsTypes.index'));
        }

        $documentsType = $this->documentsTypeRepository->update($request->all(), $id);

        Flash::success('Documents Type updated successfully.');

        return redirect(route('documentsTypes.index'));
    }

    /**
     * Remove the specified DocumentsType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentsType = $this->documentsTypeRepository->findWithoutFail($id);

        if (empty($documentsType)) {
            Flash::error('Documents Type not found');

            return redirect(route('documentsTypes.index'));
        }

        $this->documentsTypeRepository->delete($id);

        Flash::success('Documents Type deleted successfully.');

        return redirect(route('documentsTypes.index'));
    }
}
