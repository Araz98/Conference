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
  <a class="active" href="/Form">📃 Form</a> 
  <a href="/Contact">📩 Contact</a> 
</div>
</div>
            </div>
        </div>
    </div>
</div>


<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Conference Registration Form</h1>
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
    
      <form method="POST" action="/Form" enctype="multipart/form-data">
          @csrf
          <div>
            <label for="id">ID:</label>
            <input type="text" class="form-control" name="id" value="{{ Auth::user()->id }}"/>
          </div>
          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" />
          </div>
          <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="contact_no">Contact No.:</label>
              <input type="text" class="form-control" name="contact_no" placeholder="011-1234567"/>
          </div>

          <div class="form-group">
          <label for="payment">Payment type: </label></br>
                <input type="radio"  name="payment" value="cash">
                <label for="payment">Cash</label></br>
                <input type="radio"  name="payment" value="bank_in">
                <label for="payment">Bank In</label>
          </div>

          @if(isset($conference->upload))
          <img alt="Upload Image" src="/storage/upload/{{$conference->upload}}"/>
          @endif
 
        {{ csrf_field() }}
        <strong><label> User may upload proof of payment below</label></strong>

        <div class="form-group">
            <input type="file" {{ (!empty($conference->upload)) ? "disabled" : ''}} class="form-control-file" name="upload" id="upload" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>

          <div class="form-group">
              <label for="event">Choose Event: </label></br>
                <input type="radio"  name="event" value="event1">
                <label for="event">Industry 4.0 and Beyond</label></br>
                <input type="radio"  name="event" value="event2">
                <label for="event">Business Informatics and Industry 4.0</label></br>
                <input type="radio"  name="event" value="event3">
                <label for="event">Software Systems and Emerging Technologies Communication Networks and Industry 4.0</label>
          </div>
          <div class="form-group">
              <label for="online">Attendance Type: </label></br>
                <input type="radio"  name="online" value="attend_online">
                <label for="online">Online</label></br>
                <input type="radio"  name="online" value="attend_live">
                <label for="online">Attend Event</label>
          </div>
          <div class="form-group">
              <label for="fees">Fees (RM/USD): </label></br>
                <input type="radio"  name="fees" value="Normal (Non-Member IEEE)"></input>
                <label for="fees">Normal (Non-Member IEEE) - RM2200 / USD530</label></br>
                <input type="radio"  name="fees" value="IEEE_Member"></input>
                <label for="fees">IEEE Member - RM2000 / USD480</label></br>
                <input type="radio"  name="fees" value="Student"></input>
                <label for="fees">Student - RM1600 / USD385</label>
          </div>
          <button type="submit">Submit ✌️</button>
      </form>
  </div>
</div>
</div>
@endsection
