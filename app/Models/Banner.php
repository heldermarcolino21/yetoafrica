<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    protected $table = 'banner';

    public static function listaBanner(){
   
        $listaBlog=DB::table('banner')
        ->select('banner.id','banner.banner_img','banner.banner_data')
        ->orderBy('id','desc')
         ->paginate(10);
        return $listaBlog;
    }
}
