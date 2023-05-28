@extends('layouts.main')

@section('content')
<div class="row justify-content-center mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h3>Login Here</h3>
    </div>
    <div class="card-body">
      <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" value="{{old('password')}}" name="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </form>

      <div class="text-center mt-2">
        <a href="{{route('register.view')}}" class="text-primary">Don't Have an Account? Register Here</a>
      </div>
    </div>
  </div>
</div>
@endsection
