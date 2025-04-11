<?php

namespace App\Http\Controllers\API;

use App\Models\Device;
use App\Models\DeviceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeviceController extends BaseController
{
    /**
     * Display a listing of the devices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::with('details')->get();
        foreach ($devices as $device) {
            // Ensure pictures is an array by decoding it
            // $device->details->pictures = json_decode($device->details->pictures, true);
            // if (is_array($device->details->pictures)) {
                $device->details->picture = $this->getS3Url($device->details->picture);
            // }
        }
        return $this->sendResponse($devices, 'Devices retrieved successfully.');
    }

    /**
     * Store a newly created device in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'model_name' => 'required|string|max:255',
            'description' => 'required|string',
            'release_price' => 'required|numeric',
            'release_date' => 'required|date',
            'units_sold' => 'required|integer',
            'category_id' => 'nullable|integer',
            'specifications' => 'nullable|string',
            'picture' => 'nullable|string',
        ]);

        $this->sendResponse($request, 'This is the request.');

        $detail = DeviceDetail::create($request->only([
            'model_name', 'description', 'specifications', 'release_date', 'release_price', 'units_sold'
        ]));

        $detail->save();

        $device = new Device([
            'category_id' => $request->category_id, // nullable by default
            'details_id' => $detail->id,
        ]);        
        $device->save();

        $device->load('details', 'category');
        $device->details->picture = $this->getS3Url($device->details->picture);
        return $this->sendResponse($device, 'Device created successfully.');
        
    }



    /**
     * Update the specified device in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $detail = $device->details;

        $validatedDevice = $request->validate([
            'category_id' => 'nullable|integer',
        ]);

        $validated = $request->validate([
            'model_name' => 'required|string|max:255',
            'description' => 'required|string',
            'release_price' => 'required|numeric',
            'release_date' => 'required|date',
            'units_sold' => 'required|integer',
            'specifications' => 'nullable|string'
        ]);

        $device->update($validatedDevice);
        $detail->update($validated); // ✅ update existing detail

        $device->load('details', 'category');
        return $this->sendResponse($device, 'Device updated successfully.');
    }


    public function uploadPicture(Request $request, $id){
       
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->hasFile('image')) {
            $device = Device::find($id);
            $detail = $device->details;
            $extension  = request()->file('image')->getClientOriginalExtension(); //This is to get the extension of the image file just uploaded
            $image_name = time() .'_' . $device->id . '.' . $extension;
            $path = $request->file('image')->storeAs(
                'images',
                $image_name,
                's3'
            );
            Storage::disk('s3')->setVisibility($path, "public");
            if(!$path) {
                return $this->sendError($path, 'Device picture failed to upload!');
            }
            
            $detail->picture = $path;
            $detail->save();
            $success['picture'] = null;
            if(isset($detail->picture)){
                $success['picture'] = $this->getS3Url($path);
            }
            return $this->sendResponse($success, 'Picture uploaded successfully!');
        }
    }

    /**
     * Remove the specified device from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);
        $detail = $device->details;

        $detail->delete(); // Delete details first due to foreign key constraints
        $device->delete();

        return $this->sendResponse([], 'Device deleted successfully.');
    }

    public function removePicture($id){
        $device = Device::find($id);
        $detail = $device->details;
        if ($detail->picture) {
            Storage::disk('s3')->delete($detail->picture);
        }
        $detail->picture = null;
        $detail->save();
        $success['picture'] = null;
        return $this->sendResponse($success, 'Device Picture removed successfully!');
    }

}
