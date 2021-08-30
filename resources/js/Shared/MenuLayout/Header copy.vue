
<template>
<div class="bg-personal-colors-primary flex justify-between">
    <div >

    </div>

    <div class="py-2 flex flex-col align-center items-center">
         <inertia-link
            :href="route('establishmentShowPublic', $page.props.establishment.data.public_link_name)"
            method="get"

        >
            <img
                class="w-24 h-24 rounded-full sm:h-24 sm:w-24"
                :src="$page.props.establishment.data.picture"
                alt=""
            />
        </inertia-link>
    </div>

    <div
        class="flex items-baseline p-3"
        v-if="$page.props?.auth?.user?.data"
    >
        <establishment-button
            v-if="route().current() != 'profileIndex' && route().current() !='establishmentOrderShow'"
            :href="route('profileIndex')"
            type="redirect"
            class="mx-3"
        >
            Meu Perfil
        </establishment-button>
        <establishment-button
            v-else
            :href="route('establishmentShowPublic', $page.props.establishment.data.public_link_name)"
            type="redirect"
        >
            Voltar
        </establishment-button>

        <establishment-button
            :href="route('logout')"
            method="post"
            type="redirect"
        >
            Sair
        </establishment-button>
    </div>

    <div
        v-else
    >
        <establishment-button
            :href="route('login')"
            type="redirect"
            class="px-4 py-2"
        >
            <MailIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
            Entrar
        </establishment-button>
        <establishment-button
            :href="route('client.create', $page.props.establishment.data.public_link_name)"
            type="redirect"
            class="px-4 py-2"
        >
            Criar Conta
        </establishment-button>

    </div>
</div>
</template>

<script>
import {
  UserAddIcon,
  MailIcon
} from '@heroicons/vue/solid'

export default {
  name: 'MenuLayoutHeader',
  components: {
    MailIcon,
    UserAddIcon
  },
}
</script>
