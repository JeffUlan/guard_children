<script setup>

    import { computed } from 'vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    
    const props = defineProps({
        status: String,
    });

    const form = useForm({});

    const submit = () => {
        form.post(route('verification.send'));
    };

    const verificationLinkSent = computed(() => props.status === 'verification-link-sent');

</script>

<template>
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
                                                <div class="text-right">Step&nbsp;02/03</div>
                                                <div class="font-semibold">Email Confirmation</div>
                                            </div>
                                        </div>
                                    </div>
                                    <form @submit.prevent="submit">
                                        <div class="md:mx-6 md:px-80 md:py-20 flex-1 flex items-center flex-col mt-40 mb-40">
                                            <div class="text-center">
                                                <h4 class="mb-6 mt-1 pb-1 text-3xl font-semibold">
                                                    Confirm your Email
                                                </h4>
                                                <p>Please check your email for the next step to Sign Up.</p>
                                            </div>
                                            <div class="mb-4 pb-1 pt-1 text-cente mt-10">
                                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" style="background: #E13A92;">
                                                    Resend Verification Email
                                                </PrimaryButton>
                                            </div>
                                        </div>
                                        
                                    </form>
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
