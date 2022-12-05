@extends('layouts.admin')
@section('title', 'Edit Brand')
@section('admin-content')
<main>
   <div class="container ">
    <div class="heading-title p-2 my-2">
        <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="{{route('admin.index')}}">Home</a> > brand Update</span>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-cogs"></i>
            Update Brand
        </div>
        <div class="card-body table-card-body p-3 mytable-body">
            <form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label> Name</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="name" value="{{ $brand->name }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Image <small>(width: 410px X 186px)</small></label>
                                </div>
                                <div class="col-md-7">
                                    <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                                </div>
                                <div class="col-md-5"></div>
                                <div class="col-md-7 text-center mt-2">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height:120px;width:140px; background: #3f4a49;">
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-sm mt-2" value="Submit">Update</button>
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
    document.getElementById("previewImage").src="{{ asset($brand->image) }}";
    
    
</script> 

@endpush