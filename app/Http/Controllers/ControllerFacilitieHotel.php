<?php

namespace App\Http\Controllers;

use App\Models\FacilitieHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ControllerFacilitieHotel extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['image'] = time() . '.' . $request->image->extension();
        //$request->image->move(public_path('images'), $input['image']);
        Storage::disk('public')->put($input['image'],  File::get($request->image));

        //$path = $request->file('image')->store('facilities-hotel');

        $post = new FacilitieHotel();
        $post->facilitie = $request->facilitie;
        $post->keterangan = $request->keterangan;
        $post->link = $input['image'];
        $post->save();

        $data = [$post];
        return response()->json($data);
    }

    public function edit(Request $id)
    {
        $data = FacilitieHotel::find($id);

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $post = FacilitieHotel::find($id);
        $post->facilitie = $request->facilitie;
        $post->keterangan = $request->keterangan;
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $path = $request->file('image')->store('facilities-hotel');
            $post->link = $path;
        }
        $post->save();

        $data = [$post];
        return response()->json($data);
    }
    public function delete($id)
    {
        $post = FacilitieHotel::find($id);
        Storage::delete($post->link);
        $post->delete();

        return response()->json($post);
    }
}
