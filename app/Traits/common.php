<?php
namespace App\Traits;
Trait common{
public function uploadFile($file, $path){
    $file_extension = $file->getClientOriginalExtension();
    $file_name = time() . '.' . $file_extension;
    $file->move($path, $file_name);
    return $file_name;
}
public function deleteFile($oldFileName, $path){
   $oldPath=$path.$oldFileName;
   if(file_exists($oldPath)){
      unlink($oldPath);
   }
}}
?>