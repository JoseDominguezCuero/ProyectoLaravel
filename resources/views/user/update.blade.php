@extends('layout')
@section('title', $user->id ? 'Actualizar Usuario' : 'Nuevo Usuario')
@section('header', $user->id ? 'Actualizar Usuario' : 'Nuevo Usuario')
@section('content')

<form action="{{route('user.save')}}" method="post">
  @csrf
  <input type="hidden" name="id" value="{{ $user->id}}">
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" value="{{ @old('name') ? @old('name') : $user->name }}">
        </div>
        @error('name')
        <p class="text-danger">
          {{$message}}
        </p>
        @enderror
    </div>

    <div class="row mb-3">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="email" value="{{ @old('email') ? @old('email') : $user->email }}">
      </div>
      @error('email')
      <p class="text-danger">
        {{$message}}
      </p>
      @enderror
    </div>

  <div class="row mb-3">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}</a>        
    </div>
    @error('password')
    <p class="text-danger">
      {{$message}}
    </p>
    @enderror
  </div> 
  
  <div class="row mb-3">  
    <label for="area" class="col-sm-2 col-form-label">Area</label>  
      <div class="col sm-10">
          <select name="area[]" id="area" class="form-select">
              @foreach ($areas as $area)
              <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
          </select>
      </div>  
    @error('area')
    <p class="text-danger">
      {{$message}}
    </p>
    @enderror
  </div>
  
    <div class="row mb-3">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <a href="/users" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</form>

@endsection