{{-- @extends('layouts.admin')
@section('title', 'Sub Subcategory')
@section('admin-content')
    <main class="mb-5">
        <div class="container">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Create
                    Sub Subcategory</span>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-header py-1"><span style="font-size: 14px;
                            font-weight: 600;
                            color: #0e2c96;">Create Sub Subcategory</span> </div>
                            <div class="card-body table-card-body my-table">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong><label>Name</label><span class="color-red">*</span> <span
                                                            class="my-label">:</span> </strong>
                                                </div>
                                         
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong><label>Category</label><span class="color-red">*</span>
                                                        <span class="my-label">:</span> </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group input-group-sm">
                                                        <select name="category_id" id="category_id"
                                                            class="custom-select js-example-basic-multiple form-control my-select my-form-control @error('category_id') is-invalid @enderror"
                                                            data-live-search="true">
                                                            <option value="">Select Category</option>
                                                            @foreach ($category as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-append">
                                                            <a class="border rounded my-select my-form-control py-0 px-2"
                                                                href="{{ route('category.index') }}" target="_blank"><i
                                                                    class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    @error('category_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <strong><label>Sub Category</label><span class="my-label">:</span>
                                                    </strong>
                                                </div>
                                                <div class="col-md-8 mt-1">
                                                    <div class="input-group input-group-sm">
                                                        <select name="sub_category_id" id="sub_category_id"
                                                            class="js-example-basic-multiple form-control my-form-control @error('sub_category_id') is-invalid @enderror "
                                                            data-live-search="true">
                                                            <option data-tokens="ketchup mustard" value="">Select Sub
                                                                Category</option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <a class="border rounded my-select my-form-control py-0 px-2"
                                                                href="{{ route('subcategory.index') }}"
                                                                target="_blank"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    @error('sub_category_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-sm float-right mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
    </main>
@endsection
@push('admin-js')
    <script src="{{ asset('admin/js/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/js/sweetalert2.all.js') }}"></script>
    <script>
        function deleteUser(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
    <script>
        function toggleEnable(id) {
            var textbox = document.getElementById(id);
            if (textbox.disabled) {
                document.getElementById(id).disabled = false;
            } else {
                document.getElementById(id).disabled = true;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $("select[name='category_id']").on('change', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ url('product/subcategory/list') }}/" + category_id,
                    dataType: "json",
                    method: "GET",
                    success: function(data) {
                        $('#sub_category_id').empty();
                        $.each(data, function(key, value) {
                            $('#sub_category_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });

            });
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function printable() {
            $('#printable_table').css('display', 'block');
            var printContents = document.getElementById('printable_table').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush --}}
