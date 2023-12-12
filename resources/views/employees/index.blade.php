<!-- resources/views/employees/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-end p-4">
                    <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Employee</a>
                </div>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                UUID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                First Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Last Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Phone Number
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class=" divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($employees as $employee)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                {{ $employee->uuid }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                {{ $employee->firstname }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                {{ $employee->lastname }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                {{ $employee->phone }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                {{ $employee->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white">
                                <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-500 hover:underline">View</a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="ml-2 text-yellow-500 hover:underline">Edit</a>
                                <!-- Delete action with confirmation dialog -->
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap">No employees found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
