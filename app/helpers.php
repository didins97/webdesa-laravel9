<?php

use Illuminate\Support\Facades\File;

if( !function_exists('generate_slug') ) {
    function generate_slug($text, $divider) {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return null;
        }

        // 4 number unique code
        $text = $text . '-' . rand(1000, 9999);

        return $text;
    }
}

if( !function_exists('upload_file') ) {
    function upload_file($path, $file)
    {
        // try {
        //     $fileSystem = new Filesystem();

        //     if( !$fileSystem->exists($path) ) {
        //         File::makeDirectory($path);
        //     }



            // $tujuan_upload_file = storage_path($path);
            // $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            // $file->move($tujuan_upload_file, $filename);

            $image = Image::make($file->getRealPath())->resize(720, 480);
            $filename = uniqid() . '.webp';
            // cek path is exists
            if( !File::exists(storage_path($path)) ) {
                // File::makeDirectory(storage_path($path));
                File::makeDirectory(storage_path($path), 0777, true);
            }

            $path = $path . '/' . $filename;
            Image::make($image)->save(storage_path($path));

            return $filename;
        // }catch(\Exception $e) {
        // }
    }
}

if (!function_exists('unlink_file')) {
    function unlink_file($path){
        if(gettype($path) != 'array'){
            $old_image = public_path().'/assets'.$path;
            if(file_exists($old_image)){
                unlink($old_image);
            }
        } else {
            for($i=0;$i<count($path);$i++){
                $old_image = public_path().'/assets'.$path[$i];
                if(file_exists($old_image)){
                    unlink($old_image);
                }
            }
        }
    }
}
