<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js')
    <style>
        #messages {height:300px; overflow-y:scroll; border:1px solid #ccc; padding:10px; background:#f9f9f9;}
        .chat-bubble {margin:5px 0; padding:8px 12px; border-radius:15px; background:#eee; max-width:70%;}
        .chat-bubble.own {background:#aee1f9; margin-left:auto; text-align:right;}
    </style>
</head>
<body>
<h2>Chat Room</h2>

<div id="messages">
    @foreach($messages as $msg)
        <p class="chat-bubble {{ auth()->id() == $msg->user_id ? 'own' : '' }}">
            <strong>{{ $msg->user->name }}:</strong> {{ $msg->message }}
        </p>
    @endforeach
</div>

<form id="chat-form">
    <input type="text" id="message" placeholder="Type a message..." required style="width:80%; padding:5px;">
    <button type="submit" style="padding:5px 10px;">Send</button>
</form>
</body>
</html>
