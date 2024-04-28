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
                    class="fa fa-plus"></i>
                @lang('add_new')</a>
        </h1>
    </section>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <form action="{{ route(Request::segment(2) . '.index') }}" method="GET">
                {{-- <h3 class="box-title">@lang('list')</h3> --}}

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('Keyword') </label>
                                <input type="text" class="form-control" name="keyword" placeholder="@lang('keyword_note')"
                                    value="{{ isset($params['keyword']) ? $params['keyword'] : '' }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tìm kiếm theo</label>
                                <select name="group_id" class="form-control select2">
                                    <option value="">-Vui lòng chọn-</option>
                                    @foreach ($searchGroups as $item)
                                        <option value="{{ $item->id }}"
                                            {{ (isset($params['group_id']) && $params['group_id']) == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="taxonomy" class="form-control select2">
                                    <option value="">-Vui lòng chọn-</option>
                                    @foreach ($taxonomys as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($params['taxonomy']) && $params['taxonomy'] == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('Filter')</label>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm mr-10">@lang('Submit')</button>
                                    <a class="btn btn-default btn-sm" href="{{ route(Request::segment(2) . '.index') }}">
                                        @lang('Reset')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="box">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="tab-pane active">

                            @if (session('errorMessage'))
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    {{ session('errorMessage') }}
                                </div>
                            @endif
                            @if (session('successMessage'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    {{ session('successMessage') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>

                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach

                                </div>
                            @endif

                            @if (!$rows->total())
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    @lang('not_found')
                                </div>
                            @else
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tiêu đề</th>
                                            <th>Tìm kiếm theo</th>
                                            <th>Danh mục</th>
                                            <th>@lang('updated_at')</th>
                                            <th>@lang('Thao tác')</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($rows as $stt => $row)
                                            <form action="{{ route(Request::segment(2) . '.destroy', $row->id) }}"
                                                method="POST" onsubmit="return confirm('@lang('confirm_action')')">
                                                <tr class="valign-middle">
                                                    <td>
                                                        {{ $stt + 1 }}
                                                    </td>
                                                    <td>
                                                        {{ $row->title }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            foreach ($searchGroups as $key => $value) {
                                                                echo $value->id == $row->group_id ? $value->title : '';
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            foreach ($taxonomys as $item) {
                                                                $array_taxonomy[$item->id] = $item->title;
                                                            }

                                                            $taxonomy = explode(',', trim($row->taxonomy, ','));
                                                            foreach ($taxonomy as $value) {
																if(isset($array_taxonomy[$value])){
																	echo $array_taxonomy[$value] . '<br>';
																}
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        {{ $row->updated_at }}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                            title="@lang('update')"
                                                            data-original-title="@lang('update')"
                                                            href="{{ route(Request::segment(2) . '.edit', $row->id) }}">
                                                            <i class="fa fa-pencil-square-o"></i>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" type="submit"
                                                            data-toggle="tooltip" title="@lang('delete')"
                                                            data-original-title="@lang('delete')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach

                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($rows->hasPages())
            <div class="box-footer clearfix">
                {{ $rows->withQueryString()->links('admin.pagination.default') }}
            </div>
        @endif
        {{-- </div> --}}
    </section>
@endsection
