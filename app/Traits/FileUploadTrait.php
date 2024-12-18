<?php
namespace App\Traits;

use Illuminate\Http\Request;
trait FileUploadTrait
{
    /**
     * Handle File Uploads
     **/
    function uploadfile(Request $request, string $inputName, ?string $oldPath = null, string $path = '/uploads' ) : string
    {
        if($request->has($inputName)){
            $file = $request->{$inputName};
            $ext = $file->getClientOriginalExtension(); //jpg
            $fileName = 'media_'.uniqid().'.'.$ext;

            $file->move(public_path($path), $fileName);

            return $path . '/' . $fileName;
            }
            return '';


    }
     
}