<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Bem vindo ao sistema de gerenciamento de propriedades e contratos!
            </div>

            <div class="mt-6 text-gray-500">
                Esse sistema foi desenvolvido para armazenar e gerenciar o cadastro de propriedades e de seus respectivos contratos
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400">
                        <path d="M1.77846 18.4754L16 6.7785L30.2215 18.4754L32 16.3131L16 3.15353L0 16.3131L1.77846 18.4754Z" fill="currentColor"/>
                        <path d="M16 9.57538L5.68385 18.0894V25.8947V28.5297V28.8465H26.3162V28.5608V25.8947V18.1204L16 9.57538ZM15.7512 24.7451H11.9292V21.1718H15.7512V24.7451ZM15.7512 20.7056H11.9292V17.1322H15.7512V20.7056ZM20.0702 24.7451H16.2482V21.1718H20.0702V24.7451ZM20.0702 20.7056H16.2482V17.1322H20.0702V20.7056Z" fill="currentColor"/>
                    </svg>

                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><inertia-link :href="route('property')">Propriedades</inertia-link></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Veja suas propriedades cadastradas, quais já foram contratadas e cadastre novas propriedades
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400">
                        <path d="M24.3446 5.46387C24.3446 4.71312 24.0516 4.00637 23.5206 3.47537L20.8692 0.824C20.3456 0.300313 19.6022 0 18.8625 0H18.7014V5.625H24.3446L24.3446 5.46387Z" fill="currentColor"/>
                        <path d="M17.1211 19.3461C17.3005 18.8013 17.6136 18.2941 18.0219 17.8831L24.3696 11.561V7.5H17.7821C17.2639 7.5 16.875 7.08069 16.875 6.5625V0H2.8125C1.26163 0 0 1.26163 0 2.8125V29.1875C0 30.7384 1.26163 32 2.8125 32H21.5321C23.0829 32 24.3696 30.7384 24.3696 29.1875V22.1906L23.3393 23.1958C22.9219 23.6096 22.433 23.9108 21.8818 24.0949L18.9009 25.0901L18.4468 25.1148C17.696 25.1148 16.9856 24.7495 16.5443 24.1379C16.1067 23.5291 15.9877 22.7399 16.2257 22.0268L17.1211 19.3461ZM4.6875 16.875H14.0321C14.5503 16.875 14.9696 17.2943 14.9696 17.8125C14.9696 18.3307 14.5503 18.75 14.0321 18.75H4.6875C4.16931 18.75 3.75 18.3307 3.75 17.8125C3.75 17.2943 4.16931 16.875 4.6875 16.875ZM3.75 14.0625C3.75 13.5443 4.16931 13.125 4.6875 13.125H14.0321C14.5503 13.125 14.9696 13.5443 14.9696 14.0625C14.9696 14.5807 14.5503 15 14.0321 15H4.6875C4.16931 15 3.75 14.5807 3.75 14.0625ZM3.75 21.5625C3.75 21.0443 4.16931 20.625 4.6875 20.625H14.0321C14.5503 20.625 14.9696 21.0443 14.9696 21.5625C14.9696 22.0807 14.5503 22.5 14.0321 22.5H4.6875C4.16931 22.5 3.75 22.0807 3.75 21.5625ZM17.7821 26.25C18.3003 26.25 18.7196 26.6693 18.7196 27.1875C18.7196 27.7057 18.3003 28.125 17.7821 28.125H12.1571C11.6389 28.125 11.2196 27.7057 11.2196 27.1875C11.2196 26.6693 11.6389 26.25 12.1571 26.25H17.7821ZM4.6875 11.25C4.16931 11.25 3.75 10.8307 3.75 10.3125C3.75 9.79431 4.16931 9.375 4.6875 9.375H17.7821C18.3003 9.375 18.7196 9.79431 18.7196 10.3125C18.7196 10.8307 18.3003 11.25 17.7821 11.25H4.6875Z" fill="currentColor"/>
                        <path d="M18.8194 20.1755L18.0038 22.6225C17.8816 22.989 18.2304 23.3377 18.5969 23.2153L21.0424 22.3985L18.8194 20.1755Z" fill="currentColor"/>
                        <path d="M26.1006 12.4567L19.9263 18.631L22.5891 21.2938C23.9846 19.898 26.6999 17.1824 28.7631 15.1192L26.1006 12.4567Z" fill="currentColor"/>
                        <path d="M31.4491 9.76776C31.1195 9.43633 30.6342 9.24683 30.1197 9.24683C29.6051 9.24683 29.1199 9.43633 28.7885 9.7687L27.4262 11.131L30.0886 13.7934C30.8344 13.0475 31.3499 12.532 31.451 12.431C32.1833 11.6975 32.1832 10.5029 31.4491 9.76776Z" fill="currentColor"/>
                        <path d="M31.451 12.4309C31.451 12.4309 31.451 12.4309 31.4511 12.4308C31.4535 12.4284 31.4545 12.4274 31.4565 12.4254C31.4545 12.4274 31.4535 12.4285 31.451 12.4309Z" fill="currentColor"/>
                        <path d="M31.4565 12.4254C31.4595 12.4224 31.463 12.4189 31.4648 12.4171C31.4629 12.419 31.4595 12.4224 31.4565 12.4254Z" fill="currentColor"/>
                        <path d="M31.4648 12.4171C31.4708 12.4111 31.471 12.4109 31.4648 12.4171V12.4171Z" fill="currentColor"/>
                    </svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><inertia-link :href="route('contract')">Contratos</inertia-link></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Veja seus contratos feitos para suas propriedades.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from './../Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
    }
</script>
