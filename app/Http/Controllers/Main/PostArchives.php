<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Chitti;
use App\Models\ChittiGeography;
use App\Models\ChittiImageMapping;
use App\Models\ChittiTagMapping;
use App\Models\Portal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostArchives extends Controller
{

    public function archive($cityCode=null)
    {
        if ($cityCode==null){
            $portal = Portal::all();
        }else{
            $portal=[];
        }
        return view('main.archive.index',compact('cityCode','portal'));
    }
    public function archiveCatg($cityCode,$catg)
    {
        switch ($catg) {
            case 'time':               
                return redirect()->route('posts.city',['city'=>$cityCode,'name'=>ucfirst($cityCode).' Archive']);            

            case 'work':
                $profession = DB::table('professionmapping')
                    ->leftJoin('professiontagmapping', 'professionmapping.professioncode', '=', 'professiontagmapping.professioncode')
                    ->select('professionmapping.*', 'professiontagmapping.tagid')
                    ->get()
                    ->groupBy('maincode')
                    ->map(function ($professions) {
                        return $professions->groupBy('professioncode')->map(function ($items, $professioncode) {
                            $firstItem = $items->first();
                            $profession = collect($firstItem)->except('tagid')->toArray();
                            $profession['tags'] = $items->pluck('tagid')->filter()->toArray();
                            return $profession;
                        })->values();
                    });



                return view('main.archive.catg', compact('profession', 'catg','cityCode'));




            case 'education':

                break;

            case 'workemotion':

                break;

            default:

                break;
        }
        return view('main.archive.catg');
    }

    public function entity($catg, $entity)
    {
        return 1;
    }
    public function archivePosts($citySlug,$catg, $ids, $name)
    {
        $ids = explode('-', $ids);
        $portal = Portal::where('slug', $citySlug)->firstOrFail(); 
        $cityCode=$portal->city_code;
        $chittiIds = DB::table('chittitagmapping as tag')
        ->join('vchittigeography as vg', 'vg.chittiId', '=', 'tag.chittiId')
        ->where('vg.Geography', $cityCode)
        ->whereIn('tag.tagId', $ids)
        ->pluck('tag.chittiId');
      

        // Fetch Chittis with eager loading for images and tags, ordered by createDate desc
        $chittis = Chitti::whereIn('chittiId', $chittiIds)
            ->where('finalStatus', 'approved')
            ->orderBy('chittiId', 'desc') // Add ordering by createDate desc
            ->with(['images', 'tags.tag'])
            ->paginate(35);


        $postsByMonth = $chittis->groupBy(function ($chitti) {
            return \Carbon\Carbon::parse($chitti->createDate)->format('F Y');
        })->map(function ($chittis) {
            return $chittis->map(function ($chitti) {
                // Retrieve image or use default
                $imageUrl = ChittiImageMapping::where('chittiId', $chitti->chittiId)->value('imageName') ?? asset('default_image.jpg');
                // Return formatted data
                return [
                    'id' => $chitti->chittiId,
                    'title' => $chitti->Title,
                    'subTitle' => $chitti->SubTitle,
                    'description' => $chitti->description,
                    'imageUrl' => $imageUrl,
                    'createDate' => $chitti->createDate,
                ];
            });
        });

        // Return view with data
        return view('portal.post', [
            'city_name' => $portal->city_name ,
            'postsByMonth' => $postsByMonth,
            'cityCode' => $portal->city_code,
            'chittis' => $chittis,
            'name' => ucfirst($name)
        ]);

        // return $citySlug;
    }
}
