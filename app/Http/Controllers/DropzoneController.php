<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $fileName, 'public');

            return response()->json(['success' => true, 'file_path' => asset('storage/' . $path)]);
        }
        return response()->json(['success' => false, 'message' => 'File upload failed'], 400);
    }
}
