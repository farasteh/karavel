<?php

namespace App\Http\Controllers\v1\Admin\Advertising;

use App\Http\Controllers\Controller;
use App\Models\AdvertisingSpecial;
use Illuminate\Http\Request;

class specialAdvertisingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
        ]);
        try {
            AdvertisingSpecial::create([
                'advertising_id'   => $request->id,
            ]);

            return response()->json(['data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){
            return response()->json(['data' =>[ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
        }
    }

    public function update(Request $request,$id)
    {

    }

    public function destroy($id)
    {
        try {
            $flight = AdvertisingSpecial::where('advertising_id', $id)->first();
            $flight->delete();
            return response()->json(['data' => [ 'success' => true, 'message' => __('massage.success_db') ]], 200 );
        }catch (\Exception $e){
            return response()->json(['data' =>[ 'error' => true, 'message' => __('massage.error_db') ]], 500 );
        }
    }
}
