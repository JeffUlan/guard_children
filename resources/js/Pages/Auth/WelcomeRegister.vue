<script setup>
    import { Head, Link } from '@inertiajs/vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import InputLabel from '@/Components/InputLabel.vue';
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <section class="h-full md:h-screen w-full">
            <div class="h-full flex-wrap justify-center text-neutral-800">
                <div class="block bg-white shadow-lg h-full">
                    <div class="g-0 lg:flex lg:flex-wrap h-full">
                        <div class="px-4 md:px-0 lg:w-7/12 flex flex-col">
                            <div class="md:mx-6 md:p-12">
                                <div class="flex flex-row">
                                    <div><img src="/img/Logo_small.svg"></div>
                                    <div class="flex flex-col pl-6">
                                        <div><h3 class="font-bold">Guard Children</h3></div>
                                        <div class="text-xs">Enjoy Your Work</div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:mx-6 md:px-80 md:py-40 flex-1">
                                <div>
                                    <h4 class="mb-12 mt-1 pb-1 text-3xl font-semibold">
                                        Welcome!
                                    </h4>
                                </div>
                                    <div class="flex flex-row justify-between">
                                        <div class="pb-1 pt-1 text-center w-1/4 border-zinc-950">
                                            <PrimaryButton
                                                class="border-gray-400 border flex flex-row justify-center"
                                                ><img src="/img/Google.svg" class="w-[24px] h-[24px]">
                                            </PrimaryButton>
                                            
                                        </div>
                                        <div class="pb-1 pt-1 text-center w-1/4">
                                            <PrimaryButton
                                                class="border-gray-400 border flex flex-row justify-center"
                                                >
                                                <img src="/img/Facebook.svg" class="w-[24px] h-[24px]">
                                            </PrimaryButton>
                                            
                                        </div>
                                        <div class="pb-1 pt-1 text-center w-1/4 border-rose-600">
                                            <PrimaryButton
                                                class="border-gray-400 border flex flex-row justify-center"
                                                >
                                                <img src="/img/Apple.svg" class="w-[24px] h-[24px]">
                                            </PrimaryButton>
                                            
                                        </div>
                                    </div>
                                    <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                                        <p class="mx-4 mb-0 text-center font-semibold dark:text-white">or</p>
                                    </div>
                                    <!-- <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4"> -->
                                    <div class="mb-4 pb-1 pt-1 text-center">
                                        <PrimaryButton
                                            class=""
                                            style="
                                            background: #E13A92;
                                            ">
                                            <a :href="route('register')">Continue with Email</a>
                                        </PrimaryButton>
                                    </div>
                                    <div class="flex items-center mt-4 mb-4">
                                        <InputLabel for="terms">
                                            <div class="flex items-center">
                                                <div class="ms-2">
                                                    <!-- I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a> -->
                                                    By creating an account you agree with our <a target="_blank" :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service,</a> &nbsp;<a target="_blank" :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>&nbsp;and&nbsp;<a target="_blank" :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">default Notification Settings</a>
                                                </div>
                                            </div>
                                        </InputLabel>
                                    </div>
                                    <div class="flex items-center justify-between pb-6">
                                        <p class="mb-0 mr-2">Already have an account? &nbsp;&nbsp;<Link :href="route('login')" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><span class="text-[#E13A92]">Sign in</span></Link></p>
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
