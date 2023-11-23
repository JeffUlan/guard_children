<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

 const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div class="flex flex-row">
        <Head :title="title" />
        <!-- site bar -->
        <div class="bg-gray-100">
            <aside class="z-20 hidden flex-shrink-0 overflow-y-auto md:block">
                <div class="py-4 text-gray-500 dark:text-gray-400">
                    <div class="shrink-0 flex items-center justify-center">
                        <Link :href="route('dashboard')">
                            <ApplicationMark class="block h-9 w-auto" />
                        </Link>
                    </div>
                    <!-- Desktop sidebar menu -->
                    
                    <div class="mt-48 relative">
                        <img src="/img/sidebar/background.svg">
                        <ul class="absolute top-[128px]">
                            <li class="relative px-6 py-3">
                                <img src="/img/sidebar/home.svg" class="w-[24px] h-[24px]">
                            </li>
                            <li class="relative px-6 py-3">
                                <img src="/img/sidebar/newsfeed.svg" class="w-[24px] h-[24px]">
                            </li>
                            <li class="relative px-6 py-3">
                                <img src="/img/sidebar/chart.svg" class="w-[24px] h-[24px]">
                            </li>
                            <li class="relative px-6 py-3">
                                <img src="/img/sidebar/clients.svg" class="w-[24px] h-[24px]">
                                <span
                                    class="absolute inset-y-0 right-0 w-1 rounded-tr-lg rounded-br-lg bg-[#E13A92]"
                                    aria-hidden="true"
                                />
                            </li>
                            <li class="relative px-6 py-3">
                                <img src="/img/sidebar/deliveries.svg" class="w-[24px] h-[24px]">
                            </li>
                            <li class="relative px-6 py-3">
                                <img src="/img/sidebar/statistics.svg" class="w-[24px] h-[24px]">
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
        <!-- side bar end -->
        <img src="/img/sidebar/white-vbar.svg" class="left-[60px]">
        <!-- page content -->
        <div class="bg-gray-100 w-full mx-auto sm:px-6 lg:px-8">
            <nav class="bg-gray-100">
                <!-- Primary Navigation Menu -->
                <div class=" mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center font-semibold">
                                Employees
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <div class="flex flex-1 justify-center">
                                <div class="relative mr-6 w-full focus-within:text-purple-500">
                                    <input
                                        class="form-input w-full rounded-full border-0 bg-white pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 focus:border-[#E13A92]"
                                        type="text"
                                        placeholder="Search..."
                                        aria-label="Search..."
                                    />
                                    <div class="absolute inset-y-0 flex items-center pl-2">
                                        <svg class="h-4 w-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-3 relative">
                                <Link :href="route('login')" class="underline inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">+ Add New</Link>
                            </div>
                            <div class="ms-3 relative">
                                <img src="/img/topbar/setting.svg">
                            </div>
                            <div class="ms-3 relative">
                                <img src="/img/topbar/history.svg">
                            </div>
                            <div class="ms-3 relative">
                                <img src="/img/topbar/bell.svg">
                            </div>
                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <DropdownLink :href="route('profile.show')">
                                            Profile
                                        </DropdownLink>

                                        <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                            API Tokens
                                        </DropdownLink>

                                        <div class="border-t border-gray-200" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <DropdownLink as="button">
                                                Log Out
                                            </DropdownLink>
                                        </form>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="ms-3 relative">
                            <ResponsiveNavLink :href="route('login')">
                                <div class="flex flex-row">
                                    <div><img src="/img/topbar/setting.svg"></div>
                                    <div>Setting</div>
                                </div>
                            </ResponsiveNavLink>
                        </div>
                        <div class="ms-3 relative">
                            <ResponsiveNavLink :href="route('login')">
                                <div class="flex flex-row">
                                    <div><img src="/img/topbar/history.svg"></div>
                                    <div>History</div>
                                </div>
                            </ResponsiveNavLink>
                        </div>
                        <div class="ms-3 relative">
                            <ResponsiveNavLink :href="route('login')">
                                <div class="flex flex-row">
                                    <div><img src="/img/topbar/bell.svg"></div>
                                    <div>Notification</div>
                                </div>
                            </ResponsiveNavLink>
                        </div>
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 me-3">
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">
                                    {{ $page.props.auth.user.name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500">
                                    {{ $page.props.auth.user.email }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </ResponsiveNavLink>

                            <ResponsiveNavLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')" :active="route().current('api-tokens.index')">
                                API Tokens
                            </ResponsiveNavLink>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <ResponsiveNavLink as="button">
                                    Log Out
                                </ResponsiveNavLink>
                            </form>
                            <div class="ms-3 relative">
                                <Link :href="route('login')" class="underline inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">+ Add New</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <img src="/img/topbar/white_bar.svg" class="w-full">

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white mt-8 mx-auto sm:px-6">
                <div class=" mx-auto py-6 px-4 sm:px-6 ">
                    <slot name="header" />
                </div>
            </header>

            <!-- Table Heading -->
            <header v-if="$slots.tableheader" class="bg-[#E13A92] mt-8  mx-auto">
                    <slot name="tableheader" />
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
        <!-- page content end -->
    </div>
</template>
