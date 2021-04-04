<x-app-layout>
  @if(Auth::check() && !Auth::user()->hasVerifiedEmail())
    <div class="flex w-6/12 rounded-xl text-white mx-auto m-4 h-16 bg-blue-500">
      <div class="flex-grow border text-center">
        <h2 class="mt-4 font-bold text-lg">Please <a class="underline" href="{{ route('verification.notice') }}">verify your email</a> in order to submit print requests</h2>
      </div>
    </div>
  @endif
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
