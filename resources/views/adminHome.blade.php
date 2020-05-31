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
  <a class="active" href="/adminhome">🏠 Home</a> 
  <a href="/admincontact">📩 Contact</a> 
  <a  href="/mail">📩 Email</a> 
</div>
                </div>
            </div>
        </div>
    </div>
</div></br>
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h4> {{ \Session::get('success')}}</h4>
    </div>
    @endif
    <div class="container">
		<form action="/search" method="GET" >
			<div class="input-group">
				<input type="search" class="form-control" name="search"
					placeholder="Search participants"></input>
					<button type="submit">🔍
					</button>&nbsp;
                    <a href="/adminhome" class="btn btn-primary">View all</a></br>
			</div>
		</form>
    </div></br>
    
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Address</td>
          <td>Contact No.</td>
          <td>Payment</td>
          <td>Event</td>
          <td>Attendance Type</td>
          <td>Fees</td>
          <td>Payed</td>
          <td>Attendance</td>
          <td>Registered At </td>
          <td colspan = 6>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($conferences as $conference) 
        
        <tr>
            <td>{{$conference->id}}</td>
            <td>{{$conference->name}}</td>
            <td>{{$conference->email}}</td>
            <td>{{$conference->address}}</td>
            <td>{{$conference->contact_no}}</td>
            <td>{{$conference->payment}}</td>
            <td>{{$conference->event}}</td>
            <td>{{$conference->online}}</td>
            <td>{{$conference->fees}}</td>
            <td>{{$conference->payed}}</td>
            <td>{{$conference->attendance}}</td>
            <td>{{$conference->updated_at}}</td> 
            <td>
                <a href="/view/{{ $conference->id }}" class="btn btn-secondary">View 👀</a>
            </td>
            <td>
                <a href="/edit/{{ $conference->id }}" class="btn btn-primary">Edit 👈</a>
            </td>
            <td>
                <a href="/delete/{{ $conference->id }}" method="post" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete 🤔</a>
            </td> 
        </tr>
    @endforeach
    </tbody>
  </table>

@endsection