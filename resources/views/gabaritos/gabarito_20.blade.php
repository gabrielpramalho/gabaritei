<style>
    .-z-1 {
      z-index: -1;
    }
  
    .origin-0 {
      transform-origin: 0%;
    }
  
    input:focus ~ label,
    input:not(:placeholder-shown) ~ label,
    textarea:focus ~ label,
    textarea:not(:placeholder-shown) ~ label,
    select:focus ~ label,
    select:not([value='']):valid ~ label {
      /* @apply transform; scale-75; -translate-y-6; */
      --tw-translate-x: 0;
      --tw-translate-y: 0;
      --tw-rotate: 0;
      --tw-skew-x: 0;
      --tw-skew-y: 0;
      transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
        skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
      --tw-scale-x: 0.75;
      --tw-scale-y: 0.75;
      --tw-translate-y: -1.5rem;
    }
  
    input:focus ~ label,
    select:focus ~ label {
      /* @apply text-black; left-0; */
      --tw-text-opacity: 1;
      color: rgba(0, 0, 0, var(--tw-text-opacity));
      left: 0px;
    }
  </style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gabarito
        </h2>
    </x-slot>
    
<div class=" bg-gray-100 p-0 sm:p-6">
  <div class="mx-auto max-w-2xl px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
    <h1 class="text-2xl font-bold mb-8 text-center">Gabarito</h1>
    <form id="form" method="POST" action="/gabarito/questoes-respondidas/20"  >
      @csrf

      <div class="relative z-0 w-full mb-5">
        <input
          type="text"
          name="nome"
          placeholder=" "
          required
          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
        <label for="nome" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nome do cartões-respostas</label>
        <span class="text-sm text-red-600 hidden" id="error">O nome é obrigatório</span>
      </div>

      @for ($i = 1; $i <= 20; $i++)
          

      <div class="mb-4">
            <h2>{{"Questão ".$i}}</h2>
            <div class="flex mt-4 items-center justify-around border border-gray-400 p-3 rounded-full">
                <div>
                    <input type="radio" name="{{"q_".$i}}" id="{{"qa-".$i}}" value="A" class="text-emerald-500 dark:text-emerald-600 focus:ring-emerald-500 dark:focus:ring-emerald-600 cursor-pointer" required> 
                    <label for="{{"qa-".$i}}" class="cursor-pointer">A</label>  
                </div>
                <div>
                    <input type="radio" name="{{"q_".$i}}" id="{{"qb-".$i}}" class="text-emerald-500 dark:text-emerald-600 focus:ring-emerald-500 dark:focus:ring-emerald-600 cursor-pointer" value="B" > 
                    <label for="{{"qb-".$i}}" class="cursor-pointer">B</label>  
                </div>
                <div>
                    <input type="radio" name="{{"q_".$i}}" id="{{"qc-".$i}}" class="text-emerald-500 dark:text-emerald-600 focus:ring-emerald-500 dark:focus:ring-emerald-600 cursor-pointer" value="C"> 
                    <label for="{{"qc-".$i}}" class="cursor-pointer">C</label>  
                </div>
                <div>
                    <input type="radio" name="{{"q_".$i}}" id="{{"qd-".$i}}" class="text-emerald-500 dark:text-emerald-600 focus:ring-emerald-500 dark:focus:ring-emerald-600 cursor-pointer" value="D"> 
                    <label for="{{"qd-".$i}}" class="cursor-pointer">D</label>  
                </div>
                <div>
                    <input type="radio" name="{{"q_".$i}}" id="{{"qe-".$i}}" class="text-emerald-500 dark:text-emerald-600 focus:ring-emerald-500 dark:focus:ring-emerald-600 cursor-pointer" value="E"> 
                    <label for="{{"qe-".$i}}" class="cursor-pointer">E</label>  
                </div>
            </div>
        </div>

        @endfor

      <button
        id="button"
        type="submit"
        class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-emerald-500 hover:bg-emerald-600 hover:shadow-lg focus:outline-none"
      >
        Criar Gabarito
      </button>
    </form>
  </div>
</div>
</x-app-layout>

  
  <script>
  
    // document.getElementById('button').addEventListener('click', toggleError)
    const errMessages = document.querySelectorAll('#error')
  
    function toggleError() {
      // Show error message
      errMessages.forEach((el) => {
        el.classList.toggle('hidden')
      })
  
      // Highlight input and label with red
      const allBorders = document.querySelectorAll('.border-gray-200')
      const allTexts = document.querySelectorAll('.text-gray-500')
      allBorders.forEach((el) => {
        el.classList.toggle('border-red-600')
      })
      allTexts.forEach((el) => {
        el.classList.toggle('text-red-600')
      })
    }
  </script>