<?php

namespace App\Http\Controllers;

use App\Models\FacilitieRoom;
use Illuminate\Http\Request;

class ControllerFacilitieRoom extends Controller
{
    public function store(Request $request)
    {
        $post = new FacilitieRoom();
        $post->room_id = $request->room_id;
        $post->facilitie = $request->facilitie;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }

    public function edit(Request $id)
    {
        $data = FacilitieRoom::find($id);

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $post = FacilitieRoom::find($id);
        $post->room_id = $request->room_id;
        $post->facilitie = $request->facilitie;
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function delete($id)
    {
        $post = FacilitieRoom::find($id);
        $post->delete();

        return response()->json($post);
    }
}
