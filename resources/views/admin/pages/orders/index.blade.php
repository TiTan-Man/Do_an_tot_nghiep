@extends('admin.layouts.app')

@section('title')
  {{ $module_name }}
@endsection

@section('content-header')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $module_name }}
      <a class="btn btn-sm btn-warning pull-right" href="{{ route(Request::segment(2) . '.create') }}"><i
          class="fa fa-plus"></i> @lang('add_new')</a>
    </h1>
  </section>
@endsection

@section('content')

  <!-- Main content -->
  <section class="content">
    {{-- Search form --}}
    <div class="box box-default">

      <div class="box-header with-border">
        <h3 class="box-title">@lang('search')</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
	  
      <form action="{{ route(Request::segment(2) . '.index') }}" method="GET">
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <input type="text" class="form-control" name="keyword" placeholder="@lang('keyword_note')"
                  value="{{ isset($params['keyword']) ? $params['keyword'] : '' }}">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                  <option value="">@lang('status')</option>
                  @foreach (App\Consts::ORDER_STATUS as $key => $value)
                    <option value="{{ $key }}"
                      {{ isset($params['status']) && $key == $params['status'] ? 'selected' : '' }}>
                      {{ __($value) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">@lang('search')</button>
                <a class="btn btn-default btn-sm" href="{{ route(Request::segment(2) . '.index') }}">
                  @lang('reset')
                </a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    {{-- End search form --}}

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">@lang('list')</h3>
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
					<th>STT</th>
					<th>Thông tin đơn hàng</th>
					<th>YC xuất VAT</th>
					<th>Giá trị</th>
					<th>Loại đơn</th>
					<th>Thanh toán</th>
					<th>@lang('status')</th>
					<th>@lang('action')</th>
				  </tr>
				</thead>
				<tbody>
					<?php
					$stt = 0;
					foreach ($rows as $row){ $stt ++;
					?>
					  <form action="{{ route(Request::segment(2) . '.destroy', $row->id) }}" method="POST"
						onsubmit="return confirm('@lang('confirm_action')')">
						<tr class="valign-middle">
							<td>
							{{ $stt }}
							</td>
							<td>
								<a href="javascript:;">{{ $row->trans_code }}</a><br>
								<a href="javascript:;">{{ $row->name }}</a><br>
								<span>Ngày tạo: {{ date('d/m/Y H:i',strtotime( $row->created_at)) }}</span>
							</td>
							<td>
								
							</td>
							<td>
							<span class="nowrap">Tổng tiền: <b>{{ number_format ($row->total_order) }}</b></span><br>
							<span class="nowrap">Thanh toán: <b style="color:brown">{{ number_format ($row->payment) }}</b></span>
							</td>
							<td>
							
							</td>
							<td>
							{{-- {{ $array_payment_method[$row->payment_method] }}<br> --}}
							{{-- <span class="badge badge-soft-secondary">{{ $array_payment_staus[$row->payment_status] }}</span> --}}
							</td>
							<td>
                @foreach (App\Consts::ORDER_STATUS as $key => $item)
                    {{ $row->status == $key ? $item : '' }}
                @endforeach
							</td>
							
						  <td>
							<a class="btn btn-sm btn-warning" data-toggle="tooltip" title="@lang('view')"
							  data-original-title="@lang('view')"
							  href="{{ route(Request::segment(2) . '.edit', $row->id) }}">
							  <i class="fa fa-pencil-square-o"></i>
							</a>
							@csrf
							@method('DELETE')
							<button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" title="@lang('delete')"
							  data-original-title="@lang('delete')">
							  <i class="fa fa-trash"></i>
							</button>
						  </td>
						</tr>
					  </form>
					
					<?php } ?>
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
