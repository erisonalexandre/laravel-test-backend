<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="border-b border-gray-200">
                    <Datatable :headings="headings" :list="listProperties">
                        <template #actions>
                            <jet-button @click="$inertia.visit(route('property.create'))">
                                Novo
                            </jet-button>
                        </template>
                        <template #address="{ data }">
                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                {{ transformAddressToString(data, ['street', 'number', 'city', 'state']) }}
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
import Datatable from '@/Components/Datatable'
import AppLayout from '@/Layouts/AppLayout'
import JetButton from '@/Jetstream/Button'
import { transformAddressToString } from '@/Helpers/AddressHelper'

export default {
    layout: AppLayout,
    components: {
        Datatable,
        JetButton
    },
    props: ['properties'],
    data() {
        return {
            listProperties: this.properties,
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
            this.$toast.question("Deseja remover essa propriedade ?", 'Alerta', {
                position: 'center',
                overlay: true,
                close: false,
                buttons: [
                    ['<button>Sim</button>', (instance, toast) => {

                        instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                        window.axios
                            .delete(`/property/${id}`)
                            .then(
                                ({data}) => {
                                    this.updateList()
                                    this.$toast.success('Propriedade removida com sucesso!', 'Sucesso!', {position: "topRight"})
                                }
                            )

                    }, true],
                    ['<button>Não</button>', (instance, toast) => {
                        instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                    }],
                ]
            });
        },

        transformAddressToString(property, fields) {
            return transformAddressToString(property, fields)
        },

        updateList() {
            window.axios
                .get(this.route('property.list'))
                .then(({data}) => this.listProperties = data)
        }
    },
    created() {
        this.$root.pageOptions.header = 'Propriedades'
    }

}
</script>
