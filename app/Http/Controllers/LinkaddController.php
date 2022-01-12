<?php

namespace App\Http\Controllers;
use App\Models\Linkadd;

use Illuminate\Http\Request;

class LinkaddController extends Controller
{
    
    public function view($id)
    {
        return Linkadd::where('name',$id)->get();
    }
    public function store(Request $request)
    {
        $data = $request;
        $check = Linkadd::where('name',$data['name'])->get();
        if (count($check)==0) {
            $new = new Linkadd;
            $new['name']=$data['name'];
            $new['url']=$data['url'];
            $new->save();
            return $new;

        }else{
            $data=$check[0]->fill([
                'name' => $data['name'],
                'url' => $data['url']
            ])->save();
            return $data;
        }
        
    }
}
