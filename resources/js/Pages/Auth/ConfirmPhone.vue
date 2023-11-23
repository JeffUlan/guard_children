<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';

    const form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: false,
    });

    const submit = () => {
        form.post(route('register'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    };

</script>
<script>
//    import { VueRecaptcha } from 'vue-recaptcha';

    export default {
        
    data() {
        return {
        showPassword: false,
        showConfirmPassword: false,
        password: null
        };
    },
    computed: {
        buttonLabel() {
        return (this.showPassword) ? "Hide" : "Show";
        }
    },
    methods: {
        toggleShowPassword() {
        this.showPassword = !this.showPassword;
        },
        toggleShowConfirm() {
        this.showConfirmPassword = !this.showConfirmPassword;
        },
        onCaptchaVerify(token) {
            this.form['g-recaptcha-response'] = token;
        },
        onSubmit() {
          if (!this.form['g-recaptcha-response']) {
            // Show error after submit.
            this.recaptcha_error = true;
          } else {
            // Proceed with submission.
          }
        }
    }
};
</script>
<template>
    <Head title="Register" />

    <AuthenticationCard>
        <section class="h-full md:h-screen w-full">
                <div
                    class="h-full flex-wrap justify-center text-neutral-800">
                        <div class="block bg-white shadow-lg h-full">
                            <div class="g-0 lg:flex lg:flex-wrap h-full">
                                <div class="px-4 md:px-0 lg:w-7/12 flex flex-col">
                                    <div class="md:mx-6 md:p-12">
                                        <div class="flex flex-row justify-between">
                                            <div><img src="/img/Group 116662.svg"></div>
                                            <div class="flex flex-col">
                                                <div class="text-right">Step&nbsp;03/03</div>
                                                <div class="font-semibold">SMS Confirmation</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:mx-6 md:px-80 md:py-20 flex-1 flex flex-col items-center">
                                        <div class="flex flex-col items-center">
                                            <div class="text-center">
                                                <h4 class="mb-12 mt-1 pb-1 text-3xl font-semibold">
                                                    Confirm your Phone
                                                </h4>
                                            </div>
                                            <form @submit.prevent="submit">
                                                
                                                <div class="relative mb-4" data-te-input-wrapper-init>










                                                </div>
                                                <vue-recaptcha
                                                    :sitekey="$page.props.recaptchav2_sitekey"
                                                    :load-recaptcha-script="true"
                                                    @verify="onCaptchaVerify"
                                                    @error="handleError"
                                                ></vue-recaptcha>
                                                <span
                                                v-if="recaptcha_error"
                                                class="error-message"
                                                >Please confirm you are not a robot.
                                                </span>
                                                <div class="mb-4 pb-1 pt-1 text-center">
                                                    <PrimaryButton
                                                        class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                                                        style="
                                                        background: #E13A92;
                                                        ">
                                                        Send Code
                                                    </PrimaryButton>
                                                </div>
                                                <div class="flex items-center justify-between pb-6">
                                                    <p class="mb-0 mr-2">Already have an account? &nbsp;&nbsp;<Link :href="route('login')" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><span class="text-[#E13A92]">Sign in</span></Link></p>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                    <div class="md:mx-6 md:p-12">
                                        <div class="flex items-center justify-center mt-4">
                                            <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Privacy Police
                                            </Link>
                                            &nbsp;and&nbsp;
                                            <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Terms of Service
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex justify-center items-center rounded-b-lg lg:w-5/12 lg:rounded-r-lg lg:rounded-bl-none"
                                    style="
                                    background: linear-gradient(to bottom, #E13A92, #1d0015);
                                    ">
                                    <div class="px-4 py-6 text-white md:mx-6 md:p-12">
                                        <img
                                            class="mx-auto w-48"
                                            src="/img/Logo.svg"
                                            alt="logo" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>

    </AuthenticationCard>
</template>
