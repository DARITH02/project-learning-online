<form id="chat-form">
    <input type="text" name="message" id="message" placeholder="Ask me something..." required>
    <button type="submit">Send</button>
</form>

<div id="chat-response"></div>

<script>
document.getElementById('chat-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    
    const message = document.getElementById('message').value;

    const response = await fetch("{{ route('chat.ask') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ message })
    });

    const data = await response.json();
    document.getElementById('chat-response').innerText = data.response;
    console.log(data.response);
    
});
</script>
