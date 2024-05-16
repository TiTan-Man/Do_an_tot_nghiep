<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Http\Services\ContentService;
use App\Http\Services\PageBuilderService;
use App\Models\Popup;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use stdClass;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Part to views for Controller
    protected $viewPart;
    // Data response to view
    protected $responseData = [];
    protected $web_information;

    public function __construct()
    {
        // Get all global system params
        $options = ContentService::getOption();
        if ($options) {
            $this->web_information = new stdClass();
            foreach ($options as $option) {
                $this->web_information->{$option->option_name} = json_decode($option->option_value);
            }
            $this->responseData['web_information'] = $this->web_information;
        }
    }

    /**
     * Xử lý các thông tin hệ thống trước khi đổ ra view
     * @author: ThangNH
     * @created_at: 2021/10/01
     */

    protected function responseView($view)
    {
        $this->responseData['user_auth'] = Auth::user();
        //$this->responseData['menu'] = ContentService::getMenu(['status' => 'active', 'order_by' => ['iorder' => 'ASC']])->get();
        // Set locale to use mutiple languages 
        if (session('locale') !== null) {
            App::setLocale(session('locale'));
        }
        $this->responseData['locale'] = App::getLocale();

        $this->responseData['taxonomy_all'] = ContentService::getCmsTaxonomy(['status' => 'active', 'order_by' => ['iorder' => 'ASC']])->get();

        // Get page info and block default
        $params_page['route_name'] = Route::getCurrentRoute()->getName();
        $params_page['id'] = $this->responseData['web_information']->page->{$params_page['route_name']} ?? null;

        $page = ContentService::getPage($params_page)->first();
        $this->responseData['page'] = $page;
		
		$params_bl = array();
		$blocksContent = ContentService::getBlockContentByParams($params_bl)->get();
		$this->responseData['blocksContent'] = $blocksContent;
		
        // Get Block content by page
        if (isset($page->json_params->block_content)) {
            $params_block['template'] = $page->json_params->template;
            $params_block['status'] = 'active';
            $params_block['order_by'] = [
                'iorder' => 'ASC',
                'id' => 'DESC'
            ];
			
        }
		
        // Lấy tất cả bản dịch
        $translates = ContentService::getCmsTranslate(array())->get();
        $array_translate = array();

        foreach($translates as $translate){
            $array_translate[strtolower($translate->local)] = $translate->json_param;
        }

        $this->responseData['array_translate'] = $array_translate;
        
        return view($view, $this->responseData);
    }

    protected function sendResponse($data, $message = '')
    {
        $response = [
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response);
    }
}
