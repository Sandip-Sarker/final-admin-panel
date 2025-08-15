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
                        <table class="table table-bordered text-nowrap border-bottom" id="tableData">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody id="tableList">

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

                            <button type="submit" class="btn addBtn btn-outline-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->


    <!-- Edit Modal -->
    <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-labelledby="createModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <form id="editPermissionForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Edit Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">⨯</button>
                    </div>

                    <input type="hidden" id="editPermissionId" name="permission_id">


                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name<span class="text-danger">*</span></label>
                            {{-- Fill existing title if available --}}
                            <input name="name" id="editName" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>
        getUser();

        async function getUser() {
            try {
                const response = await axios.get('/admin/permission/list');
                console.log(response)
                let tableList = $('#tableList');
                let data = response.data;
                tableList.empty();

                data.data.forEach(function (item, index) {
                    let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>
                        <button data-id="${item.id}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item.id}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>`;
                    tableList.append(row);
                });

            } catch (error) {
                console.error("Axios error:", error);
            }


            //delete
            $('.deleteBtn').on('click', async function () {
                let id = $(this).data('id')

                try {
                    let response = await axios.delete(`/admin/permission/delete/${id}`);
                    let data = response.data;

                    if (data.success === true && response.status === 200) {
                        successToast('Permission Deleted Successfully');
                        getUser();
                    }
                } catch (error) {
                    console.error(error);
                }

            })

            //edit
            $('.editBtn').on('click', async function() {
                let id = $(this).data('id')

                $('#editPermissionId').val('id');

                let res = await axios.get(`/admin/permission/edit/${id}`)


                if (res.status === 200) {
                    let permission = res.data.data;

                    $('#editName').val(permission.name);
                    $('#editPermissionId').val(permission.id);
                }

               $('#editPermissionModal').modal('show');
            });
        }
    </script>

    {{--  Store data  --}}
    <script>
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
                    getUser();
                }
                else{
                    errorToast("Request fail !")
                }
            }
        });
    </script>

    {{--  Update data  --}}
    <script>
        document.getElementById('editPermissionForm').addEventListener('submit', async function (event){
            event.preventDefault();
            let id      = $('#editPermissionId').val();
            let name    = $('#editName').val();

            if (name.length === 0) {
                errorToast('Name is required');
            } else {
                try {
                    const res = await axios.post(`/admin/permission/update/${id}`, {
                        name: name,
                        _token: '{{ csrf_token() }}'
                    });
                    console.log(res);
                    if (res.status === 200) {
                        successToast('Permission updated successfully');
                        $('#editPermissionModal').modal('hide');
                        getUser();

                    }
                } catch (error) {
                    console.error(error);
                    errorToast('Update failed');
                }
            }
        });
    </script>
@endsection
