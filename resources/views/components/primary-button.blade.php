<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex bg-[#2f54cd] items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-blue-700  focus:bg-blue-700  active:bg-blue-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
