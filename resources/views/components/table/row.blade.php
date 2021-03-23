<tr class="border-b">
  <td class="p-2 w-36">{{ $filename }}</td>
  <td class="p-2 w-36">
    <div class="flex w-36 mx-auto">
      <img class="h-8 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
      <p class="mt-auto pl-2 font-medium text-gray-600">{{ $user->first . " " . $user->last }}</p>
    </div>
  </td>
  <td class="p-2 w-36">Date</td>
  <td class="p-2 w-36">
    {{ $slot }}
  </td>
  <td class="p-2 w-36">
    <button class="border p-2 rounded transition duration-200 hover:bg-blue-500 hover:text-white">More Info</button>
  </td>
</tr>
