<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use App\Http\Controllers\Admin\Controller ;
use App\Http\Services\ContentService;
use App\Models\Search;
use App\Models\SearchDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchDetailController extends Controller
{
    public function __construct()
    {
        $this->routeDefault  = 'search_detail';
        $this->viewPart = 'admin.pages.search_detail';
        $this->responseData['module_name'] = __('Quản lý tìm kiếm chi tiết');
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
        $rows = ContentService::getSearchDetail($params)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);

        $params = array('status' => 'true');
        $searchGroups = ContentService::getSearch($params)->get();

        $paramsTx = array(
            'status' => Consts::TAXONOMY_STATUS['active'],
            'taxonomy' => Consts::CATEGORY['san-pham'],
        );
        $taxonomys = ContentService::getCmsTaxonomy($paramsTx)->get();

        $this->responseData['searchGroups'] = $searchGroups;
        $this->responseData['taxonomys'] = $taxonomys;
        $this->responseData['params'] = $params;
        $this->responseData['rows'] =  $rows;

        return $this->responseView($this->viewPart . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = array(
            'status' => 'true',
        );
        $searchGroups = ContentService::getSearch($params)->get();

        $paramsTx = array(
            'status' => Consts::TAXONOMY_STATUS['active'],
            'taxonomy' => Consts::CATEGORY['san-pham'],
        );
        $taxonomys = ContentService::getCmsTaxonomy($paramsTx)->get();


        $this->responseData['searchGroups'] = $searchGroups;
        $this->responseData['taxonomys'] = $taxonomys;

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

        $params = $request->all();
        
		
		if(isset($params['taxonomy']) and count($params['taxonomy']) > 0){
			$params['taxonomy'] = is_array($params['taxonomy']) ? implode(",", $params['taxonomy']) . ',' : '';
		}else{
			$params['taxonomy'] = '';
		}
		
		//$params['taxonomy'] = is_array($params['taxonomy']) ? implode(",", $params['taxonomy']) . ',' : '';

        $params['status'] = 'true';
        $params['admin_created_id'] = Auth::guard('admin')->user()->id;
        $params['admin_updated_id'] = Auth::guard('admin')->user()->id;

        SearchDetail::create($params);

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
        $rows = SearchDetail::find($id);

        $params = array(
            'status' => 'true',
        );
        $searchGroups = ContentService::getSearch($params)->get();

        $paramsTx = array(
            'status' => Consts::TAXONOMY_STATUS['active'],
            'taxonomy' => Consts::CATEGORY['san-pham'],
        );
        $taxonomys = ContentService::getCmsTaxonomy($paramsTx)->get();

        if (!$rows) {
            return redirect()->route($this->routeDefault . '.index')->with('errorMessage', __('Record not found!'));
        }

        $this->responseData['rows'] = $rows;
        $this->responseData['searchGroups'] = $searchGroups;
        $this->responseData['taxonomys'] = $taxonomys;

        return $this->responseView($this->viewPart . '.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SearchDetail $searchDetail)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $params = $request->all();
		
		//dd($params['taxonomy']);
		
		if(isset($params['taxonomy']) and count($params['taxonomy']) > 0){
			$params['taxonomy'] = is_array($params['taxonomy']) ? implode(",", $params['taxonomy']) . ',' : '';
		}else{
			$params['taxonomy'] = '';
		}
		
        $params['status'] = 'true';
        $params['admin_updated_id'] = Auth::guard('admin')->user()->id;

        $searchDetail->update($params);

        return redirect()->back()->with('successMessage', __('Successfully updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SearchDetail $searchDetail)
    {
        $searchDetail->update([
            'status' => Consts::STATUS['false'],
            'admin_updated_id' => Auth::guard('admin')->user()->id
        ]);

        return redirect()->route($this->routeDefault . '.index')->with('successMessage',  __('Delete record successfully!'));
    }
}
