<x-jet-form-section submit="CreateRequest">
  <x-slot name="title">Raise a Request</x-slot>
  <x-slot name="description">To request a 3D print, please fill out the form</x-slot>
  <x-slot name="form">
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="name" value="{{ __('File Name') }}" />
        <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="name"/>
        <x-jet-input-error for="name" class="mt-2" />
    </div>
    <div class="col-span-6 sm:col-span-4">
        <x-jet-label for="file" value="{{ __('STL File') }}" />
        <x-jet-input id="file" type="file" class="mt-1 block w-full" wire:model="file"/>
        <x-jet-input-error for="file" class="mt-2" />
    </div>
  </x-slot>
  <x-slot name="actions"><x-jet-button>Submit</x-jet-button></x-slot>
</x-jet-form-section>
