<?php

namespace App\Http\Controllers;

use App\Car;
use App\Categories;
use App\Cities;
use App\Http\Requests;
use App\Manufacturers;
use App\Models;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function mainPage() {
        $cars = Manufacturers::all()->toArray();
        $cities = Cities::all()->toArray();
        $models = Models::all()->toArray();
        $categories = Categories::all()->toArray();
        $carList = Car::all()->toArray();

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
    public function gSearch(Request $request) {

        $requestData = $request->all();

        $searchParameters = $requestData;


            $returnData = Car::where($searchParameters, "vendor")->get()->toArray();
        /*where(
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
            )->get()->toArray();*/


        echo json_encode($returnData);
    }





    /**
     * @param Request $request
     */
    public function search(Request $request) {
        $requestData = $request->all();

        if ($requestData['manufacturer'] == "all" && $requestData['model'] == "all" && $requestData['category'] == "all" && $requestData['city'] == "all"  ) {
            $returnData = Car::all()->toArray();
        } else {
            $searchParameters = [];
            $searchParameters["vendor"] = $requestData['manufacturer'];

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
                        $modelsArray = Car::where('vendor', $value)->get(['model'])->toArray();

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

                        $cities = Car::where("category", $value)->get(['city'])->toArray();
                    }


                    foreach ($cities as $city) {
                        $c = isset($city['city']) ? $city['city'] : $city['name'];
                        $returnData['cities'][] = $c;
                    }

                    break;
                default:
                    break;
            }
        }
        echo json_encode($returnData);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @param $id
     */
    public function productPage(Request $request, $id) {
        $carId = $id;

        $carProperties = Car::where('id', $carId)->first()->toArray();

        return view('product')->with(["carData"=>$carProperties]);
    }


    public function admin() {

        return view('adminMenu');
    }



}
