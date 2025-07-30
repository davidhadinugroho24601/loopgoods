<footer class="bg-[#4EB57C] text-white py-8">
    <div class="container mx-auto grid md:grid-cols-3 gap-6 text-center md:text-left">
      
      <!-- Brand -->
      <div class="space-y-3">
        <div class="flex items-center space-x-4 justify-center md:justify-start">
          <img src="{{ asset('images/LoopGoods Logo Outline Putih.png') }}" alt="LoopGoods Logo"
               class="w-10 h-10 object-cover rounded-full">
          <span class="text-2xl font-bold">LoopGoods</span>
        </div>
        <p class="text-sm leading-relaxed mt-4">
            A web-based platform for sharing goods among students. <br>
            Save money, be eco-friendly, and make a difference!
        </p>
        <p class="text-sm mt-2">IPB Vocational School</p>
        <p class="text-sm leading-relaxed">
          Jl. Kumbang No.14, Babakan, <br>
          Bogor, West Java 16128
        </p>
      </div>
  
      <!-- Navigasi -->
      <div>
        <h5 class="text-lg font-bold mb-3">Navigasi</h5>
        <ul class="space-y-2">
          <li><a href="/" class="hover:underline">Home</a></li>
          <li><a href="{{ route('categories') }}" class="hover:underline">Category</a></li>
          <li><a href="/about" class="hover:underline">About Us</a></li>
          <li><a href="/contact" class="hover:underline">Contact</a></li>
        </ul>
      </div>
  
      <!-- Sosial Media -->
      <div>
        <h5 class="text-lg font-bold mb-3">Follow Us</h5>
        <div class="flex justify-center md:justify-start space-x-4">
          <!-- Instagram -->
          <a href="https://instagram.com/loopgoods" target="_blank" aria-label="Instagram">
            <svg class="w-6 h-6 hover:opacity-75 transition" fill="white" viewBox="0 0 24 24">
              <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 1.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7zm5.25-.75a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5z"/>
            </svg>
          </a>
          <!-- Email -->
          <a href="mailto:loopgoods@email.com" aria-label="Email">
            <svg class="w-6 h-6 hover:opacity-75 transition" fill="white" viewBox="0 0 24 24">
              <path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2v.511l-8 5.333-8-5.333V6h16zM4 18v-9.023l7.392 4.929a1 1 0 0 0 1.216 0L20 8.977V18H4z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  
    <div class="text-center text-sm mt-6">
      © 2025 LoopGoods. All rights reserved.
    </div>
  </footer>
  