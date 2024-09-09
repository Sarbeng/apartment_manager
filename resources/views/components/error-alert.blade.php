<div class="mb-3">
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    @if (session()->has('error'))
    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative" role="alert">
        {{ session('error') }}
    </div>
    @elseif (session()->has('success'))
    <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative" role="alert">
        {{ session('success') }}
    </div>
@endif
</div>