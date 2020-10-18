<template>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <api-token-manager :tokens="tokens"
                                :available-permissions="availablePermissions"
                                :default-permissions="defaultPermissions" />
        </div>
    </div>
</template>

<script>
    import ApiTokenManager from './ApiTokenManager'
    import AppLayout from '@/Layouts/AppLayout'
    import JetSectionBorder from '@/Jetstream/SectionBorder'

    export default {
        layout: AppLayout,

        props: [
            'tokens',
            'availablePermissions',
            'defaultPermissions',
        ],

        components: {
            ApiTokenManager,
            AppLayout,
            JetSectionBorder,
        },

        created() {
            this.$root.pageOptions.header = 'API Tokens'
        }
    }
</script>
