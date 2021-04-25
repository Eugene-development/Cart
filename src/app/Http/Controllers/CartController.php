<?php


namespace App\Http\Controllers;


use App\Http\Resources\Resource;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $entity;

    function __construct()
    {
        $this->entity = Cart::class;
    }

    public function get(Request $request)
    {


//        dd($request->param);
        $products_id = Cart::where('session_user', $request->param)->pluck('product_id');
        $products_cart = Product::find($products_id)->map(function ($item, $key) {
            $item->push('quantity');
            $item['quantity'] = '1';
            return $item;
        });



        $container = app();
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

        return $products_cart;

    }




    public function store(Request $request)
    {

//        cюда передать с фронта уникальный номер сгенерированный в nuxtserverinit
        $sessionUser = $request->sessionUser;


//        $request->session()->put('name', $idUser);

//        $session_token = $request->session()->get('_token');
//        $session_name = $request->session()->get('name');

        $data = [
            'session_user' => $sessionUser,
            'product_id' => $request->product_id
        ];
        Cart::create($data);
        return $data;
    }

    public function deleteOne($param, $param2)
    {
        return Cart::where('product_id', $param)->where('session_user', $param2)->delete();
    }

    public function deleteAll($param2)
    {
//        $session_token = $request->session()->get('_token');


        Cart::where('session_user', $param2)->delete();
    }

}
