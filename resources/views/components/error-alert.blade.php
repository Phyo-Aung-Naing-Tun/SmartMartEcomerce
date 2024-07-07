<div id="alert-3" class="flex items-center p-4 mb-4 text-red-600 rounded-lg bg-red-200" role="alert">
    <div>
        <img class=" w-5 h-5" src="{{ asset('/images/error-icon.svg') }}" alt="error">
    </div>
    <div class="ms-3 text-sm font-medium">
        {{ $slot}}
    </div>
    <button type="button" class="ms-auto  -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
    </button>
  </div>