<template>
    <v-layout row wrap align-center justify-center>
        <v-card>
            <v-toolbar color="primary" dense flat dark>
                <v-toolbar-side-icon></v-toolbar-side-icon>
                <v-toolbar-title>Test Seat in a Test Matatu</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn icon @click="generateRandomSeat">
                    <v-icon>refresh</v-icon>
                </v-btn>
                <v-btn icon>
                    <v-icon>more_vert</v-icon>
                </v-btn>
            </v-toolbar>
            <v-card-text v-if="!seat">
                <v-progress-circular indeterminate v-bind:size="36" color="primary">
                </v-progress-circular>
                <v-subheader class="mt-2">Updating...</v-subheader>
            </v-card-text>
            <v-card-text v-else>
                <q-r-code :size="400" :text="JSON.stringify(seat)"></q-r-code>
            </v-card-text>
        </v-card>
    </v-layout>
</template>

<script>
    import Base from './Base.vue'
    import StatsCard from './StatsCard'
    import QRCode from 'vue-qrcode-component'

    export default {
        name: 'dashboard',
        extends: Base,
        components: {
            QRCode,
            StatsCard,
        },
        data () {
            return {
                seat: null,
            }
        },
        methods: {
            generateRandomSeat () {
                this.seat = {
                    matatu: {
                        id: 1,
                        name: 'Test Matatu',
                        licencePlate: 'KCY 2017Z',
                        seatsCapacity: 33,
                        image: 'matatus/default.png'
                    },
                    number: this.$utils.getRandomInt(33)
                }
            }
        },
        mounted () {
            this.generateRandomSeat()
        }
    }
</script>

<style scoped>

</style>