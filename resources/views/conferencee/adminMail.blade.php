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
  <a  href="/adminhome"">🏠 Home</a>  
  <a  href="/admincontact">📞 Contact</a>
  <a  class="active" href="/mail">📩 Email</a> 
</div>
</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
 <div class="col-sm-8 offset-sm-4">
    <h1 class="display-4">Email to participants</h1></br>
</div>
</div>
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
    @if(Session::has('success'))
    <div class="alert alert-success">
        <h4> Successfully sent email !</h4>
    </div>
    @endif

      <form method="post" action="/mail">
          @csrf
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Subject</label>
                <div class="col-md-4">
                    <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" 
                        name="subject" value="{{ old('subject') }}" autocomplete="subject">
                </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-4">
                    <input id="subject" type="email" class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}"  autocomplete="email" >
                </div>
          </div>

          <div class="form-group row">
            <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>
            <div class="col-md-4">
                <textarea name="message" class="form-control" id="message" cols="30" rows="5"></textarea>
            </div>
          </div>

          <div class="form-group row">
                <div class="col-md-8 col-form-label text-md-right">
                    <button type="submit">Send Email ✌️</button> 
                </div>
          </div>

      </form>
      </div>
</div>
</div>
@endsection