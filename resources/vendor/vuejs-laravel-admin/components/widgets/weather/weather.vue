<template>
    <div>
        <b-card header-tag="h4" class="bg-primary-card weather-widget">
            <div class="row weather-data">
                <div class="col-lg-12 temperature">
                    <h2><i class="wi icon" v-if="weather.list" :class="('wi-owm-'+weather.list[0].weather[0].id)"></i>
                        <span class="pull-right" v-if="weather.list">{{weather.list[0].temp.day}}<sup><sup>o</sup></sup>c <br><span class="location"><i class="fa fa-map-marker text-default" aria-hidden="true"></i>
                                    {{weather.city.name}}, {{weather.city.country}}</span></span>
                    </h2>
                </div>
                <div class="weather-footer mt-5">
                    <div class="row text-center mt-1" v-if="weather.list">
                        <div class="col-md-2 col-4 popup" v-for="(day,index) in weather.list" v-if="index>0">
                            <h5>{{getday(day.dt)}}</h5>
                            <i class="wi" :class="('wi-owm-'+day.weather[0].id)"></i>
                            <p>{{day.temp.day}}°c</p>
                        </div>
                    </div>
                </div>
            </div>
        </b-card>
    </div>
</template>
<script>
import geolocator from "geolocator";
var options = {
    enableHighAccuracy: false,
    timeout: 5000,
    maximumWait: 10000,
    maximumAge: 0, // disable cache
    desiredAccuracy: 30, // meters
    fallbackToIP: true
};
export default {
    props: {
        id: {
            type: String,
            default: "1269843"
        }
    },
    components: {},
    mounted() {
        this.getLocation();
        // this.showdata();
    },
    watch: {
        id() {
            this.showdata();
        }
    },

    data() {
        return {
            weather: {},
            cords: null,
            // ==get api key from http://openweathermap.org/api
            appid: "c00194f61244d2b33b863bff6d94e663"
        }
    },
    methods: {
        getLocation() {
            var x = this;
            geolocator.locate(options, function(err, location) {
                if (err) return console.log(err);
                x.cords = location;
                x.showdata();
            });
            this.showdata();
        },
        showdata() {
            var getid = "id=" + this.id;
            if (this.cords) {
                var getcords = "lat=" + this.cords.coords.latitude + "&lon=" + this.cords.coords.longitude;
            }
            var getdata = getcords ? getcords : getid;
            axios.get("http://api.openweathermap.org/data/2.5/forecast/daily?" + getdata + "&appid=" + this.appid + "&units=metric&cnt=7").then(response => {
                this.weather = response.data;
            }).catch(error => {
                console.log(error);
            });
        },
        getday(dt) {
            return new Date(dt * 1000).toString().split(" ")[0];
        }
    }
}
</script>
<style src="weathericons/css/weather-icons.min.css"></style>
<style scoped>
/*weather widget*/

.weather-widget {
    background-image: url("../../../assets/img/pages/weathernew.jpg");
    background-size: cover;
    color: #fff;
    padding: 26px 0;
    position: relative;
    border-radius: 5px;
}

.weather-data .temperature {
    padding-top: 29px;
    padding-left: 10%;
}

.weather-data .temperature h2 span {
    font-size: 60px;
    margin-right: 40px;
}

.weather-data .temperature .icon {
    position: relative;
    font-size: 82px;
    z-index: 0;
}

.weather-data .temperature .location {
    font-size: 14px;
    position: absolute;
}

.weather-footer {
    background: rgba(0, 0, 0, 0.4);
    height: 100px;
    bottom: 0;
    width: 100%;
    position: relative;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}

.weather-footer h5 {
    color: #ccc;
}

.weather-footer i {
    font-size: 22px;
    margin: 5px 0 8px 0;
}

.weather-footer p {
    font-size: 15px;
}

.weather-footer .popup {
    -webkit-transition: .1s ease-in-out;
    -moz-transition: .1s ease-in-out;
    -o-transition: .1s ease-in-out;
    transition: .1s ease-in-out;
}

.weather-footer .popup:hover {
    cursor: pointer;
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -o-transform: scale(1.1);
    -ms-transform: scale(1.1);
    transform: scale(1.1);
}

@media screen and (max-width: 768px) {
    .weather-data .temperature h2 span.pull-right {
        font-size: 45px;
        margin-right: 20px;
        margin-top: -15px;
    }
    .weather-data .temperature .icon {
        font-size: 40px;
    }
    .weather-widget {
        padding: 70px 0;
    }
}
/*weather widget ends*/
</style>
