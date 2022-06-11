<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnvironmentRequest;
use App\Http\Requests\UpdateEnvironmentRequest;
use App\Models\Environment;
use App\Models\Repository;
use App\Models\Server;

class EnvironmentController extends Controller
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
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function create(Repository $repository)
    {
        $servers = Server::all();
        return view('environments.create', compact('repository', 'servers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEnvironmentRequest  $request
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnvironmentRequest $request, Repository  $repository)
    {
        $environment = new Environment();
        $environment->name = $request->name;
        $environment->repository_id = $repository->id;
        $environment->server_id = $request->server_id;
        $environment->save();
        return redirect(route('repositories.show', $repository));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function show(Environment $environment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function edit(Environment $environment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEnvironmentRequest  $request
     * @param  \App\Models\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnvironmentRequest $request, Environment $environment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Environment  $environment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Environment $environment)
    {
        //
    }
}
