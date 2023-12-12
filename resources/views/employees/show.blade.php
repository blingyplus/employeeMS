<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Display employee details -->
                <div class="grid grid-cols-2 gap-4 text-gray-700 dark:text-gray-300">
                    <p class="mb-2"><strong>UUID:</strong></p>
                    <p class="mb-2">{{ $employee->uuid }}</p>

                    <p class="mb-2"><strong>First Name:</strong></p>
                    <p class="mb-2">{{ $employee->firstname }}</p>

                    <p class="mb-2"><strong>Last Name:</strong></p>
                    <p class="mb-2">{{ $employee->lastname }}</p>

                    <p class="mb-2"><strong>Phone Number:</strong></p>
                    <p class="mb-2">{{ $employee->phone }}</p>

                    <p class="mb-2"><strong>Email:</strong></p>
                    <p class="mb-2">{{ $employee->email }}</p>

                    <!-- Add other details as needed -->
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
