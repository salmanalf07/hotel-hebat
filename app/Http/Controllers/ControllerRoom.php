<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ControllerRoom extends Controller
{
    public function store(Request $request)
    {
        $post = new Room();
        $post->type = $request->type;
        $post->jumlah_kamar = $request->jumlah_kamar;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }

    public function edit(Request $id)
    {
        $data = Room::find($id);

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $post = Room::find($id);
        $post->type = $request->type;
        $post->jumlah_kamar = $request->jumlah_kamar;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function delete($id)
    {
        $post = Room::find($id);
        $post->delete();

        return response()->json($post);
    }
}
