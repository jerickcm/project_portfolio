import { ref } from "vue";

export default function useHeaders() {
    const headers_certificate = ref([
        { text: "Certificates", value: "box", sortable: true },
        { text: " ", value: "box2", sortable: true },
        { text: "  ", value: "box3", sortable: true },
    ]);

    return {
        headers_certificate,
    };
}
