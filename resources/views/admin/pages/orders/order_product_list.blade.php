@extends('admin.layouts.app')

@section('title')
    {{ $module_name }}
@endsection

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $module_name }}
        </h1>
    </section>
@endsection

@section('content')

    @php
        $array_status = App\Consts::ORDER_DETAIL_STATUS;
    @endphp

    <!-- Main content -->
    <section class="content">
        {{-- Search form --}}
        <div class="box box-default">

            <div class="box-header with-border">
                <h3 class="box-title">@lang('Filter')</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <form action="{{ route(Request::segment(2) . '.index') }}" method="GET">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>@lang('Keyword') </label>
                                <input type="text" class="form-control" name="keyword"
                                    placeholder="{{ __('Fullname') . ', ' . __('Email') . ', ' . __('Phone') . '...' }}"
                                    value="{{ isset($params['keyword']) ? $params['keyword'] : '' }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>@lang('Status')</label>
                                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                                    <option value="">@lang('Vui lòng chọn')</option>
                                    @foreach (App\Consts::ORDER_DETAIL_STATUS as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ isset($params['status']) && $key == $params['status'] ? 'selected' : '' }}>
                                            {{ __($value) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>@lang('From date')</label>
                                <input name="created_at_from" id="created_at_from" class="form-control datepicker"
                                    value="{{ $params['created_at_from'] ?? '' }}" placeholder="@lang('dd/mm/yyyy')">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>@lang('To date')</label>
                                <input name="created_at_to" id="created_at_to" class="form-control datepicker"
                                    value="{{ $params['created_at_to'] ?? '' }}" placeholder="@lang('dd/mm/yyyy')">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>@lang('Filter')</label>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">@lang('Submit')</button>
                                    <a class="btn btn-default btn-sm" href="{{ route(Request::segment(2) . '.index') }}">
                                        @lang('Reset')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- End search form --}}

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">@lang('Danh sách đơn hàng')</h3>
            </div>
            <div class="box-body table-responsive">
                @if (session('errorMessage'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('errorMessage') }}
                    </div>
                @endif
                @if (session('successMessage'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('successMessage') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @if (count($rows) == 0)
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @lang('not_found')
                    </div>
                @else
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>@lang('Họ tên')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Số điện thoại')</th>
                                <th>@lang('Số lượng')</th>
                                <th>@lang('Tạm tính')</th>
                                {{-- <th>@lang('Tổng tiền')</th> --}}
                                <th>@lang('Ghi chú')</th>
                                <th>@lang('Admin note')</th>
                                <th>@lang('Ngày tạo')</th>
                                <th>@lang('Trạng thái')</th>
                                <th>@lang('Thao tác')</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rows as $row)
                                {{-- @if ($row->orderDetails->count() > 0) --}}
                                @foreach ($row->orderDetails as $key => $item)
                                    <form action="{{ route(Request::segment(2) . '.destroy', $row->id) }}" method="POST"
                                        onsubmit="return confirm('@lang('confirm_action')')">
                                        <tr class="valign-middle">
                                            <td>
                                                #{{ $row->id }}
                                            </td>
                                            <td>
                                                <strong style="font-size: 14px;">{{ $row->name }}</strong>
                                            </td>
                                            <td>
                                                {{ $row->email }}
                                            </td>
                                            <td>
                                                {{ $row->phone }}
                                            </td>

                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->quantity * $item->price) }}</td>
                                            {{-- <td>
                                                {{ number_format($row->total_money) }}
                                            </td> --}}
                                            <td>
                                                {{ Str::limit($row->customer_note, 200) }}
                                            </td>
                                            <td>
                                                {{ Str::limit($row->admin_note, 200) }}
                                            </td>
                                            <td>
                                                {{ isset($row->created_at) ? \Carbon\Carbon::parse($row->created_at)->format('d/m/Y') : '' }}
                                            </td>
                                            <td>
                                                <select name="" class="form-control"
                                                    onchange="updateStatus({{ $item->id }})"
                                                    id="update_status_{{ $item->id }}">
                                                    @foreach ($array_status as $key => $status)
                                                        <option value="{{ $key }}"
                                                            {{ $item->status == $key ? 'selected' : '' }}>
                                                            {{ $status }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <img id="ic_loading_{{ $item->id }}"
                                                    style="display: none;vertical-align: middle;" src="/images/load.gif"
                                                    width="20px">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                    title="@lang('view')" data-original-title="@lang('view')"
                                                    href="{{ route(Request::segment(2) . '.show', $row->id) }}">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip"
                                                    title="@lang('delete')" data-original-title="@lang('delete')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-5">
                        Tìm thấy {{ $rows->total() }} kết quả
                    </div>
                    <div class="col-sm-7">
                        {{ $rows->withQueryString()->links('admin.pagination.default') }}
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

<script>
    function updateStatus(id) {
        var status = $('#update_status_' + id).val();
        $('#ic_loading_' + id).show();

        $.ajax({
            url: '{{ route('update_status.order_products') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: status,
                id: id
            },
            context: document.body
        }).done(function(data) {
            $('#ic_loading_' + id).hide();
        });
    }
</script>
