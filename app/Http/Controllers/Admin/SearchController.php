<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use App\Http\Controllers\Admin\Controller ;
use App\Http\Services\ContentService;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->routeDefault  = 'search';
        $this->viewPart = 'admin.pages.search';
        $this->responseData['module_name'] = __('Quản lý tìm kiếm');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $params['keyword'] = $request->get('keyword');
        $params['status'] = 'true';
        $rows = ContentService::getSearch($params)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
        $this->responseData['rows'] =  $rows;

        $params['status'] = '1';
        return $this->responseView($this->viewPart . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->responseView($this->viewPart . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Search::create([
            'title' => $request->title,
            'status' => 'true',
            'admin_created_id' => Auth::guard('admin')->user()->id,
            'admin_updated_id' => Auth::guard('admin')->user()->id
        ]);

        return redirect()->route($this->routeDefault . '.index')->with('successMessage', __('Add new successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rows = Search::find($id);

        if (!$rows) {
            return redirect()->route($this->routeDefault . '.index')->with('errorMessage', __('Record not found!'));
        }
        $this->responseData['rows'] = $rows;

        return $this->responseView($this->viewPart . '.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Search $search)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $search->update([
            'title' => $request->title,
            'status' => 'true',
            'admin_updated_id' => Auth::guard('admin')->user()->id
        ]);

        return redirect()->back()->with('successMessage', __('Successfully updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        $search->update([
            'status' => 'false',
            'admin_updated_id' => Auth::guard('admin')->user()->id
        ]);

        return redirect()->route($this->routeDefault . '.index')->with('successMessage',  __('Delete record successfully!'));
    }
}
