<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use App\Trait\ApiResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data['title'] = 'Permission List';
        return view('backend.component.permission.create')->with($data);
    }

    public function permissionList(Request $request)
    {

        $permissions = Permission::latest()->get();

        if ($permissions->count() > 0) {
            return $this->successResponse(true, 'Permission Get successfully.', 200, $permissions);
        } else {
            return $this->errorResponse(false, 'Permission not found.', 404, null);
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        $permission         = new Permission();
        $permission->name   = $request->input('name');
        $permission->save();

        if ($permission) {
            return $this->successResponse(true,'Permission created successfully.', 200, $permission);
        }else{
            return $this->errorResponse(false,'Permission not created.', 404, null);
        }

    }


    public function edit($id)
    {
        $permission = Permission::find($id);
        if ($permission) {
            return $this->successResponse(true, 'Permission get successfully.', 200, $permission);
        }else {
            return $this->errorResponse(false, 'Permission not found.', 404, []);
        }
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);

        if ($permission) {
            $permission->delete();
            return $this->successResponse(true,'Permission deleted successfully.', 200, $permission);
        }else{
            return $this->errorResponse(false,'Permission not found.', 200, null);
        }
    }
}
