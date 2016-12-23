<?php

namespace App\Http\Controllers;

use App\Car;
use App\Categories;
use App\Cities;
use App\Manufacturers;
use App\Mesaj;
use App\Models;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function profil() {

        $user_info = User::where('id',Auth::user()->id)->first()->toArray();
        $offers = Car::where('user_id', Auth::user()->id)->get()->toArray();
        $cities = Cities::all()->toArray();
        $gelen = Mesaj::where('kime',Auth::user()->id)
                ->leftJoin('users','users.id','=','mesaj_kutusu.kimden')
                ->get()->toArray();
        $gonderilen = Mesaj::where('kimden',Auth::user()->id)
                      ->leftJoin('users','users.id','=','mesaj_kutusu.kime')
                      ->get()->toArray();

        return view('/profil')->with(
            [
                "user_info" => $user_info,
                "offers" => $offers,
                "cities" => $cities,
                "gelen" => $gelen,
                "gonderilen" => $gonderilen
            ]
        );
    }


    public function mesajGonder(Request $request) {

        $mesaj = new Mesaj();
        $mesaj['kime'] = $request['kime'];
        $mesaj['kimden'] = $request['kimden'];
        $mesaj['baslik'] = $request['mesaj_baslik'];
        $mesaj['icerik'] = $request['mesaj_aciklama'];
        $mesaj->save();

        $user_info = User::where('id',Auth::user()->id)->first()->toArray();
        $offers = Car::where('user_id', Auth::user()->id)->get()->toArray();
        $cities = Cities::all()->toArray();
        $gelen = Mesaj::where('kime',Auth::user()->id)
            ->leftJoin('users','users.id','=','mesaj_kutusu.kimden')
            ->get()->toArray();
        $gonderilen = Mesaj::where('kimden',Auth::user()->id)
            ->leftJoin('users','users.id','=','mesaj_kutusu.kime')
            ->get()->toArray();

        return view('profil')->with(
            [
                "user_info" => $user_info,
                "offers" => $offers,
                "cities" => $cities,
                "gelen" => $gelen,
                "gonderilen" => $gonderilen
            ]
        );
    }
    


    public function updateUser(Request $request) {
        $data = $request->all();
        $eski = User::where('id',Auth::user()->id)->first();
        if (!empty($data)) {
            $destinationPath = public_path()."/assets/uploads/";
            if(!empty(Input::file('image'))){
                $newName = date('YmdHis',time()).mt_rand().'.jpg';
                Input::file('image')->move($destinationPath,$newName);
            }
            else if (file_exists($destinationPath.$eski->profil_foto)) {
                $newName = $eski->profil_foto;
            }
            else{
                $newName = "default_profile_picture.jpg";
            }
            $data['isim'] = empty($data['isim'])? $eski->name: $data['isim'];
            $data['soyisim'] = empty($data['soyisim'])? $eski->soyisim: $data['soyisim'];
            $data['telefon'] = empty($data['telefon'])? $eski->telefon: $data['telefon'];
            $data['adres'] = empty($data['adres'])? $eski->adres: $data['adres'];


            
            User::where('id',Auth::user()->id)->update([
                'name' => $data['isim'],
                'soyisim' => $data['soyisim'],
                'telefon' => $data['telefon'],
                'il' => $data['il'],
                'ilce' => $data['ilce'],
                'adres' => $data['adres'],
                'profil_foto' => $newName
            ]);

        }


        $user_info = User::where('id',Auth::user()->id)->first()->toArray();
        $offers = Car::where('user_id', Auth::user()->id)->get()->toArray();
        $cities = Cities::all()->toArray();
        $gelen = Mesaj::where('kime',Auth::user()->id)
            ->leftJoin('users','users.id','=','mesaj_kutusu.kimden')
            ->get()->toArray();
        $gonderilen = Mesaj::where('kimden',Auth::user()->id)
            ->leftJoin('users','users.id','=','mesaj_kutusu.kime')
            ->get()->toArray();

        return view('/profil')->with(
            [
                "user_info" => $user_info,
                "offers" => $offers,
                "cities" => $cities,
                "gelen" => $gelen,
                "gonderilen" => $gonderilen
            ]
        );
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
            $offer['vendor'] = $data['manufacturer1'];
            $offer['model'] = $data['model'];
            $offer['category'] = $data['category'];
            $offer['registration_year'] = $data['year'];
            $offer['traveled'] = $data['traveled'];
            $offer['city'] = $data['city'];
            $offer['price'] = $data['price'];
            $offer['images'] = json_encode($imagesArray);
            $offer['user_id'] = Auth::user()->id;
            $offer['yakit_id'] = $data['yakit'];
            $offer['vites_id'] = $data['vites'];
            $offer['kasa_id'] = $data['kasa'];
            $offer['cekis_id'] = $data['cekis'];
            $offer['yakit_tuketim'] = $data['yakit_tuketim'];
            $offer['motor_hacim_id'] = $data['motor_hacim'];
            $offer['motor_gucu_id'] = $data['motor_gucu'];
            $offer['renk_id'] = $data['renk'];
            $offer['garanti'] = $data['garanti'];
            $offer['takas'] = $data['takas'];
            $offer['durum_id'] = $data['durum'];
            $offer['plaka_id'] = $data['plaka'];
            $offer['kimden'] = $data['kimden'];

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



    /**
     * Pulling completion data
     * @param $request
     */
    public function filterAdmin(Request $request) {
        $data = $request->all();
        $requestData = $data['filterAdmin'];

        $returnData = '';

        foreach($requestData as $id => $value) {
            switch ($id) {
                case 'manufacturer' :
                    if ($value == "all") {
                        $modelsArray = Models::all()->toArray();
                        $categories = Categories::all()->toArray();
                        $cities = Cities::all()->toArray();
                    } else {
                        $modelsArray = models::where('vendor', $value)->get(['model'])->toArray();

                        $categories = Car::where("vendor", $value)->get(['category'])->toArray();
                        $cities = Car::where("vendor", $value)->get(['city'])->toArray();
                    }

                    foreach ($modelsArray as $model) {
                        $returnData['models'][] = $model['model'];

                    }

                    foreach ($categories as $category) {
                        $returnData['categories'][] = $category['category'];
                    }

                    foreach ($cities as $city) {
                        $c = isset($city['city']) ? $city['city'] : $city['name'];
                        $returnData['cities'][] = $c;
                    }
                    break;
                case 'model':
                    if ($value == "all") {
                        $categories = Categories::all()->toArray();
                        $cities = Cities::all()->toArray();
                    } else {

                        $categories = Car::where("model", $value)->get(['category'])->toArray();
                        $cities = Car::where("model", $value)->get(['city'])->toArray();

                    }

                    foreach ($categories as $category) {
                        $returnData['categories'][] = $category['category'];
                    }

                    foreach ($cities as $city) {
                        $c = isset($city['city']) ? $city['city'] : $city['name'];
                        $returnData['cities'][] = $c;
                    }

                    break;

                case 'category' :

                    if ($value == "all") {
                        $cities = Cities::all()->toArray();
                    } else {

                        $cities = Car::where("category", $value)->where("model" ,$value["model"])->get(['city'])->toArray();
                    }


                    foreach ($cities as $city) {

                        //$c = isset($city['id']) ? $city['city'] : $city['name'];
                        //$returnData['cities'][] = $c;
                        $returnData['cities'][] = $city['city'];
                    }

                    break;
                default:
                    break;
            }
        }
        echo json_encode($returnData);
    }
   
}
