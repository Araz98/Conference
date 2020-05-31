@extends('layouts.app')
@extends('base')

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
  <a  href="/adminhome">🏠 Home</a> 
  <a class="active" href="/admincontact">📞 Contact</a> 
  <a  href="/mail">📩 Email</a> 
</div>
                </div>
            </div>
        </div>
    </div>
</div></br>

    @if(\Session::has('success'))
    <div class="alert">
        <h4> {{ \Session::get('success')}}</h4>
    </div>
    @endif

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
          <td>Email</td>
          <td>Content</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->email}}</td>
            <td>{{$contact->content}}</td>
            
            <td>
                <a href="/mail" class="btn btn-primary">Reply 📧</a>
            </td>
            <td>
                <a href="/deleteContact/{{ $contact->email }}" method="post" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete 🤔</a>            
            </td>
        </tr>  
    @endforeach 
    </tbody>
</table>
@endsection