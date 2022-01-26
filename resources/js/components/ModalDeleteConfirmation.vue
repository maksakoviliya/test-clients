<template>
<div>
    <div class="fixed inset-0 bg-gray-900 bg-opacity-20 z-10" v-if="showModal">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-md p-6">
            <h2 class="text-lg text-gray-700 font-semibold">Подтверждение удаления клиента «{{ client.name }}»</h2>
           <div class="flex mt-6 justify-center gap-4">
               <button @click="handleSubmit" type="button"
                       class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                   Удалить
               </button>
               <button @click="showModal = false" type="button"
                       class="inline-flex justify-center py-2 px-4 border border-2 shadow-sm text-sm font-medium rounded-md text-gray-800 bg-transparent hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-100">
                   Отменить
               </button>
           </div>
        </div>
    </div>
    <button @click="showModal = !showModal" type="button"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        Удалить
    </button>
</div>
</template>

<script>
import axios from "axios";

export default {
    name: "ModalDeleteConfirmation",

    props: {
        client: {
            required: true
        }
    },

    data() {
        return {
            showModal: false
        }
    },

    methods: {
        handleSubmit() {
            axios.delete("/api/client", {
                params: {
                    id: this.client.id
                }
            }).then(res => {
                window.location.href = "/"
            })
        }
    }
}
</script>
