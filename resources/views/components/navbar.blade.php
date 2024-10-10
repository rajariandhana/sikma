<nav class="h-24 w-full px-12 py-6 flex justify-between items-center bg-gray-100 shadow-md"
x-data="{accOpt:false}">
    <div class="flex flex-col w-full h-full">
        <a href="/" class="text-xl font-semibold">SIKMA</a>
        {{-- <span class="text-xs">Sistem Informasi Media Privasi</span> --}}
        <span class="text-xs">Sistem Informasi Keuangan MAhasiswa</span>
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
</nav>
