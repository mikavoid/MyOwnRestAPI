<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehicleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Maker;

use App\Http\Requests;

class MakersVehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $maker = Maker::find($id);
        if (!$maker) {
            return JsonResponse::create(['data' => [
                'error' => 'No vehicles for this maker',
                'status_code' => 404
            ]]);
        }
        $vehicles = $maker->vehicles->all();
        $data = compact('vehicles');
        return JsonResponse::create(compact('data'), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVehicleRequest $request, $makerId)
    {
        $input = $request->all();

        $maker = Maker::find($makerId);
        if (!$maker) {
            return JsonResponse::create(['data' => ['error' => 'Maker not found'], 404]);
        }
        $maker->vehicles()->create($input);
        return JsonResponse::create(['data' => ['statud' => 'Vehicle added to maker'], 200]);
    }

    public function show($id, $vehicleId) {
        $maker = Maker::find($id);
        if (!$maker) {
            return JsonResponse::create(['data' => [
                'error' => 'No vehicles for this maker',
                'status_code' => 404
            ]]);
        }
        $vehicles = $maker->vehicles->find($vehicleId);
        if (!$vehicles) {
            return JsonResponse::create(['data' => [
                'error' => 'No vehicle',
                'status_code' => 404
            ]]);
        }
        $data = compact('vehicles');
        return JsonResponse::create(compact('data'), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVehicleRequest $request, $id, $vehicleId)
    {
        $maker = Maker::find($id);
        if (!$maker) {
            return JsonResponse::create(['data' => ['error' => 'Maker not found'], 400]);
        }
        $vehicle = $maker->vehicles()->find($vehicleId);
        if (!$vehicle) {
            return JsonResponse::create(['data' => ['error' => 'Vehicle not found for this maker'], 400]);
        }
        $input = $request->all();
        $vehicle->update($input);
        return JsonResponse::create(['data' => ['status' => 'Vehicle updated'], 202]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $vehicleId)
    {
        $maker = Maker::find($id);
        if(!$maker) {
            return JsonResponse::create(['data' => ['error' => 'Maker not found'], 404]);
        }
        $vehicle = $maker->vehicles()->find($vehicleId);
        if(!$vehicle) {
            return JsonResponse::create(['data' => ['error' => 'Vehicle not found for this maker'], 404]);
        }
        $vehicle->delete();
        return JsonResponse::create(['data' => ['status' => 'Vehicle deleted'], 200]);
    }
}
