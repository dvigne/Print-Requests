<x-app-layout>
  <div class="grid grid-cols-1 pt-20">
    <div class="w-11/12 mx-auto">
      <a href="{{ route('requests.create' )}}"><x-jet-button class="float-right mb-4 bg-blue-500 hover:bg-blue-700">Submit a Request</x-jet-button></a>
    </div>
    <x-table.table>
      @foreach($requests as $request)
        <livewire:table.row :request="$request"/>
      @endforeach
    </x-table.table>
    <div class="w-11/12 mx-auto pt-4 pb-4">
      {{ $requests->links() }}
    </div>
  </div>
</x-app-layout>
