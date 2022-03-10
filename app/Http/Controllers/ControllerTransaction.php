<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class ControllerTransaction extends Controller
{
    public function store(Request $request)
    {
        $post = new transaction();
        $post->room_id = $request->room_id;
        $post->kamar = $request->kamar;
        $post->pemesan = $request->pemesan;
        $post->email = $request->email;
        $post->nohp = $request->nohp;
        $post->tamu = $request->tamu;
        $post->kamar = $request->kamar;
        $post->check_in = $request->check_in;
        $post->check_out = $request->check_out;
        $post->save();

        // $data = [$post];
        // return response()->json($data);
        $pdf = PDF::loadview('pdf-reserv', ['data' => $post]);
        return $pdf->download('reservasi-pdf');
    }

    public function edit(Request $id)
    {
        $data = transaction::with('room')->find($id);

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $post = transaction::find($id);
        $post->status = Carbon::parse($request->status)->format('Y-m-d H:i:s');
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
}
