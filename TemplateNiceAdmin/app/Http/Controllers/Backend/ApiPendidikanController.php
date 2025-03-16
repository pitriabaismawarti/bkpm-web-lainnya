<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Pendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    public function getAll()
    {
        $pendidikan = Pendidikan::all();
        return Response::json($pendidikan, 201);
    }

    public function getPen($id)
    {
        $pendidikan = Pendidikan::find($id);

        if (!$pendidikan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan!'
            ], 404);
        }

        return response()->json($pendidikan, 200);
    }
}
