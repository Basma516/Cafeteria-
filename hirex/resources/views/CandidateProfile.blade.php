
@extends('layouts.app')

@section('content')

   
    
   

    <div class="profile-card">
    
        <div class="icon-text icon-connect">
            <i class="bi bi-person-plus-fill"></i>
            <span>Connect</span>
        </div>
       
        <div class="icon-text icon-message">
            <i class="bi bi-chat-dots-fill"></i>
            <span>Message</span>
        </div>

        <img src="https://via.placeholder.com/100" alt="Sami Ghozi">
        <h2>Sami Ghozi</h2>
        <p>Twilio</p>
        <p>A programming company offering custom software solutions and innovative digital applications to meet client needs</p>
        <a href="https://web.whatsapp.com/">https://Twilio.com/</a>

        <div class="stats">
            <div>
                <h4>65</h4>
                <p>Friends</p>
            </div>
            <div>
                <h4>43</h4>
                <p>Photos</p>
            </div>
            <div>
                <h4>21</h4>
                <p>Comments</p>
            </div>
        </div>

        <button class="btn btn-primary mt-3">Posts</button>
    </div>

    
    


@endsection
