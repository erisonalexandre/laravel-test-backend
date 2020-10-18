<template>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <update-profile-information-form :user="$page.user" />

            <jet-section-border />

            <UpdatePasswordForm></UpdatePasswordForm>

            <jet-section-border />

            <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />

            <jet-section-border />

            <delete-user-form class="mt-10 sm:mt-0" />
        </div>
    </div>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import DeleteUserForm from './DeleteUserForm'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import LogoutOtherBrowserSessionsForm from './LogoutOtherBrowserSessionsForm'
    import UpdatePasswordForm from './UpdatePasswordForm'
    import UpdateProfileInformationForm from './UpdateProfileInformationForm'

    export default {
        layout: AppLayout,
        props: ['sessions'],

        components: {
            AppLayout,
            DeleteUserForm,
            JetSectionBorder,
            LogoutOtherBrowserSessionsForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
        },

        created() {
            this.$root.pageOptions.header = 'Perfil'
        }
    }
</script>
