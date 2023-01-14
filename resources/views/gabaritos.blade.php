
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gabaritos
        </h2>
    </x-slot>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full my-16 text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nome do Gabarito
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantitade de Questões
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantitade de Provas
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gabaritos as $gabarito)
                
            
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $gabarito->nome }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $gabarito->qtd }} questões
                    </td>
                    <td class="px-6 py-4">
                        @if (count($gabarito->provas) == 0)
                            Nenhuma prova
                        @elseif (count($gabarito->provas) == 1)
                            {{ count($gabarito->provas) }} prova

                        @else
                            {{ count($gabarito->provas) }} provas
                        @endif
                    </td>

                    <td class="px-6 py-4 text-right">
                        <a href="provas/{{ $gabarito->id }}" class="font-medium text-emerald-600 dark:text-emerald-500 hover:underline">Open</a>
                    </td>
                </tr>

            @endforeach


        </tbody>
    </table>
</div>

</x-app-layout>

  