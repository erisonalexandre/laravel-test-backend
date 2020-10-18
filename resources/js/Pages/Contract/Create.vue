<template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" >
        <jet-form-section @submitted="storeContract">

            <template #description>
                Certifique-se de preencher todos os campos obrigatórios marcados com *
            </template>

            <template #form>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="property_id" value="Propriedade *" />
                    <custom-select class="mt-1 block w-full" v-model="form.property_id" :options="propertiesFormated" required></custom-select>
                    <jet-input-error :message="form.error('property_id')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="type" value="Tipo de pessoa *" />
                    <custom-select
                        class="mt-1 block w-full"
                        required
                        v-model="form.type"
                        :options="types"
                    ></custom-select>
                    <jet-input-error :message="form.error('type')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="document" value="Documento *" />
                    <jet-input
                        id="document"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.document"
                        v-mask="documentMask"
                        ref="document"
                        autocomplete="current-password"
                    />
                    <jet-input-error :message="form.error('document')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="email" value="E-mail do contratante *" />
                    <jet-input id="email" type="email" class="mt-1 block w-full" required v-model="form.email" ref="email" autocomplete="email" />
                    <jet-input-error :message="form.error('email')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="name" value="Nome completo do contratante *" />
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" ref="name" autocomplete="current-password" />
                    <jet-input-error :message="form.error('name')" class="mt-2" />
                </div>
            </template>

            <template #actions>
                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    Salvo.
                </jet-action-message>

                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Salvar
                </jet-button>
            </template>
        </jet-form-section>
    </div>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout'
import JetActionMessage from '@/Jetstream/ActionMessage'
import JetButton from '@/Jetstream/Button'
import JetFormSection from '@/Jetstream/FormSection'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'
import CustomSelect from '@/Components/Select'
import { transformAddressToString } from '@/Helpers/AddressHelper'

export default {
    layout: AppLayout,
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        CustomSelect
    },
    props: {
        types: {
            type: Object,
            required: true
        },
        properties: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            updateDom: 0,
            form: this.$inertia.form({
                    type: '',
                    property_id: '',
                    document: '',
                    email: '',
                    name: '',
                }, {
                    resetOnSuccess: false
                })
        }
    },
    computed: {
        propertiesFormated() {
            let list = {}
            this.properties.forEach((property) => {
                Object.assign(list, {
                    [property.id]: transformAddressToString(property, ['street', 'number', 'city', 'state'])
                })
            })
            return list
        },
        documentMask() {
            return this.form.type == 'person' ? '###.###.###-##' : '##.###.###/####-##'
        }
    },
    methods: {
        storeContract() {
            this.form.post(route('contract.store'), {
                preserveScroll: true,
            }).then(() => {
            })
        }
    },
    created() {
        this.$root.pageOptions.header = 'Cadastrar Contrato'
    }

}
</script>
