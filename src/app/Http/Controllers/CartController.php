<?php


namespace App\Http\Controllers;


use App\Http\Resources\Resource;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
//    protected $entity;

    function __construct()
    {
        //        $this->entity = Cart::class;
    }

    public function get(Request $request)
    {
        $products_id = Cart::where('project_id', $request->bearerToken())
            ->where('session_user', $request->param)
            ->pluck('product_id');


        return Product::where('project_id', $request->bearerToken())
            ->where('id', $products_id)
            //            ->find($products_id)
            ->with([
                //                'category' => function($query) use ($request) {
                //                    $query->where('project_id', $request->bearerToken());
                //                },
                //                'image' => function($query) use ($request) {
                //                    $query->where('project_id', $request->bearerToken());
                //                },
                'size' . "." . 'price' => function($query) use ($request) {
                    $query->where('project_id', $request->bearerToken());
                },
            ])->get()
            ->map(function($item, $key) {
                $item->push('quantity');
                $item['quantity'] = '1';
                return $item;
            })
            ;


        //        $container = app();
        //        $session_token = $request->session()->get('_token', 'Такой сессии нет');


        //Добавить одно значение в сессию
//        $request->session()->put('name', 'value');



        //Добавить несколько значений в сессию
//        $request->session()->put([
//            'key' => 'value',
//            'key2' => 'value2'
//        ]);

//        $session_token = $request->session()->all();
//        $response = $container->make(ContractCart::class)->productsCart($session_user);
//        return new Resource($response);

        //        return $products_cart;

    }

    public function store(Request $request)
    {

//        cюда передать с фронта уникальный номер сгенерированный в nuxtserverinit
        $sessionUser = $request->sessionUser;


//        $request->session()->put('name', $idUser);

//        $session_token = $request->session()->get('_token');
//        $session_name = $request->session()->get('name');

        $data = [
            'project_id' => $request->bearerToken(),
            'session_user' => $sessionUser,
            'product_id' => $request->product_id
        ];
        Cart::where('project_id', $request->bearerToken())
            ->create($data);
        return $data;
    }

    public function deleteOne(Request $request, $param, $param2)
    {
        return Cart::where('project_id', $request->bearerToken())
            ->where('product_id', $param)
            ->where('session_user', $param2)
            ->delete();
    }

    public function deleteAll(Request $request, $param2)
    {
        Cart::where('project_id', $request->bearerToken())
            ->where('session_user', $param2)
            ->delete();
    }

}
