<!DOCTYPE html>

    <head>
        <title>Welcome: {{ $userName }}</title>
        <style>
            html, body {
                background-color: SlateGrey ;
                color: #F5F5F5;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                align-items: center;
                text-align: center;
                justify-content: center;
                padding: 40px 0;
            }
            .msn{
            border-style: inset;
            }
        </style>
    </head>
    <body>
      <form method='GET' action='/newMessage'>
         <label for='newMessage'>New Message</label>
         <br>
         <textarea  name='newMessage' id='newMessage'></textarea>
         <input type="hidden" name="user" value = {{ $userName }} >
         <input type='submit' value = 'Submit'>
     </form>
    <br>
    <br>


    <div class='message'>
      @foreach($messageArr as $mess)
        @if($mess->user == $userName)
        <form method='GET' action='/updateMessage'>
          <label for='newMessage'>Your Message</label>
          <br>
          <textarea  name='newMessage' id='newMessage' > {{ $mess->message }} </textarea>
          <input type="hidden" name="id" value = {{ $mess->id }} >
          <input type="hidden" name="user" value = {{ $userName }} >
          <input type='submit' value = 'Update'>
      </form>
        <form method='GET' action='/deleteMessage'>
          <input type="hidden" name="user" value = {{ $userName }} >
          <input type="hidden" name="id" value = {{ $mess->id }} >
          <input type='submit' value = 'Delete'>
        </form>
        @else
             <h3>from : {{$mess->user}}</h3>
             <p class ="msn">{{$mess->message}}</p>
             <p>Last Update: {{$mess->updated_at}}</p>
        @endif
        <br>
      @endforeach
    </div>


    </body>
