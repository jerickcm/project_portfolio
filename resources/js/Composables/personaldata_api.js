import { ref, reactive } from "vue";
import axios from "axios";
export default function usePersonalData() {
    const personal_data = ref([]);
    const footer = ref([]);

    const errors_certificates = ref([]);

    const getPersonalContent = async () => {
        let response = await axios.get(route("get-personal-content"));
        personal_data.value = response.data.content
    };
    const getSocials = async () => {
        let response = await axios.get(route("get-personal-socials"));
        footer.value = response.data.content
    };
    return {
        personal_data,
        footer,
        errors_certificates,
        getPersonalContent,
        getSocials
    };
}
