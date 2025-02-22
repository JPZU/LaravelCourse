<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Product;


class ProductController extends Controller

{


    public function index(): View

    {

        $viewData = [];

        $viewData["title"] = "Products - Online Store";

        $viewData["subtitle"] = "List of products";

        $viewData["products"] = Product::all();

        return view('product.index')->with("viewData", $viewData);
    }


    public function show(string $id): View | RedirectResponse

    {
        $viewData = [];
        if ($product = Product::find($id)) {

            $viewData["title"] = $product["name"] . " - Online Store";

            $viewData["subtitle"] = $product["name"] . " - Product information";

            $viewData["product"] = $product;

            return view('product.show')->with("viewData", $viewData);
        } else {

            return redirect()->action([ProductController::class, 'index']);
        }
    }

    public function create(): View

    {

        $viewData = []; //to be sent to the view

        $viewData["title"] = "Create product";


        return view('product.create')->with("viewData", $viewData);
    }


    public function save(Request $request): RedirectResponse

    {

        $request->validate([

            "name" => "required",

            "price" => "required|numeric|min:1"

        ]);


        Product::create($request->only(["name", "price"]));

        return redirect()->action([ProductController::class, 'index']);
    }
}
