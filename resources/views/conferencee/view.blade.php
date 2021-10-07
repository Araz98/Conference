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
    <h1 class="display-3"><h1 class="display-3">Participation Info</h1></h1>
  <div>
    
      <form method="get" action="/view/{{ $conference->id }} ">
          @csrf
          <div class="form-group">    
              <strong >ID:</strong>
              <input type="text" class="form-control" name="id" value="{{ $conference->id}}" readonly/>
          </div>

          <div class="form-group">
              <strong>Name:</strong>
              <input type="text" class="form-control" name="name" value="{{ $conference->name }}" readonly/>
            
          </div>

          <div class="form-group">
              <strong>Email:</strong>
              <input type="text" class="form-control" name="email" value="{{ $conference->email}}" readonly/>
              
          </div>

          <div class="form-group">
              <strong>Address:</strong>
              <input type="text" class="form-control" name="address" value="{{ $conference->address}}" readonly/>
              
          </div>

          <div class="form-group">
              <strong>Contact No.:</strong>
              <input type="text" class="form-control" name="contact_no" value="{{ $conference->contact_no}}" readonly/>
              
          </div>
          
          <div class="form-group">
               <strong>Payment type: </strong>
            @if($conference->payment == 'cash')
               <input type="text" class="form-control" name="payment" value="Cash" readonly/>
            @else
               <input type="text" class="form-control" name="payment" value="Bank In" readonly/>
            @endif
          
          </div>

          <div>
          <strong>Proof of payment (if any)</strong>
          @if($conference->upload != NULL)
          </br><img alt="Upload Image (Proof of payment)" src="/storage/upload/{{$conference->upload}}"/>
          @else
          </br><label>User does not upload proof of payment</label>
          @endif
          
          </div>

         <div class="form-group">
                </br>
                <strong>Choose Event: </strong>
            @if($conference->event == 'event1')
                <input type="text" class="form-control" name="event" value="Industry 4.0 and Beyond" readonly/>
            @elseif($conference->event == 'event2')
                <input type="text" class="form-control" name="event" value="Business Informatics and Industry 4.0" readonly/>
            @else
                <input type="text" class="form-control" name="event" value="Software Systems and Emerging Technologies Communication Networks and Industry 4.0" readonly/> 
            @endif
          </div>
          
           <div class="form-group">
          <strong>Attendance Type: </strong>
          @if ($conference->online == 'attend_online')
          <input type="text"  class="form-control" name="online" value="Online" readonly/>
          @else
          <input type="text" class="form-control" name="online" value="Attend Event" readonly/>
          @endif

          </div>

          <div class="form-group">
          <strong>Fees: </strong>
            <input type="text" class="form-control" value="{{ $conference->fees }}" readonly/>
          </div>

          <div class="form-group">
          <strong>Payed: </strong>
          <input type="text" class="form-control" value="{{ $conference->payed }} " readonly/>
                      
          </div>

          <div class="form-group">
          <strong >Attendance: </strong>
          <input type="text" class="form-control" value="{{ $conference->attendance}}" readonly/>   
          </div>
          <a class="btn btn-primary" href="/adminhome">Back</a>
         
      </form>
      
  </div>
</div>
</div>
@endsection
