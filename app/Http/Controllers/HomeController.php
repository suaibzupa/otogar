<?php

namespace App\Http\Controllers;

use App\Car;
use App\Categories;
use App\Cities;
use App\Http\Requests;
use App\Manufacturers;
use App\Mesaj;
use App\Models;
use App\User;
use Illuminate\Http\Request;





class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */



    protected $carIdLike;



    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function mainPage() {
        $cars = Manufacturers::all()->toArray();
        $cities = Cities::all()->toArray();
        $models = Models::all()->toArray();
        $categories = Categories::all()->toArray();
        $carList = Car::orderBy('price', 'desc')->get()->toArray();

        return view('welcome')->with(
            [
                "cars" => $cars,
                "cities" => $cities,
                "models" => $models,
                "categories" => $categories,
                "carList" => $carList
            ]
        );
    }
    
    public function aboutUs() {


        return view('home');
    }

    /**
     * @param $id
     * @return mixed
     */

    public function likes($id) {
        $car = Car::where('id', $id)->get()->first();

        $car->likesToplam = $car->likesToplam + 1;
        $car->save();

        return $car->likesToplam;
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
     * @param Request $request
     */
    public function gSearch(Request $request) { //genel arama 

        $requestData = $request->all();

        $searchParameters = $requestData['generalS'];


            $returnData = Car::where('vendor', 'LIKE', "%$searchParameters%")->orwhere(
                'model', 'LIKE', "%$searchParameters%"
            )->orwhere(
                'category', 'LIKE', "%$searchParameters%"
            )->orwhere(
                'city', 'LIKE', "%$searchParameters%"
            )->orwhere(
                'registration_year', 'LIKE', "%$searchParameters%"
            )->orwhere(
                'price', 'LIKE', "%$searchParameters%"
            )->get()->toArray();
        
        echo json_encode($returnData);
    }




/*

    //likes ekle
    public function likes(Request $request)
    {
        $requestData = $request->all();

        $searchParameters = $requestData['likes'];


      //  car::table('id',"78")->increment('likes', 3)->save();;

        $returnData = Car::where('vendor', 'LIKE', "%$searchParameters%")->orwhere(
            'model', 'LIKE', "%$searchParameters%"
        )->orwhere(
            'category', 'LIKE', "%$searchParameters%"
        )->orwhere(
            'city', 'LIKE', "%$searchParameters%"
        )->orwhere(
            'registration_year', 'LIKE', "%$searchParameters%"
        )->orwhere(
            'price', 'LIKE', "%$searchParameters%"
        )->get()->toArray();

       echo json_encode($returnData);


    }

        */


        /**
     * @param Request $request
     */
    public function search(Request $request) { //filterli arama
        $requestData = $request->all();
/*
        if ($requestData['manufacturer'] == "all" && $requestData['model'] == "all" && $requestData['category'] == "all" && $requestData['city'] == "all"  ) {
            $returnData = Car::all()->toArray();
        } else*/ {
            
            $searchParameters = [];

            if ($requestData['manufacturer'] != "all") {
                $searchParameters["vendor"] = $requestData['manufacturer'];
            }

            $maxPrice = $requestData['priceRange']['max'];
            $minPrice = $requestData['priceRange']['min'];

            $minYear = $requestData['yearRange']['min'];
            $maxYear = $requestData['yearRange']['end'];

            if ($requestData['city'] != "all") {
                $searchParameters['city'] = $requestData['city'];
            }

            if ($requestData['model'] != "all") {
                $searchParameters['model'] = $requestData['model'];
            }

            if ($requestData['category'] != "all") {
                $searchParameters['category'] = $requestData['category'];
            }

            $returnData = Car::where($searchParameters)->where(
                "registration_year",
                "<=",
                $maxYear
            )->where(
                "registration_year",
                ">=",
                $minYear
            )->where(
                "price",
                ">=",
                $minPrice
            )->where(
                "price",
                "<=",
                $maxPrice
            )->get()->toArray();
        }

        echo json_encode($returnData);
    }


 
    public function advancedsearchjs (Request $request) { //filterli arama
        $requestData = $request->all();
        /*
                if ($requestData['manufacturer'] == "all" && $requestData['model'] == "all" && $requestData['category'] == "all" && $requestData['city'] == "all"  ) {
                    $returnData = Car::all()->toArray();
                } else*/ {

            $searchParameters = [];

            if ($requestData['manufacturer'] != "all") {
                $searchParameters["vendor"] = $requestData['manufacturer'];
            }

            $maxPrice = $requestData['priceRange']['max'];
            $minPrice = $requestData['priceRange']['min'];

            $minYear = $requestData['yearRange']['min'];
            $maxYear = $requestData['yearRange']['end'];

            if ($requestData['city'] != "all") {
                $searchParameters['city'] = $requestData['city'];
            }

            if ($requestData['model'] != "all") {
                $searchParameters['model'] = $requestData['model'];
            }

            if ($requestData['category'] != "all") {
                $searchParameters['category'] = $requestData['category'];
            }

            $returnData = Car::where($searchParameters)->where(
                "registration_year",
                "<=",
                $maxYear
            )->where(
                "registration_year",
                ">=",
                $minYear
            )->where(
                "price",
                ">=",
                $minPrice
            )->where(
                "price",
                "<=",
                $maxPrice
            )->get()->toArray();
        }

        echo json_encode($returnData);
    }

    public function advancedSearch($aranan)

    {

        //echo $aranan;

        // $requestData = $request->all();

        $searchParameters = $aranan;

        /*
                $returnData = Car::where('vendor', 'LIKE', "%$searchParameters%")->orwhere(
                    'model', 'LIKE', "%$searchParameters%"
                )->orwhere(
                    'category', 'LIKE', "%$searchParameters%"
                )->orwhere(
                    'city', 'LIKE', "%$searchParameters%"
                )->orwhere(
                    'registration_year', 'LIKE', "%$searchParameters%"
                )->orwhere(
                    'price', 'LIKE', "%$searchParameters%"
                )->get()->toArray();
                */

        $cars = Car::all()->toArray();
        $Araba = Car::where('vendor', 'LIKE', "%$searchParameters%")->orwhere(
            'model', 'LIKE', "%$searchParameters%"
        )->orwhere(
            'category', 'LIKE', "%$searchParameters%"
        )->orwhere(
            'city', 'LIKE', "%$searchParameters%"
        )->orwhere(
            'registration_year', 'LIKE', "%$searchParameters%"
        )->orwhere(
            'price', 'LIKE', "%$searchParameters%"
        )->get()->toArray();
        $cars = Manufacturers::all()->toArray();
        $cities = Cities::all()->toArray();
        $models = Models::all()->toArray();
        $categories = Categories::all()->toArray();
        $carList = Car::orderBy('price', 'desc')->get()->toArray();

        return view('advancedSearch')->with(
            [
                "araba" => $Araba,


                "cars" => $cars,
                "cities" => $cities,
                "models" => $models,
                "categories" => $categories,
                "carList" => $carList

            ]
        );

        //return view('home');


    }

    /**
     * Pulling completion data
     * @param $request
     */
    public function filter(Request $request) {
        $data = $request->all();
        $requestData = $data['filter'];

        $returnData = '';

        foreach($requestData as $id => $value) {
            switch ($id) {
                case 'manufacturer' :
                    if ($value == "all") {
                        $modelsArray = Models::all()->toArray();
                        $categories = Categories::all()->toArray();
                        $cities = Cities::all()->toArray();
                    } else {
                        $modelsArray = Car::where('vendor', $value)->distinct()->get(['model'])->toArray();

                        $categories = Car::where("vendor", $value)->distinct()->get(['category'])->toArray();
                        $cities = Car::where("vendor", $value)->distinct()->get(['city'])->toArray();
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

                        $categories = Car::where("model", $value)->distinct()->get(['category'])->toArray();
                        $cities = Car::where("model", $value)->distinct()->get(['city'])->toArray();

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

                        if($value['model']=="all"){$cities = Car::where("category", $value)->distinct()->get(['city'])->toArray();}

                        $cities = Car::where("category", $value)->where("model" ,$value["model"])->distinct()->get(['city'])->toArray();
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
    
    

    public function productPage(Request $request, $id) {
        $carId = $id;


        $this->carIdLike = $id;

        $carProperties = Car::where('id', $carId)
                         ->leftJoin('yakit','yakit.yakit_id','=','car.yakit_id')
                         ->leftJoin('vites','vites.vites_id','=','car.vites_id')
                         ->leftJoin('kasa','kasa.kasa_id','=','car.kasa_id')
                         ->leftJoin('cekis','cekis.cekis_id','=','car.cekis_id')
                         ->leftJoin('motor_hacim','motor_hacim.motor_hacim_id','=','car.motor_hacim_id')
                         ->leftJoin('motor_gucu','motor_gucu.motor_gucu_id','=','car.motor_gucu_id')
                         ->leftJoin('durum','durum.durum_id','=','car.durum_id')
                         ->leftJoin('plaka','plaka.plaka_id','=','car.plaka_id')
                         ->first()->toArray();

        $userProperties = User::where('id',$carProperties['user_id'])->first()->toArray();


        return view('product')->with([
            "carData"=>$carProperties, 'id' => $id,
            "userData"=>$userProperties, 'id'
            ]);
    }


    public function admin() {

        return view('adminMenu');
    }


    public function orderBy($type)
    {
        $carList = Car::all()->toArray();
        if (starts_with($type, 'date')) {
            $carList = Car::orderBy('updated_at', substr($type,5))->get()->toArray();
        }
        else if (starts_with($type, 'yil')) {
            $carList = Car::orderBy('registration_year', substr($type,4))->get()->toArray();
        }
        else{
            $carList = Car::orderBy('price', $type)->get()->toArray();
        }

        return json_encode($carList);
    }

}
