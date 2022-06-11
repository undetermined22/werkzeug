<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeploymentRequest;
use App\Http\Requests\UpdateDeploymentRequest;
use App\Models\Deployment;
use App\Models\Environment;
use App\Models\Repository;

class DeploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeploymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeploymentRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeploymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function deploy(StoreDeploymentRequest $request)
    {
        $repository = Repository::where('key', $request->repository)->first();
        $environment = $repository->environments()->where('name', $request->environment)->first();

        $deployment = new Deployment();
        $deployment->repository_id = $repository->id;
        $deployment->environment_id = $environment->id;
        $deployment->branch = $request->branch;
        $deployment->save();
        return response()->json($deployment, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deployment  $deployment
     * @return \Illuminate\Http\Response
     */
    public function show(Deployment $deployment)
    {
        //
    }
}
