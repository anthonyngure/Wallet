<template>
    <div>
        <div v-if="$auth.ready()">
            <v-app>
                <dashboard-drawer v-if="$auth.check()"></dashboard-drawer>
                <toolbar></toolbar>
                <v-content>
                    <v-container grid-list-xs fluid fill-height>
                        <router-view></router-view>
                    </v-container>
                </v-content>
                <v-snackbar :timeout="0" top left multi-line v-model="snackbarNotification">
                    {{snackbarNotificationMessage}}
                    <v-btn flat color="pink" @click.native="snackbarNotification = false">Close</v-btn>
                </v-snackbar>
            </v-app>
        </div>
        <div v-else>
            <loader></loader>
        </div>
    </div>
</template>

<script>
    import Loader from './components/Loader'
    import Toolbar from './components/Toolbar'
    import EventBus from './event-bus'
    import DashboardDrawer from './components/DashboardDrawer'

    export default {
        name: 'app',
        components: {
            DashboardDrawer, Toolbar,
            Loader
        }
        ,
        data: () => ({
            snackbarNotification: false,
            snackbarNotificationMessage: 'No message specified!',
        }),
        mounted () {
            let that = this
            EventBus.$on('showSnackbarNotification', function (message, key) {
                that.snackbarNotificationKey = key
                that.snackbarNotification = true
                that.snackbarNotificationMessage = message
            })
            EventBus.$on('closeSnackbarNotification', function (key) {
                if (that.snackbarNotificationKey === key) {
                    that.snackbarNotificationKey = null
                    that.snackbarNotification = false
                    that.snackbarNotificationMessage = null
                }
            })
        }
    }
</script>

<style>

</style>