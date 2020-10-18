<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="border-b border-gray-200">
                    <Datatable :headings="headings" :list="contracts">
                        <template #actions>
                            <jet-button @click="$inertia.visit(route('contract.create'))">
                                Novo
                            </jet-button>
                        </template>
                        <template #property="{ data }">
                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                {{ transformAddressToString(data.property, ['street', 'number', 'city', 'state']) }}
                            </span>
                        </template>
                        <template #type="{ data }">
                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                {{types[data.type]}}
                            </span>
                        </template>
                        <template #delete="{ data }">
                            <div @click="deleteContract(data.id)" class="flex justify-center cursor-pointer text-red">
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
    props: ['contracts', 'types'],
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
        deleteContract(id) {
             this.$toast.question("Deseja remover esse contrato ?", 'Alerta', {
                position: 'center',
                buttons: [
                    ['<button>Sim</button>', (instance, toast) => {
                        instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                        this.$inertia.delete(`/contract/${id}`, {
                            onSuccess: () => this.$toast.success('Contrato removido com sucesso!', 'Sucesso!', {position: "topRight"})
                        })
                    }, true],
                    ['<button>Não</button>', (instance, toast) => {
                        instance.hide({transitionOut: 'fadeOut'}, toast, 'button');
                    }],
                ]
            });
        },

        transformAddressToString(property, fields) {
            return transformAddressToString(property, fields)
        }
    },
    created() {
        this.$root.pageOptions.header = 'Contratos'
    }

}
</script>
