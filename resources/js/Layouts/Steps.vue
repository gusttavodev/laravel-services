<template>
  <nav aria-label="Progress">
    <ol class="border border-gray-300 rounded-md divide-y divide-gray-300 md:flex md:divide-y-0">
      <li v-for="(step, stepIdx) in steps" :key="step.name" class="relative md:flex-1 md:flex">
        <transition name="slide-fade">
            <button v-if="step.status === 'complete'" @click="jumpToStep(step)" class="group flex items-center w-full">
            <span class="px-6 py-4 flex items-center text-sm font-medium">
                <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                <CheckIcon class="w-6 h-6 text-white" aria-hidden="true" />
                </span>
                <span class="ml-4 text-sm font-medium text-gray-900">{{ step.name }}</span>
            </span>
            </button>

            <button v-else-if="step.status === 'current'" @click="jumpToStep(step)" class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                <span class="text-indigo-600">{{ step.id }}</span>
            </span>
            <span class="ml-4 text-sm font-medium text-indigo-600">{{ step.name }}</span>
            </button>

            <button v-else @click="jumpToStep(step)" class="group flex items-center">
            <span class="px-6 py-4 flex items-center text-sm font-medium">
                <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                <span class="text-gray-500 group-hover:text-gray-900">{{ step.id }}</span>
                </span>
                <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">{{ step.name }}</span>
            </span>
            </button>
        </transition>
        <template v-if="(stepIdx !== steps.length - 1)">
          <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
            <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
              <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
            </svg>
          </div>
        </template>
      </li>
    </ol>
  </nav>
</template>

<script>
import {
  CheckIcon
} from '@heroicons/vue/solid'

export default {
  name: 'Steps',
  components: {
    CheckIcon
  },
  props: {
    steps: Object
  },
  data() {
    return {
        currentStep: null
    }
  },
  created() {
    this.currentStep = this.steps[0]
  },
  methods: {
    jumpToStep(step){
        this.currentStep = step
        this.$emit("onJumpToStep", step);
    }
  },
}
</script>

<style scoped>
.slide-fade-leave-active {
  transition: all .4s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}
</style>

