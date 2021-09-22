<template>
<div class="grid grid-cols-12 gap-4 w-full py-5">
    <div class="col-span-12">
        <label class="block py-2 text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            {{ label }}
        </label>
    </div>
    <div class="col-span-12">
       <input
            type="file"
            class="hidden"
            ref="component_picture_upload"
            accept="image/*"
            @change="change"
        />
        <button
            type="button"
            @click="selectNewPhoto"
            ref="photo"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sys_primary-500"
        >
            Escolha Foto
        </button>
        <div v-if="errors" class="mt-2 text-sm text-sys_error-700">{{ errors }}</div>
    </div>
    <div class="col-span-12">
        <div v-if="isEdit && !editPhotoPreview && defaultImageUrl">
            <img
            id="old_image"
            :src="defaultImageUrl"
            class="block w-40 h-40 max-w-lg border-gray-300 rounded-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm"
            />
        </div>
        <div v-else-if="photoPreview">
            <span
            class="block w-40 h-40 rounded-full"
            :style="
            'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
            photoPreview +
            '\');'
            "
            >
            </span>
        </div>
        <div v-else>
            <span class="block w-40 h-40 rounded-full bg-sys_secondary-500"> </span>
        </div>
    </div>
</div>
</template>

<script>
export default {
  components: {},
  props: {
    value: {
      type: [File, String, Boolean],
    },
    label: {
      type: String,
      default: 'Foto:',
    },
    isEdit: {
      type: Boolean,
      default: false,
    },
    defaultImageUrl: {
      type: [File, String, Boolean],
      default: '',
    },
    errors: {
      type: Array,
    },
  },
  watch: {
    value(value) {
      if (!value) {
        this.$refs.component_picture_upload.value = ''
      }
    },
  },
  data() {
    return {
      photoPreview: null,
      editPhotoPreview: false,
    }
  },
  methods: {
    change(e) {
      const reader = new FileReader()
      reader.onload = (e) => {
        this.photoPreview = e.target.result
      }

      const eventFile = e.target.files[0]
      if (this.isEdit) this.editPhotoPreview = true
      reader.readAsDataURL(eventFile)

      // Emmit v-model default input event
      this.$emit('update:modelValue', eventFile)
    },
    remove() {
      this.photoPreview = null
      this.$emit('update:modelValue', null)
    },
    selectNewPhoto() {
      this.$refs.component_picture_upload.click()
    },
  },
}
</script>
