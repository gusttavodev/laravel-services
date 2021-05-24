<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div>
    <div>
      <img
        class="object-cover w-full h-32 lg:h-48"
        :src="establishment.data.background_picture"
        alt=""
      />
    </div>
    <div class="max-w-5xl px-4 mx-auto mb-2 sm:px-6 lg:px-8">
      <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
        <div class="flex">
          <img
            class="w-24 h-24 rounded-full sm:h-32 sm:w-32"
            :src="establishment.data.picture"
            alt=""
          />
        </div>
        <div
          class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1"
        >
          <div class="flex-1 min-w-0 mt-6 sm:hidden md:block">
            <h1 class="text-2xl font-bold text-gray-900 truncate">
              {{ establishment.data.name }}
            </h1>
          </div>
          <div
            class="flex flex-col mt-6 space-y-3 justify-stretch sm:flex-row sm:space-y-0 sm:space-x-4"
          >
            <button
              type="button"
              class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
            >
              <MailIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
              <span>Login</span>
            </button>
            <button
              type="button"
              class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
            >
              <UserAddIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
              <span>Registrar</span>
            </button>
          </div>
        </div>
      </div>
      <div class="flex-1 hidden min-w-0 mt-6 sm:block md:hidden">
        <h1 class="text-2xl font-bold text-gray-900 truncate">
          {{establishment.data.name}}
        </h1>
      </div>
    </div>

    <div class="flex items-stretch flex-1 overflow-hidden bg-gray-100">
      <section
        aria-labelledby="applicant-information-title"
        class="px-4 pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8"
      >
        <div class="bg-white shadow sm:rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h2
              id="applicant-information-title"
              class="text-lg font-medium leading-6 text-gray-900"
            >
              Sobre
            </h2>

            <div class="flex flex-row">
              <InformationCircleIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
              <p class="max-w-2xl mt-1 text-sm text-gray-500">
                {{ establishment.data.description }}
              </p>
            </div>
          </div>
          <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Endereço</dt>
                <dd class="flex flex-row mt-1 text-sm text-gray-900">
                  <LocationMarkerIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                  {{
                    `${establishment.data.address.street}, Número ${
                      establishment.data.address.number
                    } ${
                      establishment.data.address.complement
                        ? establishment.data.address.complement
                        : ''
                    }`
                  }}
                  <br />
                  {{
                    `${establishment.data.address.district} - ${establishment.data.address.city} ${establishment.data.address.state}`
                  }}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Tempo médio de entrega</dt>
                <dd class="flex flex-row mt-1 text-sm text-gray-900">
                  <ClockIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                  {{ establishment.data.delivery_time }}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Valor minimo para entrega</dt>
                <dd class="flex flex-row mt-1 text-sm text-gray-900">
                  <CurrencyDollarIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                  {{ establishment.data.min_value }}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Telefone de Contato</dt>
                <dd class="flex flex-row mt-1 text-sm text-gray-900">
                  <PhoneIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                  {{ establishment.data.phone }}
                </dd>
              </div>
              <div class="sm:col-span-2">
                <dt class="flex flex-row text-sm font-medium text-gray-500">
                  <ClockIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                  Hoario de Funcionamento
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                  <span
                    v-for="openingHour in establishment.data.opening_hours"
                    :key="openingHour.id"
                    class="
                      inline-flex
                      items-center
                      px-3
                      py-1.5
                      rounded-md
                      text-sm
                      font-medium
                      bg-blue-100
                      text-blue-800
                      m-2
                    "
                  >
                    <div v-if="!openingHour.not_open">
                      <span class="text-title-color">{{ openingHour.label }}</span>
                      {{ openingHour.start_time }}
                      <span>Até</span>
                      {{ openingHour.end_time }}
                    </div>
                    <div v-else>
                      <span>{{ openingHour.label }}:</span> Não Funciona
                    </div>
                  </span>
                </dd>
              </div>
            </dl>
          </div>
        </div>
      </section>
    </div>

    <!-- Main content -->
    <div class="flex items-stretch flex-1 overflow-hidden bg-gray-100">
      <main class="flex-1 overflow-y-auto">
        <div class="px-4 pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="flex">
            <h1 class="flex-1 text-2xl font-bold text-gray-900">Produtos</h1>
          </div>

          <!-- Tabs -->
          <div class="mt-3 sm:mt-2">
            <div class="sm:hidden">
              <label for="tabs" class="sr-only">Select a tab</label>
              <select
                id="tabs"
                name="tabs"
                class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              >
                <option selected="">Recently Viewed</option>
                <option>Recently Added</option>
                <option>Favorited</option>
              </select>
            </div>
            <div class="hidden sm:block">
              <div class="flex items-center border-b border-gray-200">
                <nav class="flex items-center justify-between flex-1 -mb-px space-x-6 xl:space-x-8" aria-label="Tabs">
                  <a
                    v-for="category in categories.data"
                    :key="category.id"
                    @click="changeCategory(category)"
                    :aria-current="category.id == selectedCategory?.id ? 'page' : undefined"
                    :class="[
                      category.id == selectedCategory?.id
                        ? 'border-indigo-500 text-indigo-600'
                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                      'py-4 px-1 border-b-2 font-medium text-2xl cursor-pointer',
                    ]"
                  >
                    {{ category.name }}
                  </a>
                </nav>
              </div>
            </div>
          </div>

          <!-- Gallery -->
          <section class="pb-16 mt-8" aria-labelledby="gallery-heading">
            <h2 id="gallery-heading" class="sr-only">Recently viewed</h2>
            <ul
              role="list"
              class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-1 sm:gap-x-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 xl:gap-x-8"
            >
              <li
                v-for="product in selectedProducts"
                :key="product.id"
                class="flex flex-col col-span-1 text-center bg-white divide-y divide-gray-200 rounded-lg shadow-xl "
              >
                <div class="flex flex-col flex-1 p-8">
                  <img   class="block w-full max-h-full rounded h-80 md:max-h-screen md:h-40 lg:h-40" :src="product.picture" alt="" />
                  <h3 class="mt-6 text-sm font-medium text-gray-900">{{ product.name }}</h3>
                  <dl class="flex flex-col justify-between flex-grow mt-1">
                    <dt class="sr-only">Title</dt>
                    <dt class="sr-only">Role</dt>
                    <dd class="mt-3">
                      <span
                        class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full "
                        >R$ {{ product.price }}</span
                      >
                    </dd>
                  </dl>
                </div>
                <div>
                  <div class="flex -mt-px divide-x divide-gray-200">
                    <button
                      @click="onSelectProduct(product)"
                      class="relative inline-flex items-center justify-center flex-1 w-0 py-4 -mr-px text-sm font-medium text-gray-700 border border-transparent rounded-bl-lg hover:text-gray-500"
                    >
                      <ShoppingCartIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
                      <span class="ml-3">Adicionar ao Carrinho</span>
                    </button>
                  </div>
                </div>
              </li>
            </ul>
          </section>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import {
  UserAddIcon,
  MailIcon,
  ShoppingCartIcon,
  LocationMarkerIcon,
  CurrencyDollarIcon,
  ClockIcon,
  PhoneIcon,
  InformationCircleIcon,
} from '@heroicons/vue/solid'

export default {
  metaInfo: { title: 'establishment' },
  components: {
    PhoneIcon,
    MailIcon,
    ShoppingCartIcon,
    UserAddIcon,
    LocationMarkerIcon,
    CurrencyDollarIcon,
    ClockIcon,
    PhoneIcon,
    InformationCircleIcon,
  },
  props: {
    establishment: Object,
    categories: Object
  },
  data() {
    return {
      selectedCategory: {},
      selectedProducts: {},
      tabs: [
        { name: 'Açai', href: '#', current: true },
        { name: 'Pizza', href: '#', current: false },
        { name: 'Cervejas', href: '#', current: false },
      ],
      people: [
        {
          name: 'Jane Cooper',
          title: 'Paradigm Representative',
          role: 'Admin',
          email: 'janecooper@example.com',
          telephone: '+1-202-555-0170',
          imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
        },
      ],
    }
  },
  created() {
    console.log("GUSTAVO TESTE ", this.categories.data);
  },
  methods: {
      changeCategory(category){
        this.selectedCategory = category;
        this.selectedProducts = category.products;
      },
      onSelectProduct(product){

      }
  },
}
</script>
