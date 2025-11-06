<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use stdClass;

class SettingController extends Controller
{
    public function get() {
        $data = Setting::all();
        $settings = new stdClass;
        foreach($data as $set) {
            $settings->{$set->key} = $set->value;
        }
        return response()->json($settings);
    }
    public function update(Request $request)
    {
        try {
            foreach($request->all() as $name => $value) {
                if($name==='_token') continue;
                Setting::updateOrCreate(['key'=> $name], [
                    'key' => $name,
                    'value' => $value
                ]);
            }
            if($request->ajax()) return ['status' => true ];
            return back()->with('success', "Settings updated!");
        } catch (\Throwable $th) {
            logger($th->getMessage());
            return back()->with('error', $th->getMessage());
        }
    }
}
