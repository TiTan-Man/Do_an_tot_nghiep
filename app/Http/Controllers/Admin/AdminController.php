<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Services\AdminService;
use App\Models\Role;
use App\Consts;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    private $adminService;

    public function __construct()
    {
        $this->adminService = new AdminService();
        $this->routeDefault  = 'admins';
        $this->viewPart = 'admin.pages.admins';
        $this->responseData['module_name'] = __('Admin user management');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = trim($request->input('keyword'));

        $admins = $this->adminService->getAdmins($request->all(), true);

        $this->responseData['admins'] = $admins;
        $this->responseData['keyword'] = $keyword;

        return $this->responseView($this->viewPart . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('status', '=', Consts::USER_STATUS['active'])->orderByRaw('status ASC, iorder ASC, id DESC')->get();
        $this->responseData['roles'] = $roles;

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
            'name' => 'required',
            'email' => "required|email|max:255|unique:admins",
            'password' => "required|min:8|max:255",
        ]);

        $params = $request->only([
            'email',
            'name',
            'role',
            'avatar',
            'status',
            'password',
        ]);
        $params['admin_created_id'] = Auth::guard('admin')->user()->id;
        $params['admin_updated_id'] = Auth::guard('admin')->user()->id;

        Admin::create($params);

        return redirect()->route($this->routeDefault . '.index')->with('successMessage', __('Add new successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Do not use this function
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return redirect()->route($this->routeDefault . '.index')->with('errorMessage', __('Record not found!'));
        }

        $roles = Role::where('status', '=', Consts::USER_STATUS['active'])->orderByRaw('status ASC, iorder ASC, id DESC')->get();

        $this->responseData['roles'] = $roles;
        $this->responseData['admin'] = $admin;

        return $this->responseView($this->viewPart . '.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required',
            'email' => "required|email|max:255|unique:admins,email," . $admin->id,
        ]);

        $params = $request->only([
            'email',
            'name',
            'avatar',
            'role',
            'status',
        ]);
        $password_new = $request->input('password_new');
        if ($password_new != '') {
            if (strlen($password_new) < 8) {
                return redirect()->back()->with('errorMessage', __('Password is very short!'));
            }
            $params['password'] = $password_new;
        }
        $params['admin_updated_id'] = Auth::guard('admin')->user()->id;

        $admin->fill($params);
        $admin->save();

        return redirect()->back()->with('successMessage', __('Successfully updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route($this->routeDefault . '.index')->with('successMessage',  __('Delete record successfully!'));
    }
}
