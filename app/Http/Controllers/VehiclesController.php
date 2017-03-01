<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        $data = compact('vehicles');
        return JsonResponse::create(compact('data'));
    }
}
