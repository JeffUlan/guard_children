<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Welcome from '@/Components/Welcome.vue';
    import Dropdown from '@/Components/Dropdown.vue';
    import DropdownLink from '@/Components/DropdownLink.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        
        <template #header>
            <div class="flex flex-row justify-between">
                <div class="flex flex-row justify-stretch">
                    <div class="mr-6">
                        <span class="font-semibold text-gray-800">Employees</span>
                    </div>
                    <div class="mr-2">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md  hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        <span class="font-normal text-gray-500 mr-1">Browse</span>
                                        <span class="font-normal">All</span>
                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('login')">
                                    select 1
                                </DropdownLink>

                                <div class="border-t border-gray-200" />

                                <DropdownLink :href="route('login')">
                                    select 2
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                    <div class="mr-2">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md  hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        <span class="font-normal text-gray-500 mr-1">Sort by</span>
                                        <span class="font-normal">First Name</span>
                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('login')">
                                    First Name
                                </DropdownLink>

                                <div class="border-t border-gray-200" />
                                
                                <DropdownLink :href="route('login')">
                                    Last Name
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <div class="flex flex-1 justify-center">
                            <div class="relative mr-6 w-full focus-within:text-purple-500">
                                <input
                                    class="form-input w-full rounded-full border-0 bg-gray-100 pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 focus:border-[#E13A92]"
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
                    </div>
                </div>
                <div class="flex flex-row justify-stretch">
                    <div class="mr-2">
                        <span class="rounded-full">
                            <button type="button" class=" bg-gray-100 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full">
                                <span class="font-normal text-gray-500 mr-1">Hiring Pipeline</span>
                            </button>
                        </span>
                    </div>
                    <div class="mr-2">
                        <span class="rounded-full">
                            <button type="button" class="bg-gray-100 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full">
                                <span class="font-normal text-gray-500 mr-1">Assign Role</span>
                            </button>
                        </span>
                    </div>
                    <div class="mr-2">
                        <span class="rounded-full">
                            <button type="button" class="bg-gray-100 rounded-full inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium">
                                <span class="font-normal text-gray-500 mr-1">Download Report</span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </template>

        <template #tableheader>
            <div class="shadow-xs w-full overflow-hidden bg-[#E13A92] rounded-lg">
                <div class="w-full overflow-x-auto">
                    <table class="whitespace-no-wrap w-full">
                        <thead class="divide-y">
                            <tr class="text-gray-700 dark:text-gray-400 text-center">
                                <td class="px-4 py-3 text-white"> S.no</td>
                                <td class="px-4 py-3 text-white"> Employee </td>
                                <td class="px-4 py-3 text-white"> Username </td>
                                <td class="px-4 py-3 text-white"> Job Title</td>
                                <td class="px-4 py-3 text-white"> Role</td>
                                <td class="px-4 py-3 text-white"> Join Date </td>
                                <td class="px-4 py-3 text-white"> Action </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </template>
            <div class="bg-white mt-8 mx-auto">
                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <Welcome />
                </div>
            </div>
    </AppLayout>
</template>
