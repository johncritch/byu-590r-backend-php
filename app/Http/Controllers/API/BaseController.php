<?php


namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Storage;



class BaseController extends Controller
{
   /**
    * success response method.
    *
    * @return \Illuminate\Http\Response
    */
   public function sendResponse($result, $message)
   {
       $response = [
           'success' => true,
           'results'    => $result,
           'message' => $message,
       ];


       return response()->json($response, 200);
   }


   /**
    * return error response.
    *
    * @return \Illuminate\Http\Response
    */
   public function sendError($error, $errorMessages = [], $code = 402)
   {
       $response = [
           'success' => false,
           'message' => $error,
       ];


       if(!empty($errorMessages)){
           $response['data'] = $errorMessages;
       }


       return response()->json($response, $code);
   }

   public function getS3Url($paths, $minutes = 10)
   {
       $s3 = Storage::disk('s3');
    //    if (is_array($paths)) {
    //        return array_map(function ($path) use ($s3, $minutes) {
    //            return $this->generateUrl($s3, $path, $minutes);
    //        }, $paths);
    //    }
   
       return $this->generateUrl($s3, $paths, $minutes);
   }
   
   private function generateUrl($s3, $path, $minutes)
   {
       if (!$path) {
           return null;
       }
   
       if ($minutes === null) {
           $s3->setVisibility($path, "public");
           return $s3->url($path);
       }
   
       return $s3->temporaryUrl($path, now()->addMinutes($minutes));
   }
   
}

