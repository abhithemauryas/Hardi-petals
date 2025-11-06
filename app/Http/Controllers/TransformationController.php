<?php

namespace App\Http\Controllers;

use App\Models\BeforeAfterTransformation;
use Illuminate\Http\Request;

class TransformationController extends Controller
{

    public function index(Request $request) {
        $transformations = BeforeAfterTransformation::paginate(10);
        return view('admin.general.transformations.list', compact('transformations'));
    }

    public function transforms(){
        return BeforeAfterTransformation::all();
    }

    public function store(Request $request)
    {
        // dd($request->description);
        try
        {
            $request->validate([
                'before_image' => 'required|image|max:8048',
                'after_image' => 'required|image|max:8048',
            ]);

            $beforePath = $request->file('before_image')->store('transformations/before', 'public');
            $afterPath = $request->file('after_image')->store('transformations/after', 'public');

            BeforeAfterTransformation::create([
                'before_image_path' => $beforePath,
                'after_image_path' => $afterPath,
                'description' => $request->description,
            ]);

            return redirect()->back()->with('success', 'Transformation uploaded successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            logger("Exception creating transformations: ".$e->getMessage());
            return back()->with('error',$e->getMessage());
        }
    }

    public function delete($id) {
        $record = BeforeAfterTransformation::whereId($id);
        if($record->exists()){
            $record->delete();
            return back()->with('success', "Transformation deleted successfully");
        }
        return back()->with('error', "Failed to remove the transformation");
    }

}
