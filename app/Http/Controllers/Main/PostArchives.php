<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Portal;
use Illuminate\Http\Request;

class PostArchives extends Controller
{
    public function archive(){
        return view('main.archive.index');
    }
    public function archiveCatg($catg){
        switch ($catg) {
            case 'time':
                $portal=Portal::all();
               
                 return view('main.archive.catg',compact('portal','catg'));                
    
            case 'work':
               
                break;
    
            case 'education':
               
                break;
    
            case 'workemotion':
                
                break;
    
            default:
               
                break;
        }
        return view('main.archive.catg');
    }
    public function archivePosts($citySlug,$postId,$name){
        // citySlug}/{postId}/{name
        return $citySlug;
    }   
}
