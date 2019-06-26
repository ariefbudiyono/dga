<?php

namespace App\Http\Controllers\Backend\Factory;

use App\Models\factory\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Factory\CreateResponse;
use App\Http\Responses\Backend\Factory\EditResponse;
use App\Repositories\Backend\Factory\FactoryRepository;
use App\Http\Requests\Backend\Factory\ManageFactoryRequest;
use App\Http\Requests\Backend\Factory\CreateFactoryRequest;
use App\Http\Requests\Backend\Factory\StoreFactoryRequest;
use App\Http\Requests\Backend\Factory\EditFactoryRequest;
use App\Http\Requests\Backend\Factory\UpdateFactoryRequest;
use App\Http\Requests\Backend\Factory\DeleteFactoryRequest;

/**
 * FactoriesController
 */
class FactoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var FactoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param FactoryRepository $repository;
     */
    public function __construct(FactoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\factory\ManageFactoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageFactoryRequest $request)
    {
        return new ViewResponse('backend.factories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateFactoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\factory\CreateResponse
     */
    public function create(CreateFactoryRequest $request)
    {
        return new CreateResponse('backend.factories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFactoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreFactoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.factories.index'), ['flash_success' => trans('alerts.backend.factories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\factory\Factory  $factory
     * @param  EditFactoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\factory\EditResponse
     */
    public function edit(Factory $factory, EditFactoryRequest $request)
    {
        return new EditResponse($factory);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFactoryRequestNamespace  $request
     * @param  App\Models\factory\Factory  $factory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateFactoryRequest $request, Factory $factory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $factory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.factories.index'), ['flash_success' => trans('alerts.backend.factories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteFactoryRequestNamespace  $request
     * @param  App\Models\factory\Factory  $factory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Factory $factory, DeleteFactoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($factory);
        //returning with successfull message
        return new RedirectResponse(route('admin.factories.index'), ['flash_success' => trans('alerts.backend.factories.deleted')]);
    }
    
}
