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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        getUser();

        async function getUser() {
            try {
                const response = await axios.get('/admin/permission/list');
                // console.log(response)
                let tableList = $('#tableList');
                tableList.empty();

                response.data.data.forEach(function (item, index) {
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

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            let response = await axios.delete(`/admin/permission/delete/${id}`);
                            console.log(response)
                            if (response.data.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "The item has been deleted.",
                                    icon: "success"
                                }).then(() => {
                                    // Optionally remove the row from table or reload
                                     getUser() // or $(this).closest('tr').remove();
                                });
                            } else {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        } catch (error) {
                            Swal.fire("Error!", "Deletion failed.", "error");
                            console.error(error);
                        }
                    }
                });
            })
        }
    </script>

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
                }
                else{
                    errorToast("Request fail !")
                }
            }
        });
    </script>


@endsection
