import { ref, reactive } from "vue";
import axios from "axios";
import moment from "moment";
export default function useCity() {
    const weather = ref([]);
    const errors_weather = ref([]);

    const getWeatherByCity = async (data) => {
        errors_weather.value = "";
        try {
            let response = await axios.post(route("weather-get-of-city"), data);
            weather.value = response.data.data;
        } catch (e) {
            if (e.response.status === 422) {
                errors_weather.value = e.response.data.errors;
            }
            if (e.response.status === 500) {
                errors_weather.value = {
                    errors: { error: "server Error 500" },
                };
            }
        }
    };

    const convertTimezone = (timestamp, timezone) => {
        const dateTime = moment.unix(timestamp);
        // .utcOffset(timezone);
        return dateTime.format("h:mm:ss A ");
    };

    return {
        weather,
        errors_weather,
        getWeatherByCity,
        convertTimezone,
    };
}
