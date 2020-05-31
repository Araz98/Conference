@extends('layouts.app')
@extends('base')

@section('content')
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>

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
  <a class="active" href="/home">🏠 Home</a> 
  <a href="/Form">📃 Form</a> 
  <a href="/Contact">📩 Contact</a> 
</div>
 </div>
            </div>
        </div>
    </div>
</div></br>

</br>
<div class="w3-container">
<img src="/Mathworks_Promo_Industry_4.0___938674002.5e0630a8da255.png" class="w3-border" style="align:center;float:right;"width=1200>
</br></br></br></br></br></br></br></br></br>
<h3><b><i>Industry 4.0 and Beyond</i></b></h3></br>
<h4><i>Date:1/9/2020</i></h4>
<h4><i>Venue:Bangi</i></h4>
<h4><i>Speaker:Mr.Sao Paolo</i></h4>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<div class="w3-container">
<img src="/industry40petro-1024x679.png" class="w3-border" style="align:center;float:left;"width=1200>
</br></br></br></br></br></br></br></br></br></br></br></br></br>
<h3><b><i>Business Informatics and Industry 4.0</i></b></h3></br>
<h4><i>Date:1/9/2020</i></h4>
<h4><i>Venue:Bangi</i></h4>
<h4><i>Speaker:Mr.Robert Einstein</i></h4>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
</br></br></br></br></br></br>
<div class="w3-container">
<img src="/Industry-4.0.jpg" class="w3-border" style="align:center;float:right;"width=1200>
</br></br></br></br></br></br>
<h3><b><i>Software Systems and Emerging Technologies Communication Networks and Industry 4.0</i></b></h3></br>
<h4><i>Date:1/9/2020</i></h4>
<h4><i>Venue:Bangi</i></h4>
<h4><i>Speaker:Mdm.Sara Edward</i></h4>

</br></br></br></br></br></br></br></br></br></br></br>
<img src="/c2.jpg" style="width:1600px;"></div>
</br>
<h3>Benefits from joining a conference: </br>
* Get feedback on an early version of your latest work </br>
* Get to know other people in your field </br>
* Hear about the latest research </br>
* Improve your presentation and communication skills </br>
* Visit a new place and have fun </br>
* Meet your academic heroes </br>
* Engage in high-level debates and refine your ideas </br>
* Adding to your CV </br>
</h3>    

@endsection
