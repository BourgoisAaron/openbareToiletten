<template>
    <div class="card-body row">
        <div class="col-12 d-flex flex-column align-items-center" v-if="loaded === false">
            <h2>Click the button to find the nearest toilets.</h2>
            <button @click="getLocation" class="btn btn-outline-info btn-lg mt-4">Try It</button>
            <p v-if="loading" class="mt-3">loading...</p>
            <p class="mt-3">{{message}}</p>
        </div>
        <div class="col-12" v-if="loaded">
            <h2 class="text-center mb-3">Top 5 nearest toilets</h2>
            <ul class="list-group">
                <li v-for="toilet in toilets" class="list-group-item d-sm-flex justify-content-between">
                    <a v-bind:href="'/toilet/'+ toilet.id" class="text-secondary">{{toilet.name}}</a>
                    <div>
                        <p class="my-1">{{toilet.distance}}km</p>
                        <i v-for="n in toilet.rating" class="text-warning fa fa-star"></i>
                        <i v-for="n in 5-toilet.rating" v-if="toilet.rating !== null"
                           class="fal fa-star text-warning"></i>
                        <i v-for="n in 5-toilet.rating" v-if="toilet.rating === null"
                           class="fal fa-star text-secondary opacity-5"></i>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-12 mt-3">
            <div id="map" v-bind:class="{ map: loaded }"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Toilet",
        data: function () {
            return {
                message: "",
                toilets: [],
                loading: false,
                loaded: false,
            }
        },

        methods: {
            getLocation: function () {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(this.showPosition, this.showError);
                } else {
                    this.message = "Geolocation is not supported by this browser.";
                }
            },
            showPosition: function (position) {
                this.loading = true;
                axios.get('api/toiletten/calculate/' + position.coords.longitude + '/' + position.coords.latitude)
                    .then(response => {
                        this.toilets = response.data;
                        this.loading = false;
                        this.loaded = true;
                        initMap(position.coords.latitude, position.coords.longitude, this.toilets);
                    });
            },
            showError: function (error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        this.message = "User denied the request for Geolocation."
                        break;
                    case error.POSITION_UNAVAILABLE:
                        this.message = "Location information is unavailable."
                        break;
                    case error.TIMEOUT:
                        this.message = "The request to get user location timed out."
                        break;
                    case error.UNKNOWN_ERROR:
                        this.message = "An unknown error occurred."
                        break;
                }
            }
        }
    }
</script>

<style scoped>

</style>
