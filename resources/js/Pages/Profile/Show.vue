<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<script>
export default {    
  data() {
    return {
        activeTab: 'tab1', // Assuming 'tab1' is the initially active tab
        tabs: ['tab1', 'tab2', 'tab3'], // Array of tab names
        tab: 1,
    };
  },
  methods: {
    currentTab: function (tabNumber) {
      this.tab = tabNumber;
    },
  },
};
</script>

<template>
    <AppLayout title="Profile">
        <div class="mt-8 mx-auto sm:px-6">
            <div class="py-6 relative">
                <img src="/img/profile/background.svg" class="">
                <img src="/img/profile/fade_background.svg" class="absolute top-[60px;]">
                <img src="/img/profile/user.png"   class="absolute top-[45px;] left-[60px] text-2xl">
                <p class="absolute top-[70px] text-white left-[250px] font-bold text-2xl">Oleksandr</p>
                <p class="absolute top-[110px] text-white left-[250px]">As a Data Analyst, you will leverage statistical methods and data visualization tools to extract<br>meaningful insights from complex datasets, aiding in informed decision-making.</p>
            </div>
        </div>

        <div>
            <div class="container sm:px-6">
                <div>
                    <div class="flex">
                        <button @click="activeTab = 'tab1'" :class="{ 'border-b-[#E13A92] border-b-4': activeTab === 'tab1', 'bg-gray-100 border-b-4': activeTab !== 'tab1' }" class="px-4 py-2">Profile Information</button>
                        <button @click="activeTab = 'tab2'" :class="{ 'border-b-[#E13A92] border-b-4': activeTab === 'tab2', 'bg-gray-100 border-b-4': activeTab !== 'tab2' }" class="px-4 py-2">Admin</button>
                        <button @click="activeTab = 'tab3'" :class="{ 'border-b-[#E13A92] border-b-4': activeTab === 'tab3', 'bg-gray-100 border-b-4': activeTab !== 'tab3' }" class="px-4 py-2">Notifications</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="max-w-7xl py-10 sm:px-6 lg:px-8">
            <div v-if="activeTab === 'tab1'">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <UpdateProfileInformationForm :user="$page.props.auth.user" />
                </div>
                <!-- <div v-if="$page.props.jetstream.canUpdatePassword">
                    <UpdatePasswordForm class="mt-10 sm:mt-0" />
                </div> -->
            </div>
            <div v-if="activeTab === 'tab2'">
                <div class="grid grid-cols-8 gap-4">
                    <div class="...">
                        <div class="flex flex-row">
                            <img src="/img/profile/general.svg">
                            <div class="text-[#E13A92] ml-1">General</div>
                        </div>
                        <div class="flex flex-row mt-1">
                            <img src="/img/profile/customization.svg">
                            <div class="ml-1">Customization</div>
                        </div>
                        <div class="flex flex-row mt-1">
                            <img src="/img/profile/user.svg">
                            <div class="ml-1">Users</div>
                        </div>
                        <div class="flex flex-row mt-1">
                            <img src="/img/profile/security.svg">
                            <div class="ml-1">Security</div>
                        </div>
                        <div class="flex flex-row mt-1">
                            <img src="/img/profile/API.svg">
                            <div class="ml-1">API</div>
                        </div>
                        <div class="flex flex-row mt-1">
                            <img src="/img/profile/usage.svg">
                            <div class="ml-1">Usage state</div>
                        </div>
                        <div class="flex flex-row mt-1">
                            <img src="/img/profile/permission.svg">
                            <div class="ml-1">Permission</div>
                        </div>
                    </div>
                    <div class="col-span-5 ml-16">
                        <div class="flex flex-row font-semibold">
                            Login Details
                            <img src="/img/profile/overview.svg" class="ml-5">
                        </div>
                        <div class="flex flex-row mt-5">
                            <div class="text-sm items-center flex mr-5">Account Name</div>
                            <div><input type="text" class="text-sm bg-gray-100"></div>
                        </div>
                        <div class="flex flex-row mt-3">
                            <div class="text-sm items-center flex mr-8">Account URL</div>
                            <div><input type="text" class="text-sm mr-5 bg-gray-100"></div>
                            <div class="text-sm items-center flex ">example.com</div>
                        </div>
                        <div class="mt-5 flex flex-row">
                            <img src="/img/profile/info.svg" class="mr-1">
                            When you change your account’s URL, we’ll redirect from the old one for 30 days.
                        </div>
                        <div class="flex flex-row mt-3">
                            <button class="text-sm bg-white rounded-full p-3 mr-4">Documentation</button>
                            <button class="text-sm bg-white rounded-full p-3 px-6">Save</button>
                        </div>

                        <div class="font-semibold mt-10">
                            Account
                        </div>
                        <div class="font-semibold text-sm mt-5">
                            First Day of Week
                        </div>
                        <div class="text-sm mt-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.
                        </div>
                        <div class="mt-5">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400 text-sm mr-4">
                                <input
                                    type="radio"
                                    class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
                                    name="FirstDay"
                                    value="busines"
                                    checked
                                />
                                <span class="ml-2">Sunday</span>
                            </label>
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
                                <input
                                    type="radio"
                                    class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
                                    name="FirstDay"
                                    value="busines"
                                />
                                <span class="ml-2">Monday</span>
                            </label>
                        </div>
                        <div class="font-semibold text-sm mt-5">
                            Timeline Weekends
                        </div>
                        <div class="text-sm mt-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.
                        </div>
                        <div class="mt-5">
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400 text-sm mr-4">
                                <input
                                    type="radio"
                                    class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
                                    name="Timeline"
                                    value="busines"
                                    checked
                                />
                                <span class="ml-2">Show Weekends</span>
                            </label>
                            <label class="inline-flex items-center text-gray-600 dark:text-gray-400 text-sm">
                                <input
                                    type="radio"
                                    class="form-radio text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
                                    name="Timeline"
                                    value="busines"
                                />
                                <span class="ml-2">Hide Weekends</span>
                            </label>
                        </div>
                        <div class="flex flex-row mt-3">
                            <button class="text-sm bg-white rounded-full p-3 px-6">Save</button>
                        </div>


                        <div class="font-semibold mt-10">
                            Export AccountData
                        </div>
                        <div class="font-semibold text-sm mt-5">
                            Export your whole account in a zip file (zip)
                        </div>
                        <div class="text-sm mt-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.
                        </div>
                        <div class="mt-5">
                            <input
                                type="checkbox"
                                class="form-checkbox text-[#E13A92] focus:border-[#E13A92] focus:outline-none focus:ring-[3px] focus:ring-purple-200 dark:focus:ring-gray-500"
                                name="Timeline"
                                value="busines"
                            />
                            <span class="ml-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</span>
                        </div>
                        <div class="flex flex-row mt-3">
                            <button class="text-sm bg-white rounded-full p-3 px-6">Export</button>
                            <Link :href="route('dashboard')" class="flex items-center ml-6 underline text-sm">
                                Learn More
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="activeTab === 'tab3'" class="w-2/3">

                <div class="font-semibold">
                    Manage Notifications Settings
                </div>
                <div class="text-sm mt-5">
                    Responsible for overseeing and optimizing the notification settings, ensuring seamless communication and user experience by tailoring alerts to individual preferences and system requirements.
                </div>
                <div class="mt-5 bg-white flex flex-row p-5">
                    <img src="/img/profile/desktop.svg">
                    <div class="flex flex-col ml-10">
                        <p class="font-semibold">Desktop Notifications</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod.</p>
                    </div>
                    <button class="text-sm bg-gray-100 rounded-full p-3 px-6 ml-10">Enable</button>
                </div>
                <div class="mt-5 bg-white flex flex-row p-5">
                    <img src="/img/profile/notification.svg">
                    <div class="flex flex-col ml-10">
                        <p class="font-semibold">Email Notifications</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod.</p>
                    </div>
                    <!-- <button class="text-sm bg-gray-100 rounded-full p-3 px-6 ml-10">Enable</button> -->
                </div>
                <div class="mt-5 bg-white flex flex-row p-5">
                    <img src="/img/profile/slack.svg">
                    <div class="flex flex-col ml-10">
                        <p class="font-semibold">Slack Notifications</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod.</p>
                    </div>
                    <!-- <button class="text-sm bg-gray-100 rounded-full p-3 px-6 ml-10">Enable</button> -->
                </div>
                <div class="mt-5 bg-white flex flex-row p-5">
                    <img src="/img/profile/inMonday.svg">
                    <div class="flex flex-col ml-10">
                        <p class="font-semibold">In Monday</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod.</p>
                    </div>
                    <!-- <button class="text-sm bg-gray-100 rounded-full p-3 px-6 ml-10">Enable</button> -->
                </div>
            </div>
        </div>
        
    </AppLayout>
</template>
<style scoped>
.tabs {
      display: flex;
      justify-content: flex-start;
      margin-top: 20px;
    }

    .tab-button {
      padding: 8px 16px;
      background-color: transparent;
      border: none;
      border-bottom: 2px solid #f2f2f2;
      margin-right: 10px;
      cursor: pointer;
      font-size: 16px;
      color: #555;
    }

    .tab-button.active-tab {
      background-color: #f1f1f1;
      border-bottom: 2px solid #007bff;
      color: #007bff;
    }

    .tab-button:focus {
      outline: none;
    }
</style>