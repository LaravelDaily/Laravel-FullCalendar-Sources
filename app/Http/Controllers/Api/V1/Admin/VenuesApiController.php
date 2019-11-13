<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;
use App\Http\Resources\Admin\VenueResource;
use App\Venue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VenuesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('venue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VenueResource(Venue::all());
    }

    public function store(StoreVenueRequest $request)
    {
        $venue = Venue::create($request->all());

        return (new VenueResource($venue))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Venue $venue)
    {
        abort_if(Gate::denies('venue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VenueResource($venue);
    }

    public function update(UpdateVenueRequest $request, Venue $venue)
    {
        $venue->update($request->all());

        return (new VenueResource($venue))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Venue $venue)
    {
        abort_if(Gate::denies('venue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $venue->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
