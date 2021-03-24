<x-app-layout>
  <div class="grid grid-cols-1 pt-20">
    <div class="w-11/12 mx-auto">
      <x-jet-button class="float-right mb-4 bg-blue-500 hover:bg-blue-700">Submit a Request</x-jet-button>
    </div>
    <x-table.table>
      @foreach($requests as $request)
        <x-table.row :user="$request->user" filename="{{ $request->filename }}" date="{{ Str::limit($request->created_at, 10, false) }}" request="Request">
          @if($request->status == 'printing')
            <x-status.printing />
          @elseif($request->status == 'approved')
            <x-status.approved />
          @elseif($request->status == 'canceled')
            <x-status.canceled />
          @elseif($request->status == 'rejected')
            <x-status.canceled />
          @elseif($request->status == 'submitted')
            <x-status.approved />
          @endif
        </x-table.row>
      @endforeach
    </x-table.table>
    <div class="w-11/12 mx-auto pt-4 pb-4">
      {{ $requests->links() }}
    </div>
  </div>
</x-app-layout>
