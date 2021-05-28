<template>
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
                {{ establishment.description }}
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
                    `${establishment.address.street}, Número ${
                      establishment.address.number
                    } ${
                      establishment.address.complement
                        ? establishment.address.complement
                        : ''
                    }`
                  }}
                  <br />
                  {{
                    `${establishment.address.district} - ${establishment.address.city} ${establishment.address.state}`
                  }}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Tempo médio de entrega</dt>
                <dd class="flex flex-row mt-1 text-sm text-gray-900">
                  <ClockIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                  {{ establishment.delivery_time }}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Valor minimo para entrega</dt>
                <dd class="flex flex-row mt-1 text-sm text-gray-900">
                  <CurrencyDollarIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                  {{ establishment.min_value }}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Telefone de Contato</dt>
                <dd class="flex flex-row mt-1 text-sm text-gray-900">
                  <PhoneIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                  {{ establishment.phone }}
                </dd>
              </div>
              <div class="sm:col-span-2">
                <dt class="flex flex-row text-sm font-medium text-gray-500">
                  <ClockIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
                  Hoario de Funcionamento
                </dt>
                <dd class="mt-1 text-sm text-gray-900">
                  <span
                    v-for="openingHour in establishment.opening_hours"
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
  name: "InfoCard",
  components: {
    LocationMarkerIcon,
    CurrencyDollarIcon,
    ClockIcon,
    PhoneIcon,
    InformationCircleIcon
  },
  props: {
    establishment: Object
  },
  data() {
    return {

    }
  },
  methods: {

  },
}
</script>
