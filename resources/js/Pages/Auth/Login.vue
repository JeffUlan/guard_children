<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
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
                                                <div class="text-right">Step&nbsp;01</div>
                                                <div class="font-semibold">User Profile</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:mx-6 md:px-80 md:py-20 flex-1 flex  flex-col items-center">
                                        <div class="text-center">
                                            <h4 class="mb-12 mt-1 pb-1 text-3xl font-semibold">
                                                Sign In as User
                                            </h4>
                                        </div>
                                        <form @submit.prevent="submit">
                                            <div class="relative mb-4" data-te-input-wrapper-init>
                                                <TextInput
                                                    id="email"
                                                    v-model="form.email"
                                                    type="email"
                                                    class="mt-1 block w-full rounded-full"
                                                    required
                                                    autocomplete="username"
                                                    placeholder="Your Username or Email"
                                                />
                                                <InputError class="mt-2" :message="form.errors.email" />
                                            </div>
                                            <div class="relative mb-4 flex" data-te-input-wrapper-init>
                                                <TextInput
                                                    v-if="showPassword"
                                                    id="password"
                                                    v-model="form.password"
                                                    type="text"
                                                    class="mt-1 block w-full rounded-full"
                                                    required
                                                    autocomplete="password"
                                                    placeholder="Password"
                                                />
                                                <TextInput
                                                    v-else
                                                    id="password"
                                                    v-model="form.password"
                                                    type="password"
                                                    class="mt-1 block w-full rounded-full"
                                                    required
                                                    autocomplete="password"
                                                    placeholder="Password"
                                                />
                                                <img v-if="showPassword" src="/img/eye is open.svg" @click="toggleShowPassword" class="-ml-8">
                                                <img v-else src="/img/eye close.svg" @click="toggleShowPassword" class="-ml-8">
                                                <InputError class="mt-2" :message="form.errors.password" />
                                                
                                            </div>
                                            <div class="mt-4 mb-4">
                                                <InputLabel for="terms">
                                                    <div class="flex flex-row justify-between">
                                                        <div class="ms-2">
                                                            <Checkbox id="terms"  name="terms" class="mr-[5px]"/>
                                                            keep me logged in
                                                        </div>
                                                        <div class="ms-2">
                                                            <Link :href="route('password.request')" class="ms-2">Forgot Password?</Link>
                                                        </div>
                                                    </div>
                                                </InputLabel>
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
                                                    style="
                                                    background: #E13A92;
                                                    ">
                                                    <Link :href="route('login')">Sign in</Link>
                                                </PrimaryButton>
                                            </div>
                                            <div class="flex items-center justify-between pb-6">
                                                <p class="mb-0 mr-2">Don't have an account? &nbsp;&nbsp;
                                                    <Link :href="route('register')" 
                                                        class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <span class="text-[#E13A92]">
                                                            Sign up
                                                        </span>
                                                    </Link>
                                                </p>
                                            </div>
                                        </form>
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
