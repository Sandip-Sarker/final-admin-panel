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
                                <input class="form-control" name="name" id="name" placeholder="Enter Role Name" type="text">
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
    <div class="modal fade" id="editPermissionModal" tabindex="-1" aria-labelledby="createModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <form id="editPermissionForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Edit Role</h5>
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


@endsection

@push('scripts')



    {{--  Store  --}}
    <script>
        $(document).ready(function () {
            $('.addBtn').on('click', async function () {
                let name = $('#name').val();

                if (name.length === 0){
                    errorToast('Name is required');
                }else {
                    let response = await axios.post("{{route('role.store')}}", {name:name})
                    let data = response.data;

                    if (data.success === true && data.code === 200){
                        successToast(data.message);
                        ('#roleForm').reset();
                    }else {
                        errorToast(data.message);
                    }
                }
            });
        });
    </script>
@endpush

