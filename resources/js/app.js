import './bootstrap';
import Pusher from 'pusher-js';

const messagesDiv = document.getElementById('messages');
const chatForm = document.getElementById('chat-form');
const messageInput = document.getElementById('message');

// Function to append message
function appendMessage(user, message, isOwn = false) {
  const p = document.createElement('p');
  p.className = isOwn ? 'chat-bubble own' : 'chat-bubble';
  p.innerHTML = `<strong>${user}:</strong> ${message}`;
  if (messagesDiv) {
    messagesDiv.appendChild(p);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
  }
}

// Send message
if (chatForm) {
  chatForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const msg = messageInput.value.trim();
    if (!msg) return;

    appendMessage('You', msg, true);

    fetch('/chat/send', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute('content'),
          'X-Socket-Id': pusher.connection.socket_id 
      },
      body: JSON.stringify({ message: msg }),
    }).catch((err) => console.error(err));

    messageInput.value = '';
  });
}

// Pusher setup for LOCAL HTTP
Pusher.logToConsole = true;

const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
  cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
  forceTLS: false,          // no HTTPS
  encrypted: false,         // stops wss://
  wsHost: 'ws-ap2.pusher.com',
  wsPort: 80,
  enabledTransports: ['ws'], // only ws, not wss
});

const channel = pusher.subscribe('chat-channel');

channel.bind('message.sent', function (data) {
      if (data.user_name === "You" || data.user_name === window.currentUserName){
        return;
      } 
      else{
          appendMessage(data.user_name, data.message, false);
      }

});
