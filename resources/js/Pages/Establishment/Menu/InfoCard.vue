<template>
<div class="flex items-stretch flex-1 overflow-hidden">
    <section
        aria-labelledby="applicant-information-title"
        class="px-4 pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8"
    >
        <div class="shadow sm:rounded-lg p-5 bg-info-bg">
            <div class="sm:flex">
                <div class="mb-4 flex-shrink-0 sm:mb-0 sm:mr-4">
                    <img
                        class="h-32 w-full sm:w-32"
                        :src="$page.props.establishment.data.picture"
                        alt=""
                    />

                </div>
                <div>
                <h4 class="text-info-title text-lg font-bold">{{ $page.props.establishment.data.name }}</h4>
                <p class="max-w-2xl mt-1 text-sm text-info-txt">
                    {{ $page.props.establishment.data.description }}
                </p>
            </div>
        </div>


          <div class="px-4 py-5 border-t border-info-separator sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-info-title">Endereço</dt>
                <dd class="flex flex-row mt-1 text-sm text-info-txt">
                  <LocationMarkerIcon class="w-5 h-5 mr-2 -ml-1 text-info-icon" aria-hidden="true" />
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
                <dt class="text-sm font-medium text-info-title">Taxa de entrega</dt>
                <dd class="flex flex-row mt-1 text-sm text-info-txt">
                  <ClockIcon class="w-5 h-5 mr-2 -ml-1 text-info-icon" aria-hidden="true" />
                  {{ establishment.default_delivery_tax }}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-info-title">Tempo médio de entrega</dt>
                <dd class="flex flex-row mt-1 text-sm text-info-txt">
                  <ClockIcon class="w-5 h-5 mr-2 -ml-1 text-info-icon" aria-hidden="true" />
                  {{ establishment.delivery_time }}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-info-title">Valor minimo para entrega</dt>
                <dd class="flex flex-row mt-1 text-sm text-info-txt">
                  <CurrencyDollarIcon class="w-5 h-5 mr-2 -ml-1 text-info-icon" aria-hidden="true" />
                  {{ establishment.min_value }}
                </dd>
              </div>
              <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-info-title">Telefone de Contato</dt>
                <dd class="flex flex-row mt-1 text-sm text-info-txt">
                  <PhoneIcon class="w-5 h-5 mr-2 -ml-1 text-info-icon" aria-hidden="true" />
                  {{ establishment.phone }}
                </dd>
              </div>
              <div class="sm:col-span-2">
                <dt class="flex flex-row text-sm font-medium text-info-title">
                  <ClockIcon class="w-5 h-5 mr-2 -ml-1 text-info-icon" aria-hidden="true" />
                  Horário de Funcionamento
                </dt>
                <dd class="mt-1 text-sm ">
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
                      m-2
                      text-time-txt
                      bg-time-bg
                    "
                  >
                    <div v-if="!openingHour.not_open">
                      <span>{{ openingHour.label }}</span>
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
