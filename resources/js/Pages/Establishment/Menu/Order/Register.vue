<template>
   <div class="flex items-stretch flex-1 overflow-hidden bg-gray-100">
        <section
        aria-labelledby="applicant-information-title"
        class="px-2 py-2 mx-auto max-w-7xl sm:px-6 lg:px-8"
      >
        <div class="bg-white shadow sm:rounded-lg">
          <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">Finalize sua compra</h3>
              <p class="mt-1 text-sm text-gray-500">Escolha a forma que deseja realizar sua compra.</p>
            </div>

            <div class="grid grid-cols-6 gap-4">

                <div class="col-span-6 ">
                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>

                <div class="col-span-6">
                    <label for="email-address" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>

                <div class="col-span-6">
                    <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Entrar
                    </button>
                </div>

                <div class="col-span-6">
                    <inertia-link :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                        Não possui uma conta ? Registrar
                    </inertia-link>
                </div>
        </div>

          </div>
          <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
            <button type="submit" class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Pedir Via WhatsApp
            </button>
          </div>
        </div>
        </section>
      </div>
</template>

<script>
import MenuLayout from '@/Shared/MenuLayout'

export default {
  name: 'EstablishmentOrder',
  metaInfo: { title: 'establishment' },
  layout: MenuLayout,
  data() {
    return {

    }
  },
  methods: {
  },
}
</script>
