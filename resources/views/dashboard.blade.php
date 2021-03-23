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
    <x-table.table>
      <x-table.row :user="Auth::user()" filename="Test" date="Date" request="Request">
        <x-status.printing />
      </x-table.row>
    </x-table.table>
  </div>
</x-app-layout>
