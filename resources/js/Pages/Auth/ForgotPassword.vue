<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />
    <AuthenticationCard>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <section class="h-full md:h-screen w-full">
            <div class="h-full flex-wrap justify-center text-neutral-800">
                <div class="block bg-white shadow-lg h-full">
                    <div class="g-0 lg:flex lg:flex-wrap h-full">
                        <div class="px-4 md:px-0 lg:w-7/12 flex flex-col">
                            <div class="md:mx-6 md:p-12">
                                <div class="flex flex-row justify-between">
                                    <div><img src="/img/Group 116662.svg"></div>
                                    <div class="flex flex-col">
                                    </div>
                                </div>
                            </div>
                            <div class="md:mx-6 md:px-80 md:py-20 flex-1 self-center">
                                <div class="text-center">
                                    <h4 class="mb-12 mt-1 pb-1 text-3xl font-semibold">
                                        Reset Password
                                    </h4>
                                </div>
                                <div class="text-sm text-gray-600 mb-8">
                                    Enter the email address you used when you joined and we'll send you instructions to reset your password.
                                </div>
                                <form @submit.prevent="submit">
                                    <div class="relative mb-8" data-te-input-wrapper-init>
                                        <TextInput
                                            id="email"
                                            v-model="form.email"
                                            type="email"
                                            class="mt-1 block w-full rounded-full"
                                            required
                                            autocomplete="username"
                                            placeholder="Your Email"
                                        />
                                        <InputError class="mt-2" :message="form.errors.email" />
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
                                            <!-- Send Reset Instructions -->
                                            <Link :href="route('login')">Send Reset Instructions</Link>
                                        </PrimaryButton>
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
