<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\RoleRequest;
use App\Trait\response;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use response;

    public function index()
    {
        $data['title'] = 'Roles';
        return view('backend.component.role.create')->with('title');
    }

    public function roleGetList()
    {

        $roles = Role::all();

        if ($roles->count() > 0) {
            return $this->successResponse('Permission Get successfully.', 200, $roles);
        } else {
            return $this->errorResponse( 'Permission not found.', 200, null);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role       = new Role();
        $role->name = $request->input('name');
        $role->save();

        if ($role) {
            return $this->successResponse('Role created successfully',200, $role);
        }else {
            return $this->errorResponse('Role not created', 500, []);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
