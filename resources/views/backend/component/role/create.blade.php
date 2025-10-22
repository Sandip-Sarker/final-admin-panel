@extends('backend.master')

@section('main-content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Role</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Role</li>
            </ol>
        </div>
    </div>


    <!-- Row -->
    <div class="row row-sm">

        <!-- Table -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Role List</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive deleted-table">
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

        <!-- Create Form -->
        <div class="col-lg-4">
            <div class="card custom-card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Role</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <form id="roleForm">
                            <div class="form-group">
                                <label>Name<span class="text-danger">*</span></label>
                                <input class="form-control" name="name" id="name" placeholder="Enter Role Name"
                                    type="text">
                            </div>

                            <button type="button" class="btn addBtn btn-outline-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->



    <!-- Edit Modal -->
    <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editRoleForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Edit Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">⨯</button>
                    </div>

                    <input type="hidden" id="editRoleId" name="role_id">


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
@endsection

@push('scripts')
    {{-- Get Role --}}
    <script>
        getRoles();

        async function getRoles() {
            try {
                let response = await axios.get("{{ route('role.list') }}");
                let data = response.data;

                // Destroy old instance if exists
                if ($.fn.DataTable.isDataTable('#tableData')) {
                    $('#tableData').DataTable().clear().destroy();
                }

                let tableList = $('#tableList');
                tableList.empty();

                data.data.forEach(function(item, index) {
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

                // Reinitialize DataTable
                $('#tableData').DataTable({
                    responsive: true,
                    //dom: 'Bfrtip',
                    //buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    pageLength: 10,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    autoWidth: false
                });
            } catch (error) {
                console.error("Axios error:", error);
            }


            //edit
            $('.editBtn').on('click', async function() {
                let id = $(this).data('id')

                $('#editRoleId').val('id');

                let res = await axios.get(`/admin/role/${id}/edit`)
                let data = res.data
                // console.log(data)
                if (data.success === true) {
                    let role = data.data;

                    $('#editName').val(role.name);
                    $('#editRoleId').val(role.id);
                }

                $('#editRoleModal').modal('show');
            });


            // delete role
            $(document).on('click', '.deleteBtn', async function() {
                let id = $(this).data('id');
                try {
                    let response = await axios.delete(`/admin/role/${id}`);
                    let data = response.data;

                    if (data.success === true) {
                        successToast('Role deleted successfully');
                        getRoles(); // ✅ correct function name
                    } else {
                        errorToast(data.message || 'Delete failed');
                    }
                } catch (error) {
                    console.error("Delete error:", error);
                    errorToast('Something went wrong');
                }
            });

        }
    </script>

    {{--  Store  --}}
    <script>
        $(document).ready(function() {
            $('.addBtn').on('click', async function() {
                let name = $('#name').val();

                if (name.length === 0) {
                    errorToast('Name is required');
                } else {
                    let response = await axios.post("{{ route('role.store') }}", {
                        name: name
                    })
                    let data = response.data;

                    if (data.success === true && data.code === 200) {
                        successToast(data.message);
                        getRoles();
                        ('#roleForm').reset();
                    } else {
                        errorToast(data.message);
                    }
                }
            });

        });
    </script>

    {{--  Update  --}}
    <script>
        document.getElementById('editRoleForm').addEventListener('submit', async function(event) {
            event.preventDefault();

            let id = $('#editRoleId').val();
            let name = $('#editName').val();

            if (name.trim().length === 0) {
                errorToast('Name is required');
                return;
            }

            try {
                const res = await axios.put(`/admin/role/${id}`, {
                    name: name,
                    _token: '{{ csrf_token() }}'
                });

                console.log(res);

                if (res.data.success === true) {
                    successToast('Role updated successfully');
                    $('#editRoleModal').modal('hide');
                    getRoles(); // ✅ function name fixed from getUser() to getRoles()
                } else {
                    errorToast(res.data.message || 'Update failed');
                }
            } catch (error) {
                console.error("Axios Error:", error);
                errorToast('Update failed');
            }
        });
    </script>
@endpush
