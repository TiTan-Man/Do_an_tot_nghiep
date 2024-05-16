@extends('frontend.layouts.default')

@php
    $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
    $image_background =
        $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');

    $order_detail_status = App\Consts::ORDER_DETAIL_STATUS;
@endphp

@section('content')
    <section id="content">
        <div class="breadcrumb full-width">
            <div class="background-breadcrumb"></div>
            <div class="background">
                <div class="shadow"></div>
                <div class="pattern">
                    <div class="container">
                        <div class="clearfix">
                            <ul class="breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                                <li class="item"><a itemprop="url" title="Trang chủ"
                                        href="{{ route('frontend.home') }}"><span itemprop="title">Trang chủ</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::check())
            <div class="main-content full-width inner-page">
                <div class="background-content"></div>
                <div class="background">
                    <div class="shadow"></div>
                    <div class="pattern">
                        <div class="container">

                            <div class="container">
                                <h2>Danh sách đơn hàng</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày mua</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Size</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Giảm giá</th>
                                            <th>Tổng đơn hàng</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $detail)
                                            @if ($detail->orderDetails->count() > 0)
                                                <tr>
                                                    <td rowspan="{{ $detail->orderDetails->count() }}">#{{ $detail->id }}
                                                    </td>
                                                    <td rowspan="{{ $detail->orderDetails->count() }}">
                                                        {{ $detail->order_date }}</td>

                                                    @foreach ($detail->orderDetails as $key => $item)
                                                        @if ($key > 0)
                                                            </tr><tr>
                                                        @endif
                                                        
                                                        <td>{{ $item->product->title }}</td>
                                                        <td>{{ $item->size }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->price }}</td>
                                                     @endforeach 
                                                       
                                                        <td>{{ $detail->discount }}</td>
                                                        <td>{{ $detail->total_order }}</td>

                                                        <td>
                                                            @foreach ($order_detail_status as $key => $status)
                                                                {{ isset($item->status) && $item->status == $key ? $status : '' }}
                                                            @endforeach
                                                        </td>
                                                   
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>#{{ $detail->id }}</td>
                                                    <td>{{ $detail->order_date }}</td>
                                                    <td>{{ $detail->orderDetails->first()->product->title }}</td>
                                                    <td>{{ $detail->orderDetails->first()->size}}</td>                                                    
                                                    <td>{{ $detail->orderDetails->first()->quantity }}</td>
                                                    <td>{{ $detail->orderDetails->first()->price }}</td>
                                                    <td>{{ $detail->orderDetails->first()->quantity * $detail->orderDetails->first()->price }}
                                                    </td>
                                                    <td>
                                                        @foreach ($order_detail_status as $key => $status)
                                                            {{ $detail->orderDetails->first()->status == $key ? $status : '' }}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="main-content full-width inner-page">
                <div class="background-content"></div>
                <div class="background">
                    <div class="shadow"></div>
                    <div class="pattern">
                        <div class="container">

                            <div class="container">
                                <h3 class="alert alert-warning" style="text-align: center">Vui lòng đăng nhập để xem chi tiết!
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection

<style>
    table {
        width: 100%;
    }

    th,
    td {
        text-align: center;
    }
</style>
