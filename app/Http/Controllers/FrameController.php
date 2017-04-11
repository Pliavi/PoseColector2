<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FrameController extends Controller {

    public function saveFrame(Request $request){
        $folder = $request->session()->get('folder');
        $stayOnFrame = false;
        $id = $request->input('id');
        $positions = $request->input('positions');

        foreach ($positions as $value) {
            if($value[0] == 800){
                $stayOnFrame = true;
                $request->session()->flash('error', 'Movimente todos os pontos antes de prosseguir!');
            }
        }

        $json['frame'] = $id;
        $json['positions'] = $positions;
        $json['volunteer'] = $request->session()->get('volunteer');
        $json['date'] = date('Y-m-d');

        $pathToFile = "public/json/collection$folder";
        if(!Storage::exists($pathToFile)) Storage::makeDirectory($pathToFile);
        if(Storage::exists("$pathToFile/frame$id.json")) Storage::delete(["$pathToFile/frame$id.json"]);
        Storage::put("$pathToFile/frame$id.json", json_encode($json));

        if($stayOnFrame){
            return redirect()->route('frame', $id);
        }else{
            return redirect()->route('frame', ++$id);
        }
    }

    public function getFrame(Request $request, $id){
        $folder = $request->session()->get('folder');
        $hideButton = '';

        if ($id <= 1) { 
            $id = 1;
            $hideButton = 'previous';
            $request->session()->flash('info', 'Primeiro frame!');
        } elseif ($id >= config('app.nFrames')) {
            $id = config('app.nFrames');
            $hideButton = 'next';
            $request->session()->flash('info', 'Último frame! Clique em próximo para terminar!');
        }

        $pathToFile = "collection$folder/frame$id";

        if(Storage::exists("public/images/$pathToFile.jpg")){
            $image = "storage/images/$pathToFile.jpg";
        } else {
            $image = '#';
            $id = 1;
            $request->session()->flash('error', 'Não foi possível encontrar a imagem: '.$pathToFile);
            return view('player', compact('id', 'hideButton', 'image', 'positions'));
        }

        $pathToFile = "collection$folder/frame$id";        
        if(Storage::exists("public/json/$pathToFile.json")){
            $positions = (json_decode(Storage::get("public/json/$pathToFile.json")))->positions;
            return view('player', compact('id', 'hideButton', 'image', 'positions'));
        }else{
            return view('player', compact('id', 'hideButton', 'image'));
        }
    }

}
