<div>
    <h1>Please verify the email that was sent you!</h1>

    <p>Didnt get the email?</p>
   <form action="{{ route('verification.send') }}" method="POST">
        @csrf
    <button>Send again</button>
   </form>
   
</div>