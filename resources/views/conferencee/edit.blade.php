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
  <a  href="/adminhome">🏠 Home</a> 
  <a href="/admincontact">📞 Contact</a> 
  <a  href="/mail">📩 Email</a> 
</div>
</div>
            </div>
        </div>
    </div>
</div>


<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3"><h1 class="display-3">Update a Participant</h1></h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div></br>
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h4> {{ \Session::get('success')}}</h4>
    </div>
    @endif
    
      <form method="POST" action="/update/{{ $conference->id }} ">
          @csrf
          <div class="form-group">    
              <label for="id">ID</label>
              <input type="text" class="form-control" name="id" value={{ $conference->id }} />
          </div>

          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value={{ $conference->name }} />
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" value={{ $conference->email }} />
          </div>
          <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address" value={{ $conference->address }} />
          </div>
          <div class="form-group">
              <label for="contact_no">Contact No.:</label>
              <input type="text" class="form-control" name="contact_no" value={{ $conference->contact_no }} />
          </div>
          
          <div class="form-group">
          <label for="payment">Payment type: </label></br>
          @if ($conference->payment == 'cash')
          <input type="radio"  name="payment" value="cash" checked>
          <label for="payment">Cash</label></br>
          <input type="radio"  name="payment" value="bank_in">
          <label for="payment">Bank In</label>
          @else
          <input type="radio"  name="payment" value="cash">
          <label for="payment">Cash</label></br>
          <input type="radio"  name="payment" value="bank_in" checked>
          <label for="payment">Bank In</label>
          @endif
          </div>

          <div class="form-group">
          <label for="event">Choose Event: </label></br>
          @if($conference->event == 'event1')
                <input type="radio"  name="event" value="event1" checked>
                <label for="event">Industry 4.0 and Beyond</label></br>
                <input type="radio"  name="event" value="event2">
                <label for="event">Business Informatics and Industry 4.0</label></br>
                <input type="radio"  name="event" value="event3">
                <label for="event">Software Systems and Emerging Technologies Communication Networks and Industry 4.0</label>
            @elseif($conference->event == 'event2')
                <input type="radio"  name="event" value="event1">
                <label for="event">Industry 4.0 and Beyond</label></br>
                <input type="radio"  name="event" value="event2" checked>
                <label for="event">Business Informatics and Industry 4.0</label></br>
                <input type="radio"  name="event" value="event3">
                <label for="event">Software Systems and Emerging Technologies Communication Networks and Industry 4.0</label>
            @else
                <input type="radio"  name="event" value="event1">
                <label for="event">Industry 4.0 and Beyond</label></br>
                <input type="radio"  name="event" value="event2">
                <label for="event">Business Informatics and Industry 4.0</label></br>
                <input type="radio"  name="event" value="event3" checked>
                <label for="event">Software Systems and Emerging Technologies Communication Networks and Industry 4.0</label>
            @endif
          </div>

          <div class="form-group">
          <label for="online">Attendance Type: </label></br>
          @if ($conference->online == 'attend_online')
                <input type="radio"  name="online" value="attend_online" checked>
                <label for="online">Online</label></br>
                <input type="radio"  name="online" value="attend_live">
                <label for="online">Attend Event</label>
          @else
                <input type="radio"  name="online" value="attend_online">
                <label for="online">Online</label></br>
                <input type="radio"  name="online" value="attend_live" checked>
                <label for="online">Attend Event</label>
          @endif
          </div>

          <div class="form-group">
          <label for="fees">Fees: </label></br>
          @if($conference->fees == "Normal (Non-Member IEEE)")
                <input type="radio"  name="fees" value="Normal (Non-Member IEEE)" checked></input>
                <label for="fees">Normal (Non-Member IEEE) - RM2200 / USD530</label></br>
                <input type="radio"  name="fees" value="IEEE_Member"></input>
                <label for="fees">IEEE Member - RM2000 / USD480</label></br>
                <input type="radio"  name="fees" value="Student"></input>
                <label for="fees">Student - RM1600 / USD385</label>
           @elseif($conference->fees == 'IEEE_Member' )
                <input type="radio"  name="fees" value="Normal (Non-Member IEEE)"></input>
                <label for="fees">Normal (Non-Member IEEE) - RM2200 / USD530</label></br>
                <input type="radio"  name="fees" value="IEEE_Member" checked></input>
                <label for="fees">IEEE Member - RM2000 / USD480</label></br>
                <input type="radio"  name="fees" value="Student"></input>
                <label for="fees">Student - RM1600 / USD385</label>
            @else
            <input type="radio"  name="fees" value="Normal (Non-Member IEEE)"></input>
                <label for="fees">Normal (Non-Member IEEE) - RM2200 / USD530</label></br>
                <input type="radio"  name="fees" value="IEEE_Member" checked></input>
                <label for="fees">IEEE Member - RM2000 / USD480</label></br>
                <input type="radio"  name="fees" value="Student"></input>
                <label for="fees">Student - RM1600 / USD385</label>
            @endif
          </div>

          </br>
          <div class="form-group">
          <label for="payed">Payed: </label></br>
          @if ($conference->payed == 'YES')
                <input type="radio"  name="payed" value="YES" checked/>
                <label for="payed">Yes</label></br>
                <input type="radio"  name="payed" value="NO" />
                <label for="payed">No</label>
           @elseif($conference->payed == 'NO')
                <input type="radio"  name="payed" value="YES" />
                <label for="payed">Yes</label></br>
                <input type="radio"  name="payed" value="NO" checked />
                <label for="payed">No</label>
            @else
                <input type="radio"  name="payed" value="YES" />
                <label for="payed">Yes</label></br>
                <input type="radio"  name="payed" value="NO"  />
                <label for="payed">No</label>
            @endif
          </div>
          <div class="form-group">
          <label for="attendance">Attendance: </label></br>
          @if($conference->attendance == 'YES')
                <input type="radio"  name="attendance" value="YES" checked/>
                <label for="attendance">Yes</label></br>
                <input type="radio"  name="attendance" value="NO" />
                <label for="attendance">No</label>
          @elseif($conference->attendance == 'NO')
                <input type="radio"  name="attendance" value="YES" />
                <label for="attendance">Yes</label></br>
                <input type="radio"  name="attendance" value="NO" checked/>
                <label for="attendance">No</label>
            @else
                <input type="radio"  name="attendance" value="YES" />
                <label for="attendance">Yes</label></br>
                <input type="radio"  name="attendance" value="NO" />
                <label for="attendance">No</label>
            @endif
          </div>

          <button type="submit" >Update ✌️</button>
          
      </form>
  </div>
</div>
</div>
@endsection
