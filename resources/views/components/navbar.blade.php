{{-- <nav class="w-full px-12 py-4 flex justify-between items-center bg-gray-100 shadow-md"
x-data="{accOpt:false}">
    <div class="flex flex-col w-full h-full">
        <a href="/" class="text-xl font-semibold text-center">SIKMA</a>
        <span class="text-xs">Sistem Informasi Media Privasi</span>
        <span class="text-xs text-center">Sistem Informasi Keuangan MAhasiswa</span>
    </div>
    <div class="flex items-center w-full justify-end h-full">
        <div>
            <button type="button" @click="accOpt=!accOpt" @click.oustide="accOpt=false" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2 focus:ring-offset-white-100" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>

                <img class="h-8 w-8 rounded-full" src="{{ asset('img/snopi.jpeg') }}" alt="">
            </button>
        </div>
        <div x-show="accOpt" class="fixed flex flex-col justify-center p-2 h-fit mt-32 font-sans text-center bg-gray-200 rounded-lg shadow-md text-zinc-500 text-md gap-y-2">
            <a href="/account" class="w-24 py-1 text-white bg-indigo-500 rounded-lg">Account</a>
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button type="submit" class="w-24 py-1 text-white rounded-lg bg-rose-500">Logout</a>
            </form>
        </div>
    </div>
</nav> --}}
<navbar
    class="fixed bottom-0 h-20 w-full flex gap-x-12 justify-center items-center bg-white shadow-md rounded-tr-3xl rounded-tl-3xl z-10">
    <a href="/">
        <svg class="w-8 h-8  {{request()->is('/') ? 'text-indigo-500':'text-zinc-500'}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
        </svg>
    </a>
    <a href="/history">
        <svg class="w-8 h-8  {{request()->is('history') ? 'text-indigo-500':'text-zinc-500'}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
        </svg>
    </a>
    <a href="/categories">
        <svg class="w-8 h-8  {{request()->is('categories') ? 'text-indigo-500':'text-zinc-500'}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
        </svg>
    </a>
    <a href="/profile">
        <svg class="w-8 h-8  {{request()->is('profile') ? 'text-indigo-500':'text-zinc-500'}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2"
                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
    </a>
</navbar>
