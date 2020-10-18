<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="border-b border-gray-200">
                    <Datatable :headings="headings" :list="contracts">
                        <template #property="{ data }">
                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                {{ `${data.property.street}, ${data.property.number}, ${data.property.city}, ${data.property.state}` }}
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
    props: ['contracts'],
    data() {
        return {
            headings: [
                { key: 'property', value: 'Propriedade'},
                { key: 'type', value: 'Tipo Pessoa'},
                { key: 'document', value: 'Documento'},
                { key: 'email', value: 'Email'},
                { key: 'delete', value: 'Remover', class: 'text-center'}
            ]
        }
    },
    methods: {
        deleteProperty(id) {
            alert('deletar ? ' + id)
        }
    },
    created() {
        this.$root.pageOptions.header = 'Contratos'
    }

}
</script>
