<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as ImageManager;

class Helpers
{  

    public static function format_price($price = 0)
    {

        return '$ ' . number_format($price, 2, ',', '.');
    }

    public static function image_path($file = '')
    {

        return "/storage/$file";
    }
    public static function image_upload(object $img, string $name,  bool $thumbnail = false)
    {
        //SAVE IMG       
        $img_save = ImageManager::make($img)->widen(1920, function ($constraint) {
            $constraint->upsize();
        })->limitColors(255)->encode();
        Storage::put($name, (string) $img_save);

        //SAVE IMG thumbnail
        if ($thumbnail) {
            $img_thumbnail = ImageManager::make($img)->widen(300)->limitColors(255)->encode();
            Storage::put('/thumbnail/' . $name, (string) $img_thumbnail);
        }
    }
    public static function images_store(array $images, string $path_name,$thumbnail = false)
    {
        $array_images = [];
        //$this->path . '/' . $product->slug . uniqid()
        foreach ($images as $key => $img) {
            $name_img = $path_name . "-" . uniqid() . "-" . $key . "." . $img->extension();
            self::image_upload($img, $name_img,$thumbnail);
            $array_images[$key] = ['img' => $name_img];
        }
        return $array_images;
    }
    public static function delete_images_all($model){
        
        if ($model->images->isNotEmpty()) {  //isNotEmpty  -> no esta vacio 
            $images_delete = [];
            foreach ($model->images as  $img) {
                array_push($images_delete, $img->image);
                array_push($images_delete, 'thumbnail/' . $img->image);
            }
            Storage::delete($images_delete);            
        }
    }
}
