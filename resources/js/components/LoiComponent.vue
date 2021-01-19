<!-- /resources/assets/js/components/Leaderboard.vue -->
<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Company</th>
            <th>USD</th>
            <th>RP</th>
        </tr>
        </thead>
        <tbody>
        <tr :class="{success: loi.id == current}" v-for="(loi, key) in sortedUsers">
            <td>{{ ++key }}</td>
            <td>{{ loi.perusahaan }}</td>
            <td>{{ loi.usd }}</td>
            <td>{{ loi.rp }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['current'],
        data() {
            return {
                users: []
            }
        },
        created() {
            this.fetchLeaderboard();
            this.listenForChanges();
        },
        methods: {
            fetchLeaderboard() {
                axios.get('/live-count').then((response) => {
                    this.users = response.data;
                })
            },
            listenForChanges() {
                Echo.channel('livecount')
                    .listen('LiveLoiUpdate', (e) => {
                        console.log(e)
                        var loi = this.users.find((loi) => loi.id === e.id);
                        // check if loi exists on leaderboard
                        if(loi){
                            var index = this.users.indexOf(loi);
                            this.users[index].score = e.score;
                        }
                        // if not, add 'em
                        else {
                            this.users.push(e)
                        }
                    })
            }
        },
        computed: {
            sortedUsers() {
                return this.users.sort((a,b) => b.score - a.score)
            }
        }
    }
</script>