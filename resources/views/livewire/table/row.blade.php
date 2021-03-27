<tr class="border-b">
  <td class="p-2 w-36">{{ $request->filename }}</td>
  <td class="p-2 w-36">
    <div class="flex w-36 mx-auto">
      <img class="h-8 rounded-full object-cover" src="{{ $request->user->profile_photo_url }}" alt="{{ $request->user->name }}" />
      <p class="mt-auto pl-2 font-medium text-gray-600">{{ $request->user->first . " " . $request->user->last }}</p>
    </div>
  </td>
  <td class="p-2 w-36">{{ Str::limit($request->created_at, 10, false) }}</td>
  <td class="p-2 w-36">
    @if($request->status == 'printing')
      <x-status.printing />
    @elseif($request->status == 'approved')
      <x-status.approved />
    @elseif($request->status == 'canceled')
      <x-status.canceled />
    @elseif($request->status == 'rejected')
      <x-status.rejected />
    @elseif($request->status == 'submitted')
      <x-status.submitted />
    @endif
  </td>
  <td class="p-2 w-36">
    @auth
      @if(Auth::user()->isAdmin())
        <x-jet-button wire:click="approve"  wire:loading.attr="disabled" class="mx-auto mb-4 bg-green-500 hover:bg-green-700"><i class="fas fa-check"></i></x-jet-button>
        <x-jet-button wire:click="reject"   wire:loading.attr="disabled" class="mx-auto mb-4 bg-red-500 hover:bg-red-700"><i class="fas fa-times"></i></x-jet-button>
        <x-jet-button wire:click="download" wire:loading.attr="disabled" class="mx-auto mb-4 bg-purple-500 hover:bg-purple-700"><i class="fas fa-file-download"></i></x-jet-button>
        <x-jet-button class="mx-auto mb-4 bg-gray-500 hover:bg-gray-700"><i class="far fa-trash-alt"></i></x-jet-button>
        @if($request->status == "approved")
          <x-jet-button wire:click="dispatch" wire:loading.attr="disabled" class="mx-auto mb-4 bg-blue-500 hover:bg-blue-700"><i class="fas fa-file-import"></i></x-jet-button>
        @endif
      @elseif($request->user->id == Auth::user()->id && ($request->status != "canceled" && $request->status != "rejected"))
        <x-jet-button wire:click="cancel"   wire:loading.attr="disabled" class="mx-auto mb-4 bg-red-500 hover:bg-red-700"><i class="fas fa-times"></i></x-jet-button>
        <x-jet-button class="mx-auto mb-4 bg-gray-500 hover:bg-gray-700"><i class="fa fa-info"></i></x-jet-button>
      @endif
    @endauth
  </td>
</tr>
