@extends('layouts.admin')
@section('title', 'Edit childcategory')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> >Update Child Category</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-cogs"></i>
            Update Child Category
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{ route('childcategory.update', $childcategory->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-3">
                                <label for="name">Category Name<span class="text-danger">*</span> </label>
                            </div>
                           <div class="col-9">
                            <select name="category_id" class="form-control form-control-sm @error('category_id') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $childcategory->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach 
                            </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>The Category field is required.</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label for="name">Sub Category Name<span class="text-danger">*</span> </label>
                            </div>
                            <div class="col-9">
                                <select name="subcategory_id" class="form-control form-control-sm @error('subcategory_id') is-invalid @enderror">
                                <option value="">Select Sub Category</option>
                                @foreach ($subcategory as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $childcategory->subcategory_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach 
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>The Category field is required.</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label>Child Category Name</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="name" value="{{ $childcategory->name }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Image </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                                </div>
                                <div class="col-md-12 text-center mt-2">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height:70px;width:100px; background: #3f4a49;">
                                </div>
                            </div>
                    </div>
                    <div class="group">
                        <input type="checkbox" name="is_popular" id="is_popular" {{ !empty($childcategory->is_popular) ? 'checked' : ''}}  value="p" title="is popular">
                        <label for="is_popular">Is popular</label>
                       </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-right btn-sm mt-2" value="Submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
   </div>
      
    </div>
</main>        
@endsection
@push('admin-js')

<script> 
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload=function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)     
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src="{{ asset($childcategory->image) }}";
</script> 
@endpush

