<template>
  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Horarios de Fucionamento</h3>
            <p class="mt-1 text-sm text-gray-500">
              Configure Horarios de Fucionamento do Estabelecimento
            </p>
          </div>

          <OpeningTimeInput
            v-for="(input, key) in form.openingHour"
            :key="key"
            @onChangeInputs="(values) => onChangeInputs(values, key)"
            class="mt-10"
            :days_of_week="input"
          />
        </div>
        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
          <button
            type="submit"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sys_primary-500"
          >
            Salvar
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
import TextInput from '@/Shared/TextInput'
import OpeningTimeInput from '@/Shared/OpeningTimeInput'

export default {
  name: 'OpeningHourForm',
  components: {
    Datepicker,
    TextInput,
    OpeningTimeInput,
  },
  props: {
    errors: Object,
    establishment: Object,
    establishmentOpeningHours: Array,
    daysOfWeek: Array
  },
  data() {
    return {
      form: {
        establishment_id: this.establishment.data.id,
        openingHour: this.daysOfWeek,
      },
    }
  },
  created() {
    if(this.establishmentOpeningHours.length === 7)  this.form.openingHour = this.establishmentOpeningHours
  },
  methods: {
    onChangeInputs(value, key) {
      this.form.openingHour[key] = value
    },
    submit() {
      if (this.validate()) {
        this.$inertia.post(route('establishmentOpeningHourStore'), this.form)
      }
    },
    validate() {
      const required = 'Preencha este campo'
      const mustBeBigger = 'Precisa ser maior que o inicio'
      this.form.openingHour.forEach((element) => {
        if (!element.not_open) {
          //Required
          if (element.start_time == null) {
            element.start_time_error = required
          } else {
            element.start_time_error = null
          }

          if (element.end_time == null) {
            element.end_time_error = required
          } else {
            element.end_time_error = null
            //MustBeBigger
            if (element.start_time != null) {
              const startTime = new Date(`01/01/1970 ${element.start_time}`)
              const endTime = new Date(`01/01/1970 ${element.end_time}`)
              const timeDiff = endTime.getTime() - startTime.getTime()
              if (timeDiff < 0) {
                element.end_time_error = mustBeBigger
              } else {
                element.end_time_error = null
              }
            }
          }
        } else {
          element.start_time_error = null
          element.end_time_error = null
        }
      })

      let valid = true
      this.form.openingHour.forEach((element) => {
        if (element.start_time_error !== null || element.end_time_error !== null) {
          valid = false
        }
      })

      return valid
    },
  },
}
</script>
