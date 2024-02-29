<div>
    @include('header_front')
    <div class="py-12 flex items-center justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-6">
        <!-- Pricing Card 1 -->
          <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105">
            <div class="p-1 bg-green-200">
            </div>
            <div class="p-8">
              <h2 class="text-3xl font-bold text-gray-800 mb-4">BeerLover</h2>
              <p class="text-gray-600 mb-6">Lorem</p>
              <p class="text-4xl font-bold text-gray-800 mb-6">$5.900.- </p>
              <ul class="text-sm text-gray-600 mb-6">
                <li class="mb-2 flex items-center">
                  <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7"></path>
                  </svg>
                  1 Socio
                </li>
                <li class="mb-2 flex items-center">
                  <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7"></path>
                  </svg>
                  Ticket Ilimitados
                </li>
                <li class="flex items-center">
                  <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7"></path>
                  </svg>
                 Disponibles
                </li>
              </ul>
            </div>
            <div class="p-4">
              <button wire:click="suscripcion" type="button"
                class="w-full bg-green-500 text-white rounded-full px-4 py-2 hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
                Seleccionar Plan
              </button>
            </div>
          </div>
      </div>
    </div>
</div>

