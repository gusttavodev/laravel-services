<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div
          class="h-full rounded-lg modal-container bg-grey-200 md:w-2/3 xl:w-3/4 md:h-2/3 xl:h-3/4"
        >
          <div class="modal-header">
            <div @click="$emit('close')" class="cursor-pointer">
              <XCircleIcon class="w-8 h-8 text-red-800" aria-hidden="true" />
            </div>
          </div>

          <div class="flex flex-col items-center col-span-1 text-center align-center">
            <div class="text-xl font-bold text-title-color">
              <slot name="header"> </slot>
            </div>
            <slot name="body"> </slot>
          </div>

          <div class="data-footer">
            <slot name="footer"> </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
import { XCircleIcon } from '@heroicons/vue/solid'

export default {
  name: 'Modal',
  components: {
    XCircleIcon,
  },
}
</script>

<style>
.data-footer {
  border-top: 1px solid #dee2e6;
  border-bottom-right-radius: calc(0.3rem - 1px);
  border-bottom-left-radius: calc(0.3rem - 1px);
}

.modal-mask {
  position: fixed;
  z-index: 2;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  /* width: 500px; */
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
