<template>
    <div class="feed" ref="feed">
        <ul v-if="contact">
            <li v-for="message in messages" :class="`message${message.to == contact.id ? ' sent' : ' received'}`" :key="message.id">
                <div class="text" style="margin-left: 5px">
                    {{ message.text }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },
        methods: {
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            }
        },
        watch: {
            contact(contact) {
                this.scrollToBottom();
            },
            messages(messages) {
                this.scrollToBottom();
            }
        }
    }
</script>

<style lang="scss" scoped>
.feed {
    height: 100%;
    max-height: 470px;
    overflow: scroll;
    font-family: Arial, Helvetica, sans-serif;
    background: url('http://forums.crackberry.com/attachments/blackberry-10-wallpapers-f308/137432d1361639896t-z10-wallpaper-set-z10-music.jpg');

    ul {
        list-style-type: none;
        padding: 5px;

        li {
            &.message {
                margin: 10px 0;
                width: 100%;

                .text {
                    width: 240px;
                    height: auto;
                    background: #f5f5f5;
                    border-radius: 4px;
                    box-shadow: 2px 8px 5px #000;
                    position: relative;
                    margin: 0 0 25px;
                    display: inline-block;
                }

                &.received {
                    text-align: right;

                    .text {
                        color: #2b2b2b;
                        background: #2ecc71;
                    }
                }

                &.sent {
                    text-align: left;

                    .text {
                        color: #2b2b2b;
                        background: white;
                    }
                }

            }
        }
    }
}
</style>

