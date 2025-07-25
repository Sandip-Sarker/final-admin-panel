@extends('backend.master')

@section('main-content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Permission</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permission</li>
            </ol>
        </div>
    </div>


    <!-- Row -->
    <div class="row row-sm">

        <!-- Table -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Permission List</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive deleted-table">
{{--                        <button id="button" class="btn btn-primary float-end mb-4 data-table-btn">Delete selected row</button>--}}
{{--                        <table id="delete-datatable" class="table table-bordered text-nowrap border-bottom">--}}
                        <table class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="col-lg-4">
            <div class="card custom-card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Permission</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <form id="permissionForm">
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input class="form-control" name="name" id="name" placeholder="Enter Permission Name" type="text">
                            </div>

                            <button type="submit" class="btn ripple w-100 btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->



    <script>


        async function getList() {
            try {
                let response = await axios.get("/admin/permission/list");
                if (response.data.success && response.data.code === 200) {
                    const permissions = response.data.data;
                    const tbody = document.querySelector('table tbody');
                    tbody.innerHTML = ''; // Clear existing rows

                    permissions.forEach((permission, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${permission.name}</td>
                        <td>
                            <!-- Example Action buttons -->
                            <button class="btn btn-sm btn-warning" onclick="editPermission(${permission.id})">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="deletePermission(${permission.id})">Delete</button>
                        </td>
                    `;
                        tbody.appendChild(row);
                    });
                } else {
                    errorToast(response.data.message || 'Failed to fetch permissions');
                }
            } catch (error) {
                console.error(error);
                errorToast('Error fetching permissions');
            }
        }

        {{-- Store Data --}}
        document.getElementById('permissionForm').addEventListener('submit', async function (event){
            event.preventDefault();

            let name = $('#name').val().trim();

            if (name.length === 0){
                errorToast('Name is required');
            }else{

                let response  = await axios.post("permission/store",{name:name})


                if (response.data.success === true && response.data.code === 200){
                    successToast('Permission Created Successfully');
                    this.reset();
                }
                else{
                    errorToast("Request fail !")
                }
            }
        });
    </script>





@endsection
