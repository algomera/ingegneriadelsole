<nav class="mt-5 px-2 h-[calc(100vh-156px)] flex flex-col justify-between">
    <div class="space-y-1">
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-heroicon-o-squares-2x2
                    class="{{ request()->routeIs('dashboard') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-squares-2x2>
            Dashboard
        </a>
        <a href="{{ route('customers') }}"
           class="{{ request()->routeIs('customers') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <x-heroicon-o-identification
                    class="{{ request()->routeIs('customers') ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300' }} mr-3 flex-shrink-0 h-6 w-6"></x-heroicon-o-identification>
            Anagrafiche
        </a>
    </div>
</nav>
