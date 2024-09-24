<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />

    <title>CRM Analytics Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('image/favicon.ico') }}" />

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
        <div class="app-preloader-inner relative inline-block size-48"></div>
    </div>

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
        <!-- Sidebar -->
        <div class="sidebar print:hidden">
            <!-- Main Sidebar -->
            <div class="main-sidebar">
                <div
                    class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
                    <!-- Application Logo -->
                    <div class="flex pt-4">
                        <a href="{{ url('dashboard') }}">
                            <img loading="lazy"
                                class="size-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                                src="{{ asset('image/Logotipo QIU Grande.png') }}" alt="logo" />
                        </a>
                    </div>

                    <!-- Main Sections Links -->
                    <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
                        <!-- Dashobards
                        <a href="{{ url('dashboard') }}"
                            class="flex size-11 items-center justify-center rounded-lg bg-primary/10 text-primary outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                            x-tooltip.placement.right="'Dashboards'">
                            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-opacity=".3"
                                    d="M5 14.059c0-1.01 0-1.514.222-1.945.221-.43.632-.724 1.453-1.31l4.163-2.974c.56-.4.842-.601 1.162-.601.32 0 .601.2 1.162.601l4.163 2.974c.821.586 1.232.88 1.453 1.31.222.43.222.935.222 1.945V19c0 .943 0 1.414-.293 1.707C18.414 21 17.943 21 17 21H7c-.943 0-1.414 0-1.707-.293C5 20.414 5 19.943 5 19v-4.94Z" />
                                <path fill="currentColor"
                                    d="M3 12.387c0 .267 0 .4.084.441.084.041.19-.04.4-.204l7.288-5.669c.59-.459.885-.688 1.228-.688.343 0 .638.23 1.228.688l7.288 5.669c.21.163.316.245.4.204.084-.04.084-.174.084-.441v-.409c0-.48 0-.72-.102-.928-.101-.208-.291-.355-.67-.65l-7-5.445c-.59-.459-.885-.688-1.228-.688-.343 0-.638.23-1.228.688l-7 5.445c-.379.295-.569.442-.67.65-.102.208-.102.448-.102.928v.409Z" />
                                <path fill="currentColor"
                                    d="M11.5 15.5h1A1.5 1.5 0 0 1 14 17v3.5h-4V17a1.5 1.5 0 0 1 1.5-1.5Z" />
                                <path fill="currentColor"
                                    d="M17.5 5h-1a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        </a>-->

                    </div>

                    <!-- Bottom Links -->
                    <div class="flex flex-col items-center space-y-3 py-3">
                        <!-- Settings
                        <a href="#"
                            class="flex size-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-opacity="0.3" fill="currentColor"
                                    d="M2 12.947v-1.771c0-1.047.85-1.913 1.899-1.913 1.81 0 2.549-1.288 1.64-2.868a1.919 1.919 0 0 1 .699-2.607l1.729-.996c.79-.474 1.81-.192 2.279.603l.11.192c.9 1.58 2.379 1.58 3.288 0l.11-.192c.47-.795 1.49-1.077 2.279-.603l1.73.996a1.92 1.92 0 0 1 .699 2.607c-.91 1.58-.17 2.868 1.639 2.868 1.04 0 1.899.856 1.899 1.912v1.772c0 1.047-.85 1.912-1.9 1.912-1.808 0-2.548 1.288-1.638 2.869.52.915.21 2.083-.7 2.606l-1.729.997c-.79.473-1.81.191-2.279-.604l-.11-.191c-.9-1.58-2.379-1.58-3.288 0l-.11.19c-.47.796-1.49 1.078-2.279.605l-1.73-.997a1.919 1.919 0 0 1-.699-2.606c.91-1.58.17-2.869-1.639-2.869A1.911 1.911 0 0 1 2 12.947Z" />
                                <path fill="currentColor"
                                    d="M11.995 15.332c1.794 0 3.248-1.464 3.248-3.27 0-1.807-1.454-3.272-3.248-3.272-1.794 0-3.248 1.465-3.248 3.271 0 1.807 1.454 3.271 3.248 3.271Z" />
                            </svg>
                        </a>-->

                        <!-- Profile -->
                        <div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="isShowPopper && (isShowPopper = false)"
                            class="flex">
                            <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar size-12">
                                <img class="rounded-full" src="{{ asset('image/usuario.png') }}" alt="avatar" />
                                <span
                                    class="absolute right-0 size-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
                            </button>

                            <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
                                <div
                                    class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
                                    <div
                                        class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                                        <div class="avatar size-14">
                                            <img class="rounded-full" src="{{ asset('image/usuario.png') }}"
                                                alt="avatar" />
                                        </div>
                                        <div>
                                            {{ Auth::user()->name }}
                                            <p class="text-xs text-slate-400 dark:text-navy-300">
                                                super admin
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col pt-2 pb-5">
                                        <!---
                                        <a href="#"
                                            class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                            <div
                                                class="flex size-8 items-center justify-center rounded-lg bg-warning text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>

                                            <div>
                                                <h2
                                                    class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                    Profile
                                                </h2>
                                                <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Your profile setting
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#"
                                            class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                            <div
                                                class="flex size-8 items-center justify-center rounded-lg bg-info text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                            </div>

                                            <div>
                                                <h2
                                                    class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                    Messages
                                                </h2>
                                                <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Your messages and tasks
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#"
                                            class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                            <div
                                                class="flex size-8 items-center justify-center rounded-lg bg-secondary text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            </div>

                                            <div>
                                                <h2
                                                    class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                    Team
                                                </h2>
                                                <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Your team activity
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#"
                                            class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                            <div
                                                class="flex size-8 items-center justify-center rounded-lg bg-error text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>

                                            <div>
                                                <h2
                                                    class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                    Activity
                                                </h2>
                                                <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Your activity and events
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#"
                                            class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                            <div
                                                class="flex size-8 items-center justify-center rounded-lg bg-success text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>

                                            <div>
                                                <h2
                                                    class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                    Settings
                                                </h2>
                                                <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Webapp settings
                                                </div>
                                            </div>
                                        </a>---->
                                        <div class="mt-3 px-4">
                                            <a href="{{ url('logout') }}"
                                                class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                <span>Salir</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- App Header Wrapper-->
        <nav class="header before:bg-white dark:before:bg-navy-750 print:hidden">
            <!-- App Header  -->
            <div class="header-container relative flex w-full bg-white dark:bg-navy-750 print:hidden">

            </div>
        </nav>

        <!-- Mobile Searchbar -->
        <div x-show="$store.breakpoints.isXs && $store.global.isSearchbarActive"
            x-transition:enter="easy-out transition-all" x-transition:enter-start="opacity-0 scale-105"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in transition-all"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-[100] flex flex-col bg-white dark:bg-navy-700 sm:hidden">
            <div class="flex items-center space-x-2 bg-slate-100 px-3 pt-2 dark:bg-navy-800">
                <button
                    class="btn -ml-1.5 h-7 w-7 shrink-0 rounded-full p-0 text-slate-600 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25"
                    @click="$store.global.isSearchbarActive = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" stroke-width="1.5"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <input x-effect="$store.global.isSearchbarActive && $nextTick(() => $el.focus() );"
                    class="form-input h-8 w-full bg-transparent placeholder-slate-400 dark:placeholder-navy-300"
                    type="text" placeholder="Search here..." />
            </div>

            <div x-data="{ activeTab: 'tabAll' }"
                class="is-scrollbar-hidden flex shrink-0 overflow-x-auto bg-slate-100 px-2 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                <button @click="activeTab = 'tabAll'"
                    :class="activeTab === 'tabAll' ?
                        'border-primary dark:border-accent text-primary dark:text-accent-light' :
                        'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    All
                </button>
                <button @click="activeTab = 'tabFiles'"
                    :class="activeTab === 'tabFiles' ?
                        'border-primary dark:border-accent text-primary dark:text-accent-light' :
                        'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Files
                </button>
                <button @click="activeTab = 'tabChats'"
                    :class="activeTab === 'tabChats' ?
                        'border-primary dark:border-accent text-primary dark:text-accent-light' :
                        'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Chats
                </button>
                <button @click="activeTab = 'tabEmails'"
                    :class="activeTab === 'tabEmails' ?
                        'border-primary dark:border-accent text-primary dark:text-accent-light' :
                        'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Emails
                </button>
                <button @click="activeTab = 'tabProjects'"
                    :class="activeTab === 'tabProjects' ?
                        'border-primary dark:border-accent text-primary dark:text-accent-light' :
                        'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Projects
                </button>
                <button @click="activeTab = 'tabTasks'"
                    :class="activeTab === 'tabTasks' ?
                        'border-primary dark:border-accent text-primary dark:text-accent-light' :
                        'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                    class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Tasks
                </button>
            </div>

            <div class="is-scrollbar-hidden overflow-y-auto overscroll-contain pb-2">
                <div class="is-scrollbar-hidden mt-3 flex space-x-4 overflow-x-auto px-3">
                    <a href="apps-kanban.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-success text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                </svg>
                            </div>
                        </div>
                        <p
                            class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Kanban
                        </p>
                    </a>
                    <a href="dashboards-crm-analytics.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-secondary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                        </div>
                        <p
                            class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Analytics
                        </p>
                    </a>
                    <a href="apps-chat.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-info text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                        </div>
                        <p
                            class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Chat
                        </p>
                    </a>
                    <a href="apps-filemanager.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-error text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                </svg>
                            </div>
                        </div>
                        <p
                            class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Files
                        </p>
                    </a>
                    <a href="dashboards-crypto-1.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-secondary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <p
                            class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Crypto
                        </p>
                    </a>
                    <a href="dashboards-banking-1.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                            </div>
                        </div>
                        <p
                            class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Banking
                        </p>
                    </a>
                    <a href="apps-todo.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-info text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <p
                            class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Todo
                        </p>
                    </a>

                    <a href="dashboards-orders.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-warning text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                        <p
                            class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Orders
                        </p>
                    </a>
                </div>

                <div class="mt-3 flex items-center justify-between bg-slate-100 py-1.5 px-3 dark:bg-navy-800">
                    <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                        Recent
                    </p>
                    <a href="#"
                        class="text-tiny+ font-medium uppercase text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                        View All
                    </a>
                </div>

                <div class="mt-1 font-inter font-medium">
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="apps-chat.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span>Chat App</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="apps-filemanager.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                        <span>File Manager App</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="apps-mail.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Email App</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="apps-kanban.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                        </svg>
                        <span>Kanban Board</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="apps-todo.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>Todo App</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="dashboards-crypto-2.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span>Crypto Dashboard</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="dashboards-banking-2.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>

                        <span>Banking Dashboard</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="dashboards-crm-analytics.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>

                        <span>Analytics Dashboard</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="dashboards-influencer.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>

                        <span>Influencer Dashboard</span>
                    </a>
                </div>
            </div>
        </div>
        @yield('contenido')
    </div>
    <div id="x-teleport-target"></div>
    @stack('scripts')
    <!-- Javascript Assets -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>

    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");

        window.addEventListener("DOMContentLoaded", () => Alpine.start());
        $(document).ready(function() {

            $('table').DataTable({
                order: false,
                scrollX: true,
                language: {
                    url: "json/datatables/es-ES.json",
                },
                columnDefs: [{
                    "targets": 6, // El índice de la columna de la fecha
                    "type": "date" // Indica que esta columna es de tipo fecha
                }],
            });
        });
    </script>
</body>

</html>
