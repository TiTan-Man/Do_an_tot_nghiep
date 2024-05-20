<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use App\Http\Services\ContentService;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->routeDefault  = 'orders';
        $this->viewPart = 'admin.pages.orders';
        $this->responseData['module_name'] = __('Order Management');
		$this->responseData['array_payment_method'] = array(0=>'COD',1=>'Ví',2=>'Chuyển khoản',3=>'VNPAY',4=>'Viettel money');
		$this->responseData['array_payment_staus'] = array(0=>'Chưa thanh toán',1=>'Đã thanh toán');
	}


	public function index(Request $request)
    {
		if(ContentService::checkRole($this->routeDefault,'index') == 0){
			$this->responseData['module_name'] = __('Bạn không có quyền truy cập chức năng này');
			return $this->responseView($this->viewPart . '.404');
		}
		
		$params = $request->all();
		
		$rows = ContentService::getOrders($params)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
		$this->responseData['rows'] = $rows;
		// dd($rows );
		return $this->responseView($this->viewPart . '.index');
    }

    public function edit(Order $order)
    {
		$this->responseData['module_name'] = __('Quản lý đơn hàng');
        $this->responseData['detail'] = $order;

        $rows = ContentService::getOrderDetail(['order_id'=> $order->id])->get();
        // dd($order);
        $this->responseData['rows'] = $rows;
        return $this->responseView($this->viewPart . '.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|max:255'
        ]);

        $params = $request->only([
            'status', 'admin_note'
        ]);

        $params['admin_updated_id'] = Auth::guard('admin')->user()->id;

        $order->fill($params);
        $order->save();

        return redirect()->back()->with('successMessage', __('Successfully updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->status = 'reject';
        $order->save();
        
        return redirect()->back()->with('successMessage', __('Delete record successfully!'));
    }
}
