@extends('base')
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
<div class="navbar">
  <a  href="/home">🏠 Home</a> 
  <a href="/Form">📃 Form</a> 
  <a class="active" href="/Contact">📩 Contact</a> 
</div>
</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Contact</h1>
    We will try our best to serve you 🤗</br>

    ALL REPLY ARE THROUGH EMAIL, KINDLY CHECK IT ✌️
  <div>
  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h4> {{ \Session::get('success')}}</h4>
    </div>
    @endif

      <form method="post" action="/Contact">
          @csrf
          <div class="form-group">    
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}"/>
          </div>

          <div class="form-group">
              <label for="name">Content:</label>
              <textarea type="text" class="form-control" name="content"></textarea>
          </div>
          <button type="submit">Submit ✌️</button>
      </form>
      </div>
</div>
</div>
@endsection