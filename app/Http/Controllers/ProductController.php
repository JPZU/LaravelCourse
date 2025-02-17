<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProductController extends Controller

{

    public static $products = [

        ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => "1000"],

        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => "1500"],

        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "price" => "200"],

        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "price" => "50"]

    ];


    public function index(): View

    {

        $viewData = [];

        $viewData["title"] = "Products - Online Store";

        $viewData["subtitle"] = "List of products";

        $viewData["products"] = ProductController::$products;

        return view('product.index')->with("viewData", $viewData);
    }


    public function show(string $id): View | RedirectResponse

    {
        $viewData = [];
        if (array_key_exists($id - 1, ProductController::$products)) {
            $product = ProductController::$products[$id - 1];

            $viewData["title"] = $product["name"] . " - Online Store";

            $viewData["subtitle"] = $product["name"] . " - Product information";

            $viewData["product"] = $product;

            return view('product.show')->with("viewData", $viewData);
        } else {

            return redirect()->action([HomeController::class, 'index']);
        }
    }

    public function create(): View

    {

        $viewData = []; //to be sent to the view

        $viewData["title"] = "Create product";


        return view('product.create')->with("viewData", $viewData);
    }


    public function save(Request $request)

    {

        $request->validate([

            "name" => "required",

            "price" => "required"

        ]);

        dd($request->all());

        //here will be the code to call the model and save it to the database

    }
}
