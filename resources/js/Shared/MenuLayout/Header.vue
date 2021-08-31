<template>
    <header class="w-full bg-header-bg text-header-txt fixed top-0 z-40">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-4">
                <div class="visible lg:invisible md:invisible">
                    <div
                        class="flex pt-3"
                        v-if="$page.props?.auth?.user?.data"
                    >
                    <establishment-button
                        v-if="route().current() != 'profileIndex' && route().current() !='establishmentOrderShow'"
                        :href="route('profileIndex')"
                        type="redirect"
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
                    </div>
                    <div
                        class="flex p-3"
                        v-else
                    >
                    <establishment-button
                        :href="route('login')"
                        type="redirect"
                    >
                        <MailIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                        Entrar
                    </establishment-button>
                    </div>
                </div>
            </div>
            <div class="col-span-4">
                <h1
                    class="
                        flex-1 text-2xl font-bold
                        pt-5 text-center text-header-title"
                >
                    {{$page.props.establishment.data.name}}
                </h1>
            </div>
            <div class="col-span-4">
                <div
                    class="flex py-3"
                    v-if="$page.props?.auth?.user?.data"
                >
                    <establishment-button
                        v-if="route().current() != 'profileIndex' && route().current() !='establishmentOrderShow'"
                        :href="route('profileIndex')"
                        type="redirect"
                        class="mx-3 invisible lg:visible md:visible"
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
        </div>

      <!-- <nav aria-label="Top" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      </nav> -->
    </header>
</template>

<script>
import { MenuIcon, SearchIcon, ShoppingBagIcon, UserIcon, XIcon } from '@heroicons/vue/outline'
import { PopoverGroup } from '@headlessui/vue'
export default {
  name: 'MenuLayoutHeader',
  components: {
    MenuIcon, SearchIcon, ShoppingBagIcon, UserIcon, XIcon, PopoverGroup
  }
}
</script>
