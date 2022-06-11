<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRepositoryRequest;
use App\Http\Requests\UpdateRepositoryRequest;
use App\Models\Repository;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repositories = Repository::paginate(15);
        return view('repositories.index', compact('repositories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repositories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRepositoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepositoryRequest $request)
    {
        $repository = new Repository();
        $repository->key = $request->key;
        $repository->name = $request->name;
        $repository->organization = $request->organization;
        $repository->url = $request->url;
        $repository->description = $request->description;
        $repository->save();
        return redirect(route('repositories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(Repository $repository)
    {
        return view('repositories.show', compact('repository'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function edit(Repository $repository)
    {
        return view('repositories.edit', compact('repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepositoryRequest  $request
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepositoryRequest $request, Repository $repository)
    {
        $repository->name = $request->name;
        $repository->organization = $request->organization;
        $repository->url = $request->url;
        $repository->description = $request->description;
        $repository->save();
        return redirect(route('repositories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repository $repository)
    {
        //
    }
}
