/*chatbot*/
const API_URL = 'https://openrouter.ai/api/v1/chat/completions';
const API_KEY = 'mistral ai key'; // Replaced with  actual API key
let messages = [];

document.addEventListener("DOMContentLoaded", () => {
    const inputField = document.getElementById("chat-input");
    if (inputField) {
        inputField.addEventListener("keydown", event => {
            if (event.key === 'Enter') {
                event.preventDefault();
                sendMessage();
            }
        });
    }
});

document.addEventListener("click", event => {
    const chatContainer = document.getElementById("chat-container");
    const chatToggle = document.querySelector(".chat-toggle");

    if (chatContainer.style.display === "block" && !chatContainer.contains(event.target) && !chatToggle.contains(event.target)) {
        chatContainer.style.display = "none";
    }
});


function toggleChat() {
    const chatContainer = document.getElementById("chat-container");
    chatContainer.style.display = chatContainer.style.display === "block" ? "none" : "block";
}

function sendMessage() {
    const inputField = document.getElementById("chat-input");
    const messageText = inputField.value.trim();
    if (!messageText) return;

    addMessage('user', messageText);
    inputField.value = "";

    showLoader();

    fetch(API_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${API_KEY}`
        },
        body: JSON.stringify({
            model: 'mistralai/mistral-7b-instruct',
            messages,
            temperature: 0.7
        })
    })
    .then(response => response.json())
    .then(data => {
        hideLoader(); 
        const botContent = data.choices?.[0]?.message?.content || "No response from bot.";
        addMessage('bot', botContent);
    })
    .catch(error => {
        hideLoader();
        addMessage('bot', `Error: ${error.message}`);
    });
}

function showLoader() {
    const loader = document.getElementById("loader");
    loader.style.display = "block";
    scrollToBottom();
}

function hideLoader() {
    document.getElementById("loader").style.display = "none";
}

function addMessage(role, content) {
    messages.push({ role, content });

    const messageContainer = document.getElementById("messages-container");
    const messageElement = document.createElement("div");
    messageElement.className = `message ${role}`;
    messageElement.textContent = content;
    messageContainer.appendChild(messageElement);
    scrollToBottom();
}

function scrollToBottom() {
    const messagesContainer = document.getElementById("messages-container");
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}