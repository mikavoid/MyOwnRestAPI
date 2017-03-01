<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMakerRequest;
use App\Maker;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\JsonResponse;

class MakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makers = Maker::all();
        $data = compact('makers');
        return JsonResponse::create(compact('data'));
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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statusCode = 200;
        $maker = Maker::find($id);
        if (!$maker) {
            $statusCode = 404;
            $data = ['error' => 'Maker not found', 'status_code' => $statusCode];
        } else {
            $data = compact('maker');
        }
        return JsonResponse::create(compact('data'), $statusCode);
    }

    public function store(CreateMakerRequest $request)
    {
        $input = $request->only(['name', 'phone']);
        Maker::create($input);
        return JsonResponse::create(['data' => ['status' => 'Maker created'], 201]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMakerRequest $request, $id)
    {
        $input = $request->only(['name', 'phone']);
        $maker = Maker::find($id);
        if (!$maker) {
            return JsonResponse::create(['data' => ['error' => 'Maker not found'], 400]);
        }
        $maker->update($input);
        return JsonResponse::create(['data' => ['status' => 'Maker updated'], 202]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maker = Maker::find($id);
        if(!$maker) {
            return JsonResponse::create(['data' => ['error' => 'Maker not found'], 404]);
        }
        $maker->vehicles()->delete();
        $maker->delete();
        return JsonResponse::create(['data' => ['status' => 'Maker deleted'], 200]);
    }
}
