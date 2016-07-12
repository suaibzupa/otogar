<?php

namespace App\Http\Controllers;

use App\Car;
use App\Categories;
use App\Cities;
use App\Manufacturers;
use App\Models;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createOffer(Request $request) {
        $data = $request->all();

        if (!empty($data)) {
            $images = $_FILES['images'];

            $img_desc = $this->reArrayFiles($images);
            $imagesArray = [];

            foreach($img_desc as $val)
            {
                $newName = date('YmdHis',time()).mt_rand().'.jpg';
                $destinationPath = public_path()."/assets/uploads/";
                move_uploaded_file($val['tmp_name'],$destinationPath.$newName);
                $imagesArray[] = $newName;
            }


            $offer = new Car();

            $offer['headText'] = $data['headText'];
            $offer['description'] = $data['description'];
            $offer['vendor'] = $data['manufacturer'];
            $offer['model'] = $data['model'];
            $offer['category'] = $data['category'];
            $offer['registration_year'] = $data['year'];
            $offer['traveled'] = $data['traveled'];
            $offer['city'] = $data['city'];
            $offer['images'] = json_encode($imagesArray);
            $offer['user_id'] = Auth::user()->id;

            $offer->save();
        }

        $offers = Car::where('user_id', Auth::user()->id)->get()->toArray();
        $manufacturers = Manufacturers::all()->toArray();
        $models = Models::all()->toArray();
        $categories = Categories::all()->toArray();
        $cities = Cities::all()->toArray();

        return view('adminMenu')->with(
            [
                "manufacturers" => $manufacturers,
                "models"=>$models,
                "categories" => $categories,
                "cities" => $cities,
                "offers" => $offers
            ]
        );
    }

    private function reArrayFiles($file)
    {
        $file_ary = array();
        $file_count = count($file['name']);
        $file_key = array_keys($file);

        for($i=0;$i<$file_count;$i++)
        {
            foreach($file_key as $val)
            {
                $file_ary[$i][$val] = $file[$val][$i];
            }
        }
        return $file_ary;
    }

    public function removeOffer($offer_id) {
        $car = Car::find($offer_id);
        $car->delete();

        return redirect('/admin');
    }
}
