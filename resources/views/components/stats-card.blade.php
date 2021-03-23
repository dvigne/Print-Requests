<div class="max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
  <div class="flex-shrink-0 text-center {{ $color }} p-5 h-full w-28 rounded-xl rounded-r-none">
    {{ $slot }}
  </div>
  <div class="pr-32">
    <div class="text-xl font-medium text-block">{{ $title }}</div>
    <p class="text-gray-500">{{ $subtitle }}</p>
  </div>
</div>
