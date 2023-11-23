<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    email: props.user.email,
    photo: null,
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    router.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
</script>

<!-- <template> -->
    <!-- <FormSection @submitted="updateProfileInformation"> -->
        <template #title>
            <div class="flex flex-row font-semibold">
                Overview
                <img src="/img/profile/overview.svg" class="ml-5">
            </div>
            <div class="flex flex-row mt-4">
                <div>
                    <p class="font-light text-sm">Job Title :</p>
                    <p class="font-light text-sm mt-2">Phone :</p>
                    <p class="font-light text-sm mt-2">Location :</p>
                </div>
                <div class="ml-3">
                    <p class="font-medium text-sm">Data Analyst</p>
                    <p class="font-medium text-sm mt-2">+495 5965 2562</p>
                    <p class="font-medium text-sm mt-2">123 Main Street Anytown, USA 12345</p>
                </div>
                <div class="ml-6">
                    <p class="font-light text-sm">Email :</p>
                    <p class="font-light text-sm mt-2">Skype :</p>
                    <p class="font-light text-sm mt-2">Birthday :</p>
                </div>
                <div class="ml-3">
                    <p class="font-medium text-sm">oleksandrrobul88@gmail.com</p>
                    <p class="font-medium text-sm mt-2">Add Skype Number</p>
                    <p class="font-medium text-sm mt-2">01/11/1991</p>
                </div>
            </div>


            <div class="flex flex-row mt-6 font-semibold">
                Working Status
            </div>
            <div class="mt-4">
                <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod.</p>
            </div>
            <div class="flex flex-row mt-4 ">
                <div>
                    <p><label class="inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
						<input
							type="radio"
							class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
							name="accountType"
							value="busines"
						/>
						<span class="ml-2">In the office</span>
					</label></p>
                    <p><label class="inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
						<input
							type="radio"
							class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
							name="accountType"
							value="busines"
						/>
						<span class="ml-2">Out of office</span>
					</label></p>
                </div>
                <div>
                    <p><label class="ml-6 inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
						<input
							type="radio"
							class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
							name="accountType"
							value="busines"
						/>
						<span class="ml-2">Working from home</span>
					</label></p>
                    <p><label class="ml-6 inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
						<input
							type="radio"
							class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
							name="accountType"
							value="busines"
						/>
						<span class="ml-2">working outside</span>
					</label></p>
                </div>
                <div>
                    <p><label class="ml-6 inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
                        <input
                            type="radio"
                            class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
                            name="accountType"
                            value="busines"
                        />
                        <span class="ml-2">Out sick</span>
                    </label></p>
                    <p><label class="ml-6 inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
                        <input
                            type="radio"
                            class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
                            name="accountType"
                            value="busines"
                        />
                        <span class="ml-2">Family time</span>
                    </label></p>
                </div>
                <div>
                    <p><label class="ml-6 inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
						<input
							type="radio"
							class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
							name="accountType"
							value="busines"
						/>
						<span class="ml-2">On break</span>
					</label></p>
                    <p><label class="ml-6 inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
						<input
							type="radio"
							class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
							name="accountType"
							value="busines"
						/>
						<span class="ml-2">Do not disturb</span>
					</label></p>
                </div>
            </div>

            <div class="flex flex-row mt-6 font-semibold">
                Change your Password    
            </div>
            <div class="mt-4">
                <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod.</p>
            </div>
            <div class="flex flex-col w-2/4 mt-4">
                <input type="text" class="mt-2 bg-white rounded-full border-none" placeholder="Current Password">
                <input type="text" class="mt-2 bg-white rounded-full border-none" placeholder="New Password">
                <input type="text" class="mt-2 bg-white rounded-full border-none" placeholder="Confirm Password">
            </div>
            <div class="mt-5 flex flex-row justify-between w-2/4">
                <div class="text-sm font-semibold flex items-center mr-2">
                    Forgot your password?
                    <Link :href="route('login')" class="text-[#E13A92] text-sm font-semibold flex items-center ml-2">
                        Reset password via email
                    </Link>
                </div>
                
                <button class="rounded-full bg-white py-2 px-10">Save</button>
            </div>

        </template>
        
        <!-- <template #form> -->
            <!-- Profile Photo -->
            <!-- <div v-if="$page.props.jetstream.managesProfilePhotos" class="col-span-6 sm:col-span-4"> -->
                <!-- Profile Photo File Input -->
                <!-- <input
                    id="photo"
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    @change="updatePhotoPreview"
                >

                <InputLabel for="photo" value="Photo" /> -->

                <!-- Current Profile Photo -->
                <!-- <div v-show="! photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div> -->

                <!-- New Profile Photo Preview -->
                <!-- <div v-show="photoPreview" class="mt-2">
                    <span
                        class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'"
                    />
                </div>

                <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </SecondaryButton>

                <SecondaryButton
                    v-if="user.profile_photo_path"
                    type="button"
                    class="mt-2"
                    @click.prevent="deletePhoto"
                >
                    Remove Photo
                </SecondaryButton>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div> -->

            <!-- Name -->
            <!-- <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div> -->

            <!-- Email -->
            <!-- <div class="col-span-6 sm:col-span-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError :message="form.errors.email" class="mt-2" />

                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                    <p class="text-sm mt-2">
                        Your email address is unverified.

                        <Link
                            :href="route('verification.send')"
                            method="post"
                            as="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click.prevent="sendEmailVerification"
                        >
                            Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </div>
                </div>
            </div>
        </template> -->

        <!-- <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template> -->
    <!-- </FormSection> -->
<!-- </template> -->
