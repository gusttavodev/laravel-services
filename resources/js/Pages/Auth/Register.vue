<template>
    <breeze-validation-errors class="mb-4" />

    <form @submit.prevent="submit">

        <div class="mt-4">
            <breeze-input
                v-model="form.name"
                :value="form.name"
                :error="errors.name"
                class="mt-10"
                label="Nome"
                type="text"
                :required="true"
            />
        </div>

        <div class="mt-4">
            <breeze-input
                v-model="form.phone"
                :value="form.phone"
                :error="errors.phone"
                class="mt-10"
                label="Telefone de contato"
                type="text"
                :required="true"
            />
        </div>

        <div class="mt-4">
            <breeze-input
                v-model="form.email"
                :value="form.email"
                :error="errors.email"
                class="mt-10"
                label="Email"
                type="email"
                :required="true"
            />
        </div>

        <div class="mt-4">
            <breeze-input
            v-model="form.password"
            :value="form.password"
            :error="errors.password"
            class="mt-10"
            label="Senha"
            type="password"
            :required="true"
            />
        </div>

        <div class="mt-4">
            <breeze-input
                v-model="form.password_confirmation"
                :value="form.password_confirmation"
                :error="errors.password_confirmation"
                class="mt-10"
                label="Confirme a Senha"
                type="password"
                :required="true"
            />
        </div>


        <div class="flex items-center justify-end mt-4">
            <inertia-link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Já está registrado ?
            </inertia-link>

            <breeze-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Register
            </breeze-button>
        </div>
    </form>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeGuestLayout from '@/Layouts/Guest'
    import BreezeInput from '@/Components/Input'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'

    export default {
        layout: BreezeGuestLayout,

        components: {
            BreezeButton,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
        },
        props: {
            user: Object,
            errors: Object,
            type: String,
            establishment: Object
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                console.log("this.establishment.data.id => ", this.establishment.data.id)

                if(this.type == 'client'){
                    this.form.post(this.route('client.store', this.establishment.data.public_link_name), {
                        onFinish: () => this.form.reset('password', 'password_confirmation'),
                    })
                    return
                }
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
