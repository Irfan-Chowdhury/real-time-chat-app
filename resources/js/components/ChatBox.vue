<template>
    <div class="chat-box">
        <!-- Message Display Area -->
        <div ref="messagesBox" class="chat-messages">
            <div
                v-for="(message, index) in messages"
                :key="index"
                :class="['chat-message', message.sender_id === sender.id ? 'own' : 'other']"
            >
                <div class="message-content">
                    <div class="text">{{ message.text }}</div>
                    <div class="timestamp">{{ formatTimestamp(message.created_at) }}</div>
                </div>
            </div>

            <p v-if="typing" class="text-muted small mt-2">
                {{ receiver.name }} is typing...
            </p>
        </div>

        <!-- Input Area -->
        <div class="chat-input mt-3">
            <input
                v-model="newMessage"
                @keyup.enter="sendMessage"
                @input="broadcastTyping"
                :disabled="sending"
                class="form-control mr-2"
                placeholder="Type a message..."
            />
            <button class="btn btn-primary d-flex align-items-center" @click="sendMessage" :disabled="sending">
                <span v-if="sending" class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
                <span>{{ sending ? 'Sending...' : 'Send' }}</span>
            </button>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import { nextTick, onMounted, ref, watch } from 'vue';

export default {
    props: {
        receiver: Object,
        sender: Object,
    },
    setup(props) {
        const messages = ref([]);
        const newMessage = ref("");
        const sending = ref(false);
        const messagesBox = ref(null);

        // ✅ Typing logic starts here
        const typing = ref(false);
        let typingTimeout = null;

        const broadcastTyping = () => {
            Echo.private(`chat.${props.sender.id}`)
                .whisper('typing', {
                    sender_id: props.sender.id,
                    receiver_id: props.receiver.id,
                });

            clearTimeout(typingTimeout);
            typingTimeout = setTimeout(() => {
                typing.value = false;
            }, 3000);
        };
        // ✅ Typing logic ends here

        const scrollToBottom = () => {
            messagesBox.value.scrollTop = messagesBox.value.scrollHeight;
        };

        watch(messages, () => {
            nextTick(() => scrollToBottom());
        }, { deep: true });

        const sendMessage = () => {
            if (newMessage.value.trim() !== "") {
                sending.value = true;
                axios
                    .post(`/messages/${props.receiver.id}`, {
                        message: newMessage.value,
                    })
                    .then((res) => {
                        messages.value.push(res.data);
                        newMessage.value = "";
                    })
                    .finally(() => {
                        sending.value = false;
                    });
            }
        };

        const formatTimestamp = (timestamp) => {
            const date = new Date(timestamp);
            return `${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;
        };

        onMounted(() => {
            axios.get(`/messages/${props.receiver.id}`).then((res) => {
                messages.value = res.data;
                console.log(props.receiver.id);
            });

            Echo.private('chat')
                .listen("MessageSent", (response) => {
                    if (response.message) {
                        const exists = messages.value.some(m => m.id === response.message.id);
                        const sentByEitherSide =
                            (response.message.sender_id === props.sender.id && response.message.receiver_id === props.receiver.id) ||
                            (response.message.sender_id === props.receiver.id && response.message.receiver_id === props.sender.id);

                        if (!exists && sentByEitherSide) {
                            messages.value.push(response.message);
                        }
                    }
                });

            // ✅ Listen for typing whisper
            Echo.private(`chat.${props.receiver.id}`)
                .listenForWhisper('typing', (data) => {
                    if (data.sender_id === props.receiver.id) {
                        typing.value = true;

                        clearTimeout(typingTimeout);
                        typingTimeout = setTimeout(() => {
                            typing.value = false;
                        }, 3000);
                    }
                });
        });

        return {
            messages,
            newMessage,
            sendMessage,
            formatTimestamp,
            messagesBox,
            sending,
            typing,             // ✅ make typing reactive in template
            broadcastTyping     // ✅ so @input can call it
        };
    },
};
</script>

<style scoped>
.chat-box {
    display: flex;
    flex-direction: column;
    height: 100%;
    max-height: 100%;
}

.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 5px;
    max-height: 55vh;
}

.chat-message {
    max-width: 70%;
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
}

.chat-message.own {
    align-self: flex-end;
    text-align: right;
}

.chat-message.other {
    align-self: flex-start;
    text-align: left;
}

.message-content {
    background-color: #ffffff;
    border-radius: 20px;
    padding: 10px 15px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    position: relative;
    word-wrap: break-word;
}

.chat-message.own .message-content {
    background-color: #d1ecf1;
    color: #0c5460;
}

.timestamp {
    font-size: 0.75rem;
    color: #6c757d;
    margin-top: 5px;
}

.chat-input {
    display: flex;
    align-items: center;
    padding-top: 10px;
}
</style>
