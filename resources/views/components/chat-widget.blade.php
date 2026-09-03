<div id="chat-widget" class="fixed bottom-5 right-5 z-50 font-sans">
    <button id="chat-toggle" class="w-14 h-14 rounded-full bg-accent-500 text-navy shadow-lg flex items-center justify-center hover:bg-accent-400 transition-colors" aria-label="Open chat">
        <i data-lucide="message-circle" class="w-7 h-7"></i>
    </button>

    <div id="chat-panel" class="hidden absolute bottom-16 right-0 w-80 sm:w-96 bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden flex flex-col max-h-[520px]">
        <div class="bg-navy text-white px-4 py-3 flex items-center justify-between">
            <div>
                <h4 class="font-semibold text-sm">Aetherian Cargo Chat</h4>
                <p id="chat-status" class="text-xs text-slate-300">Online</p>
            </div>
            <button id="chat-close" class="hover:text-slate-300"><i data-lucide="x" class="w-5 h-5"></i></button>
        </div>

        <div id="chat-form-step" class="p-4 space-y-3">
            <p class="text-sm text-slate-600">Enter your details to chat with support.</p>
            <input type="text" id="chat-name" placeholder="Your name" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-accent-500" required>
            <input type="email" id="chat-email" placeholder="Your email (optional)" class="w-full px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-accent-500">
            <button id="chat-start" class="w-full py-2 bg-accent-500 text-navy font-semibold rounded-lg hover:bg-accent-400">Start chat</button>
        </div>

        <div id="chat-room" class="hidden flex-col flex-1" style="min-height: 320px;">
            <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-3 max-h-72"></div>
            <form id="chat-send" class="p-3 border-t flex items-center gap-2">
                <input type="text" id="chat-input" placeholder="Type a message..." class="flex-1 px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-accent-500" required>
                <button type="submit" class="p-2 bg-navy text-white rounded-lg hover:bg-navy/90"><i data-lucide="send" class="w-4 h-4"></i></button>
            </form>
        </div>
    </div>
</div>

<script>
(function () {
    const widget = document.getElementById('chat-widget');
    const toggle = document.getElementById('chat-toggle');
    const panel = document.getElementById('chat-panel');
    const close = document.getElementById('chat-close');
    const startBtn = document.getElementById('chat-start');
    const formStep = document.getElementById('chat-form-step');
    const roomStep = document.getElementById('chat-room');
    const nameInput = document.getElementById('chat-name');
    const emailInput = document.getElementById('chat-email');
    const input = document.getElementById('chat-input');
    const sendForm = document.getElementById('chat-send');
    const messagesEl = document.getElementById('chat-messages');

    const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';
    const roomKey = 'aetherian_chat_room';

    let roomId = localStorage.getItem(roomKey) || '';
    let name = localStorage.getItem('aetherian_chat_name') || '';
    let email = localStorage.getItem('aetherian_chat_email') || '';
    let pollInterval = null;

    function uuid() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            const r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    if (name) nameInput.value = name;
    if (email) emailInput.value = email;

    function scrollToBottom() {
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }

    function renderMessages(messages) {
        messagesEl.innerHTML = '';
        if (!messages.length) {
            messagesEl.innerHTML = '<p class="text-center text-sm text-slate-500">A support agent will be with you shortly.</p>';
        } else {
            messages.forEach(function (msg) {
                const wrapper = document.createElement('div');
                wrapper.className = 'flex ' + (msg.is_admin ? 'justify-start' : 'justify-end');
                const bubble = document.createElement('div');
                bubble.className = 'max-w-[80%] px-3 py-2 rounded-xl text-sm ' + (msg.is_admin ? 'bg-slate-100 text-slate-900 rounded-bl-none' : 'bg-accent-500 text-navy rounded-br-none');
                const time = msg.created_at ? new Date(msg.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) : '';
                bubble.innerHTML = '<p>' + escapeHtml(msg.content) + '</p><span class="text-[10px] opacity-70 mt-1 block">' + (msg.sender_name || 'You') + ' ' + time + '</span>';
                wrapper.appendChild(bubble);
                messagesEl.appendChild(wrapper);
            });
        }
        scrollToBottom();
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    async function loadMessages() {
        try {
            const res = await fetch('{{ route('chat.messages') }}?room_id=' + encodeURIComponent(roomId));
            const data = await res.json();
            renderMessages(data.messages || []);
        } catch (e) { console.error('chat poll error', e); }
    }

    async function sendMessage(content) {
        try {
            const res = await fetch('{{ route('chat.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ room_id: roomId, guest_name: name, guest_email: email, content: content }),
            });
            const data = await res.json();
            if (data.id) {
                input.value = '';
                loadMessages();
            }
        } catch (e) { console.error('chat send error', e); }
    }

    function startPolling() {
        if (pollInterval) return;
        loadMessages();
        pollInterval = setInterval(loadMessages, 5000);
    }

    function stopPolling() {
        if (pollInterval) { clearInterval(pollInterval); pollInterval = null; }
    }

    function openRoom() {
        if (!roomId) { roomId = uuid(); localStorage.setItem(roomKey, roomId); }
        formStep.classList.add('hidden');
        roomStep.classList.remove('hidden');
        roomStep.classList.add('flex');
        startPolling();
        if (window.lucide) lucide.createIcons();
    }

    toggle.addEventListener('click', function () {
        panel.classList.remove('hidden');
        if (name && email) openRoom();
        if (window.lucide) lucide.createIcons();
    });

    close.addEventListener('click', function () {
        panel.classList.add('hidden');
        stopPolling();
    });

    startBtn.addEventListener('click', function () {
        name = nameInput.value.trim();
        email = emailInput.value.trim();
        if (!name) { nameInput.focus(); return; }
        localStorage.setItem('aetherian_chat_name', name);
        if (email) localStorage.setItem('aetherian_chat_email', email);
        openRoom();
    });

    sendForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const content = input.value.trim();
        if (!content) return;
        sendMessage(content);
    });

    if (window.lucide) lucide.createIcons();
})();
</script>
