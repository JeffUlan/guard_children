<script setup>
    import { Link } from '@inertiajs/vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';

</script>
<template>
    <AuthenticationCard>
        <section class="h-full md:h-screen w-full">
            <div class="h-full justify-center text-neutral-800">
                    <div class="px-4 md:px-0 lg:w-7/12 flex flex-col items-center bg-gray-100 mx-auto">
                        <div class="px-4 py-6 text-white md:mx-6 md:p-12 w-full mb-12" style="background: linear-gradient(to right, #E13A92, #1d0015);">
                            <img
                                class="mr-8 w-24 h-24"
                                src="/img/Logo.svg"
                                alt="logo" />
                        </div>
                        <div class="md:mx-6 flex-1 mt-10 mb-12">
                            <div class="text-center flex flex-row mb-6">
                                <div class=" mt-1 pb-1 text-3xl font-semibold">
                                    Email Confirmation, before&nbsp;
                                </div>
                                <div class=" mt-1 pb-1 text-3xl font-semibold text-[#E13A92]">
                                    we get started...
                                </div>
                                
                            </div>
                            <p class="text-xl mb-12">Thank you for registering, to finish your registration please confirm<br> your email by clicking on the button below:</p>    
                            <div class="mb-12 pb-1 pt-1 text-center w-1/2">
                                <button
                                    class="rounded-full text-white w-full"
                                    style="
                                    background: #E13A92;
                                    padding-top:15px;
                                    padding-bottom:15px;
                                    ">
                                    Confirm your Email
                                </button>
                            </div>
                            <div class="flex flex-row text-xl mb-12">
                                <div>Didn't sign up for social Repeat?</div>
                                <div class="text-[#E13A92]">&nbsp;<Link :href="route('login')">Let us know</Link></div>
                            </div>
                            <div class="border border-gray-300 mb-12"></div>
                            <p class="text-xl mb-12">If you’re having trouble with the button above, copy<br> and paste the URL below into your web browser.</p>    
                            <p class="text-xl text-[#E13A92]"><a href="https://ddc6cb3-0cd1-40d5-8e62-39b5bac44841" target="_blank">https://ddc6cb3-0cd1-40d5-8e62-39b5bac44841</a></p>    
                        </div>
                    </div>
                    <div class="lg:w-7/12 mx-auto mt-10">
                        <p class="flex justify-end">Terms and conditions&nbsp;●&nbsp;Privacy policy</p>
                    </div>
                </div>
        </section>

    </AuthenticationCard>
</template>
