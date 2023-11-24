<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    //import route from 'vendor/tightenco/ziggy/src/js';

    import { VueReCaptcha, useReCaptcha  } from 'vue-recaptcha-v3';
    import { onMounted } from 'vue';

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
    const captcha = useReCaptcha()
    onMounted(() => {
    captcha.executeRecaptcha()
    })
</script>
<script>
    // import { VueRecaptcha } from 'vue-recaptcha';
    export default {

    components: {
        VueReCaptcha,
    },
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
                                                <div class="text-right">Step&nbsp;01/03</div>
                                                <div class="font-semibold">Personal Info</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:mx-6 md:px-80 md:py-20 flex-1 flex flex-col items-center">
                                        <div class="text-center">
                                            <h4 class="mb-12 mt-1 pb-1 text-3xl font-semibold">
                                                Sign Up to continue
                                            </h4>
                                        </div>
                                        <form @submit.prevent="submit">
                                            <div class="flex flex-row justify-between">
                                                <div class="relative mb-4 w-6/12" data-te-input-wrapper-init>
                                                    <TextInput
                                                        id="name"
                                                        v-model="form.name"
                                                        type="text"
                                                        class="mt-1 block rounded-full w-11/12"
                                                        required
                                                        autofocus
                                                        autocomplete="name"
                                                        placeholder="FirstName"
                                                    />
                                                    <InputError class="mt-2" :message="form.errors.name" />
                                                </div>
                                                <div class="relative mb-4 w-6/12" data-te-input-wrapper-init>
                                                    <TextInput
                                                        id="lastname"
                                                        v-model="form.lastname"
                                                        type="text"
                                                        class="mt-1 block rounded-full w-full"
                                                        required
                                                        autofocus
                                                        autocomplete="name"
                                                        placeholder="LastName"
                                                    />
                                                    <InputError class="mt-2" :message="form.errors.name" />
                                                </div>
                                            </div>
                                            <div class="relative mb-4" data-te-input-wrapper-init>
                                                <TextInput
                                                    id="email"
                                                    v-model="form.email"
                                                    type="email"
                                                    class="mt-1 block w-full rounded-full"
                                                    required
                                                    autocomplete="username"
                                                    placeholder="Email"
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
                                                    autocomplete="new-password"
                                                    placeholder="Password"
                                                />
                                                <TextInput
                                                    v-else
                                                    id="password"
                                                    v-model="form.password"
                                                    type="password"
                                                    class="mt-1 block w-full rounded-full"
                                                    required
                                                    autocomplete="new-password"
                                                    placeholder="Password"
                                                />
                                                <img v-if="showPassword" src="/img/eye is open.svg" @click="toggleShowPassword" class="-ml-8">
                                                <img v-else src="/img/eye close.svg" @click="toggleShowPassword" class="-ml-8">
                                                <InputError class="mt-2" :message="form.errors.password" />
                                                
                                            </div>
                                           
                                            <div class="relative mb-6 flex" data-te-input-wrapper-init>
                                                <TextInput
                                                    v-if="showConfirmPassword"
                                                    id="password_confirmation"
                                                    v-model="form.password_confirmation"
                                                    type="text"
                                                    class="mt-1 block w-full rounded-full"
                                                    required
                                                    autocomplete="new-password"
                                                    placeholder="Confirm Password"
                                                />
                                                <TextInput
                                                    v-else
                                                    id="password_confirmation"
                                                    v-model="form.password_confirmation"
                                                    type="password"
                                                    class="mt-1 block w-full rounded-full"
                                                    required
                                                    autocomplete="new-password"
                                                    placeholder="Confirm Password"
                                                />
                                                <img v-if="showConfirmPassword" src="/img/eye is open.svg" @click="toggleShowConfirm" class="-ml-8">
                                                <img v-else src="/img/eye close.svg" @click="toggleShowConfirm" class="-ml-8">
                                                <InputError class="mt-2" :message="form.errors.password_confirmation" />
                                            </div>
                                            <!-- <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4"> -->
                                                <div class="flex items-center mt-4 mb-4">
                                                    <InputLabel for="terms">
                                                        <div class="flex items-center">
                                                            <!-- <Checkbox id="terms" v-model:checked="form.terms" name="terms" required /> -->
                                                            <Checkbox id="terms"  name="terms" required />
                                                            <div class="ms-2">
                                                                <!-- I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a> -->
                                                                I agree with 
                                                                <a target="_blank" :href="route('login')" 
                                                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    Terms of Service,
                                                                </a> 
                                                                <a target="_blank" :href="route('login')" 
                                                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    Privacy Policy
                                                                </a>&nbsp;and default&nbsp;
                                                                <a target="_blank" :href="route('login')" 
                                                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    Notification Settings
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <InputError class="mt-2" :message="form.errors.terms" />
                                                    </InputLabel>
                                                </div>
                                                <VueReCaptcha 
                                                    :sitekey="$page.props.recaptchav3_sitekey" 
                                                    @verify="onCaptchaVerify"
                                                    />
                                            <!-- <vue-recaptcha
                                                :sitekey="$page.props.recaptchav2_sitekey"
                                                :load-recaptcha-script="true"
                                                @verify="onCaptchaVerify"
                                                @error="handleError"
                                            ></vue-recaptcha> -->
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
                                                    Continue
                                                </PrimaryButton>
                                            </div>
                                            <div class="flex items-center justify-between pb-6">
                                                <p class="mb-0 mr-2">Already have an account? &nbsp;&nbsp;<Link :href="route('login')" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><span class="text-[#E13A92]">Sign in</span></Link></p>
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
