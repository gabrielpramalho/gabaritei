
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
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Código do aluno
                </th>

                <th scope="col" class="px-6 py-3">
                    Nota
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Abrir</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $index =1; ?>
            @foreach ($provas as $prova)
                
            
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $index }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $prova->codebar }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $prova->nota }}
                    </td>

                    <td class="px-6 py-4 text-right">
                        <a href="prova/{{ $prova->id }}" class="font-medium text-emerald-600 dark:text-emerald-500 hover:underline">Open</a>
                    </td>
                </tr>
                <?php $index++; ?>
            @endforeach


        </tbody>
    </table>
</div>

</x-app-layout>

  