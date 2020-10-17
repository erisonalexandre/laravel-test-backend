<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <Datatable :headings="headings" :list="properties">
                        <template #address="{ data }">
                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                {{ `${data.street}, ${data.number}, ${data.city}, ${data.state}` }}
                            </span>
                        </template>
                        <template #status="{ data }">
                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                {{ data.contract ? 'Contratado': 'Não contratado' }}
                            </span>
                        </template>
                        <template #delete="{ data }">
                            <div @click="deleteProperty(data.id)" class="flex justify-center cursor-pointer text-red">
                                <img class="icon fill-current" :src="require('../../../assets/svg/trash.svg')" alt="">
                            </div>
                        </template>
                    </Datatable>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Datatable from '../../Components/Datatable'
import AppLayout from '../../Layouts/AppLayout'

export default {
    layout: AppLayout,
    components: {
        Datatable
    },
    props: ['properties'],
    data() {
        return {
            headings: [
                { key: 'email', value: 'Email'},
                { key: 'address', value: 'Endereço'},
                { key: 'status', value: 'Status'},
                { key: 'delete', value: 'Remover', class: 'text-center'}
            ]
        }
    },
    methods: {
        deleteProperty(id) {
            alert('deletar ? ' + id)
        }
    }

}
</script>
