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
     * Ajax interface for filtering data
     */
    public function filter(){

    }

    /**
     * Pulling completion data
     * @param $request
     */
    public function pull(Request $request) {
        $data = $request->all();
        $requestData = $data['filter'];

        $returnData = '';

        foreach($requestData as $id => $value) {
            switch ($id) {
                case 'manufacturer' :
                    if ($value == "all") {
                        $modelsArray = Models::all()->toArray();
                    } else {
                        $manufacturer = Manufacturers::where('id', $value)->first();
                        $modelsArray = Models::where('vendor', $manufacturer->vendor)->get(['model'])->toArray();
                    }

                    foreach ($modelsArray as $model) {
                        $returnData['models'][] = $model['model'];
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
}
