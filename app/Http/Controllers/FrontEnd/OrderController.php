<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Models\CmsProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Voucher;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Environment\Console;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrderService(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'customer_note' => "required|string",
                'item_id' => "required|integer|min:0",
            ]);
            // Check and store order
            $order_params = $request->only([
                'name', 'email', 'phone', 'customer_note'
            ]);
            $order_params['is_type'] = Consts::ORDER_TYPE['service'];
            $order = Order::create($order_params);

            // Check and store order_detail
            $order_detail_params = $request->only([
                'item_id', 'quantity', 'price', 'discount'
            ]);
            $order_detail_params['quantity'] = $request->get('quantity') > 0 ? $request->get('quantity') : 1;
            $order_detail_params['order_id'] = $order->id;
            $order_detail_params['json_params']['post_type'] = Consts::POST_TYPE['service'];
            $order_detail_params['json_params']['post_link'] = $request->headers->get('referer');

            $order_detail = OrderDetail::create($order_detail_params);

            $messageResult = $this->web_information->information->notice_advise ?? __('Booking successfull!');

            if (isset($this->web_information->information->email)) {
                $email = $this->web_information->information->email;
                Mail::send(
                    'frontend.emails.booking',
                    [
                        'order' => $order,
                        'order_detail' => $order_detail
                    ],
                    function ($message) use ($email) {
                        $message->to($email);
                        $message->subject(__('You received a new appointment from the system'));
                    }
                );
            }
            DB::commit();
            return $this->sendResponse($order, $messageResult);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    // Cart
    public function cart()
    {
        return $this->responseView('frontend.pages.cart.index');
    }

    public function addToCart(Request $request)
    {
        $quantity = request('quantity') ?? '1';
        $id = request('id') ?? '';
        $size = request('size') ?? '';
        $product = CmsProduct::findOrFail($id);

        if($quantity <= 0){
            //số lượng không đủ
            echo 1;

        }else{
            $price = $product->giakm ?? $product->gia;
             
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
                
            } else {
                $cart[$id] = [
                    "title" => $product->title,
                    "quantity" => $quantity,
                    "price" => $price,
                    "image" => $product->image,
                    "image_thumb" => $product->image_thumb,
                    "size" => $size
                ];
            }
            session()->put('cart', $cart);

            echo 2;
        }
    }

    public function updateCart(Request $request)
    {
        $quantity = request('quantity') ?? '1';
        $id = request('id') ?? '';
        $totalPrice = 0;
        $size = request('size') ?? 'S';

        if ($id && $quantity) {
            $cart = session()->get('cart');
            $cart[$id]["quantity"] = $quantity;
            $cart[$id]["size"] = $size;
            session()->put('cart', $cart);
            
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
            return response()->json([
                'quantity' => $cart[$id]['quantity'],
                'price' => $cart[$id]['quantity'] * $cart[$id]['price'],
                'totalPrice' => $totalPrice,
                'size'=> $cart[$id]['size'],
            ]);
        }
    }
    public function checkVoucher(Request $request){
        $voucher = request('voucher') ?? '';
        $voucher = Voucher::where('voucher_code', $voucher)->first();
        $total = 0;
        $discount = 0;
        if($voucher) {
            if($voucher->sl > 0){
                $discount = $voucher->giatri;
                foreach(session('cart') as $id => $details){
          
                        $total += $details['price'] * $details['quantity'] ;
                   
                }
                $total = $total - $discount;
                return response()->json(['message'=>"Mã giảm giá trị giá " . $discount, 'total' => $total,'discount' =>  $discount]);
            }else{
                foreach(session('cart') as $id => $details){
                    $discount = 0;
                    if(isset($details['price']) && isset($details['quantity'])){
                        $total += $details['price'] * $details['quantity'];
                    }elseif (isset($details['price']) && isset($details['quantity'])) {
                        $total += $details['price'] * $details['quantity'];   
                    }
                }
                return response()->json(['message'=> "Mã giảm giá đã hết lượt", 'total' => $total,'discount' =>  $discount]);
                };
        }else{ 
            foreach(session('cart') as $id => $details){
                $discount = 0;
                if(isset($details['price']) && isset($details['quantity'])){
                    $total += $details['price'] * $details['quantity'];
                }elseif (isset($details['price']) && isset($details['quantity'])) {
                    $total += $details['price'] * $details['quantity'];   
                }
            }
            return response()->json(['message'=> "Mã giảm giá không tồn tại", 'total' => $total,'discount' =>  $discount]);
        }
        
    }
    public function removeCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('successMessage', 'Product removed successfully!');
        }
    }

    public function storeOrderProduct(Request $request)
    {
        
        DB::beginTransaction();
        try {
            $cart = session()->get('cart', []);
            if (empty($cart)) {
                return redirect()->back()->with('errorMessage', __('Cart is empty!'));
            }

            $request->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);
            // Check and store order
            $order_params = $request->only([
                'name',
                'email',
                'phone',
                'address',
                'customer_note',
                'total_order',
                'discount'
            ]);
            $order_params['is_type'] = Consts::ORDER_TYPE['product'];
            $order_params['order_date'] = Carbon::now();
            if ($request->customer_id) {
                $order_params['customer_id'] = $request->customer_id;
            }

            $order = Order::create($order_params);
            $name_voucher = $request->name_voucher;
            $vouche_instance = Voucher::where('voucher_code',$name_voucher)->first();
            
            $vouche_instance->sl = $vouche_instance->sl - 1;
            // dd($vouche_instance->sl);
            try{
                $vouche_instance->save();
            }
            catch(Exception $ex){
                
            }
            $data = [];
            foreach ($cart as $id => $details) {
                // Check and store order_detail
                $order_detail_params['order_id'] = $order->id;
                $order_detail_params['item_id'] = $id;
                $order_detail_params['size'] = $details['size'] ?? null;
                $order_detail_params['quantity'] = $details['quantity'] ?? 1;
                $order_detail_params['price'] = $details['price'] ?? null;
                $order_detail_params['customer_note'] = $details['price'] ?? null;
                $order_detail_params['admin_note'] = $order->admin_note;
                $order_detail_params['status'] = 'pending';
                array_push($data, $order_detail_params);

                $product = CmsProduct::findOrFail($id);
                if($details['size'] == 'S'){
                    $quantity = $details['quantity'];
                    if($product->S - $quantity < 0){
                        return redirect()->back()->with('error', 'Trong kho hiện còn '.$product->S.' size S');
                    }else{
                        $product->S = $product->S - $quantity;
                    }
                    
                    $product->save();
                }elseif($details['size'] == 'M'){
                    $quantity = $details['quantity'];
                    if($product->M - $quantity < 0){
                        return redirect()->back()->with('error', 'Trong kho hiện còn '.$product->M.' size M');
                    }else{
                        $product->M = $product->M - $quantity;
                    }
                    $product->save();
                }elseif($details['size'] == 'L'){
                    $quantity = $details['quantity'];
                    if($product->L - $quantity < 0){
                        return redirect()->back()->with('error', 'Trong kho hiện còn '.$product->L.' size L');
                    }else{
                        $product->L = $product->L - $quantity;
                    }
                    $product->save();
                }elseif($details['size'] == 'XL'){
                    $quantity = $details['quantity'];
                    if($product->XL - $quantity < 0){
                        return redirect()->back()->with('error', 'Trong kho hiện còn '.$product->XL.' size XL');
                    }else{
                        $product->XL = $product->XL - $quantity;
                    }
                    $product->save();
                }
                
                

            }
            OrderDetail::insert($data);



            $messageResult = $this->web_information->information->notice_order_cart ?? __('Submit order successfull!');

            // if (isset($this->web_information->information->email)) {
            //     $email = $this->web_information->information->email;
            //     Mail::send(
            //         'frontend.emails.order',
            //         [
            //             'order' => $order
            //         ],
            //         function ($message) use ($email) {
            //             $message->to($email);
            //             $message->subject(__('You received a new order from the system'));
            //         }
            //     );
            // }
            DB::commit();
            session()->forget('cart');

            // return redirect()->back()->with('successMessage', $messageResult);
            session()->flash('success', 'Đặt hàng thành công. Cảm ơn bạn đã mua hàng!');
            return redirect()->back();
        } catch (Exception $ex) {
            // DB::rollBack();
            // throw $ex;
            session()->flash('error', 'Có lỗi xảy ra!');
        }
    }

    public function orderTracking()
    {
        if (Auth::check()) {
            $id = auth()->user()->id;

            $orders = Order::with('orderDetails')
                ->where('customer_id', $id)
                ->orderBy('id', 'DESC')
                ->get();

                // dd($orders);

            $this->responseData['details'] = $orders;
        }
        return $this->responseView('frontend.pages.product.order_tracking');
    }
}
