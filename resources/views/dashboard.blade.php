<x-app-layout>
  <div class="grid grid-cols-3 pt-5">
    @if($printerStatus['state']['flags']['ready'])
      <x-stats-card title="Printer Status" subtitle="Ready" color="bg-green-500">
        <i class="ml-auto text-white text-4xl fas fa-check"></i>
      </x-stats-card>
    @elseif($printerStatus['state']['flags']['printing'])
      <x-stats-card title="Printer Status" subtitle="Printing" color="bg-blue-500">
        <div class="half-circle-spinner">
          <div class="circle circle-1"></div>
          <div class="circle circle-2"></div>
        </div>
      </x-stats-card>
    @elseif($printerStatus['state']['flags']['canceling'])
      <x-stats-card title="Printer Status" subtitle="Cancelling" color="bg-red-500">
        <i class="ml-auto text-white text-4xl fas fa-cross"></i>
      </x-stats-card>
    @else
    <x-stats-card title="Printer Status" subtitle="Error" color="bg-blue-500">
      <i class="ml-auto text-white text-4xl fas fa-exclamation"></i>
    </x-stats-card>
    @endif
    <x-stats-card title="Tool Temp" subtitle="{{ $printerStatus['temperature']['tool0']['actual']}} °C" color="bg-blue-500">
      <i class="mx-auto text-white text-4xl fas fa-temperature-high"></i>
    </x-stats-card>
    <x-stats-card title="Bed Temp" subtitle="{{ $printerStatus['temperature']['bed']['actual']}} °C" color="bg-blue-500">
      <i class="mx-auto text-white text-4xl fas fa-temperature-high"></i>
    </x-stats-card>
  </div>
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
  </div>
</x-app-layout>
