<x-guest-layout>
    <x-slot name='slot'>
        <div>
            <p class="text-center">Welcome to home!</p>
        </div>
        <form action="{{route('go.to.service')}}" method="POST">
            @csrf
            <div class="mt-3">
                <label for="choice-service">What are you want use services ?</label>
                <select class="block px-3 py-2 rounded-lg w-full text-center cursor-pointer" name="service" id="choice-service">
                    <option value="">-- Choice service --</option>
                    <option value="buy">Buy products with role is Customer</option>
                    <option value="sell">Sell products with role is Seller</option>
                    <option value="payment_service">Payment service for Us</option>
                </select>
                @error('service')
                    <div class="bg-red-500 rounded-lg px-2 py-1 mt-2 text-white">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="float-right mt-3 px-3 py-2 rounded-lg border border-blue-700 hover:bg-blue-700 hover:text-white">Go!</button>
        </form>
    </x-slot>
</x-guest-layout>
