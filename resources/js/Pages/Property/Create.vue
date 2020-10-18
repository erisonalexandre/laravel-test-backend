<template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" >
        <jet-form-section @submitted="storeProperty">
            <template #title>
                Cadastro de propriedade
            </template>

            <template #description>
                Certifique-se de preencher todos os campos obrigatórios marcados com *
            </template>

            <template #form>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="email" value="E-mail do proprietário *" />
                    <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" ref="email" autocomplete="email" />
                    <jet-input-error :message="form.error('email')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="street" value="Rua *" />
                    <jet-input id="street" type="text" class="mt-1 block w-full" v-model="form.street" ref="street" autocomplete="street" />
                    <jet-input-error :message="form.error('street')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="number" value="Número" />
                    <jet-input id="number" type="text" class="mt-1 block w-full" v-model="form.number" ref="number" autocomplete="number" />
                    <jet-input-error :message="form.error('number')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="complement" value="Complemento" />
                    <jet-input id="complement" type="text" class="mt-1 block w-full" v-model="form.complement" ref="complement" autocomplete="current-password" />
                    <jet-input-error :message="form.error('complement')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="neighborhood" value="Bairro *" />
                    <jet-input id="neighborhood" type="text" class="mt-1 block w-full" v-model="form.neighborhood" ref="neighborhood" autocomplete="current-password" />
                    <jet-input-error :message="form.error('neighborhood')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="city" value="Cidade *" />
                    <jet-input id="city" type="text" class="mt-1 block w-full" v-model="form.city" ref="city" autocomplete="current-password" />
                    <jet-input-error :message="form.error('city')" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="state" value="Estado *" />
                    <jet-input id="state" type="text" class="mt-1 block w-full" v-model="form.state" ref="state" autocomplete="current-password" />
                    <jet-input-error :message="form.error('state')" class="mt-2" />
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

export default {
    layout: AppLayout,
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel
    },
    data() {
        return {
            form: this.$inertia.form({
                    email: '',
                    street: '',
                    number: '',
                    complement: '',
                    neighborhood: '',
                    city: '',
                    state: '',
                })
        }
    },
    methods: {
        storeProperty() {
            this.form.post(route('property.store'), {
                preserveScroll: true,
            }).then(() => {
            })
        }
    },
    created() {
        this.$root.pageOptions.header = 'Cadastrar Propriedade'
    }

}
</script>
