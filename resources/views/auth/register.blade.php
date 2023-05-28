@extends('layouts.main')

@section('content')
<div class="row justify-content-center mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h3>Register Customer</h3>
    </div>
    <div class="card-body">
      <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Full Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" value="{{old('password')}}" name="password" class="form-control"
            id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
          <input type="password" name="password_confirmation" class="form-control"
            id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
          <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="thumbnail" onchange="showName()" required>
            <label class="custom-file-label" id="thumbnail-label" for="thumbnail">Choose file</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </form>

      <div class="d-flex flex-wrap mt-2">
        <a href="{{route('login.view')}}">Already have an account? Login Here</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  function showName() {
    var name = document.getElementById('thumbnail');
    $("#thumbnail-label").text(name.files.item(0).name);
  };
</script>
@endsection
