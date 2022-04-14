<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payments') }}
        </h2>
    </x-slot>
    <div class="my-0 md:mx-0 xl:mx-8">
        <div class="flex flex-col items-center justify-center max-w-7xl mx-auto">
            <div class="py-0 align-middle inline-block min-w-full lg:py-2 sm:px-0 lg:px-8">
                <div class="shadow bg-white overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex flex-col lg:flex-row p-8 mt-8">
                        <div class="w-full lg:w-1/2 order-2">
                            <div class="flex items-center">
                                <a class="button flex text-sm text-blue-500 focus:outline-none" disabled><span class="flex items-center justify-center text-white bg-blue-500 rounded-full h-5 w-5 mr-2">1</span>Shipping</a>
                                <a href="{{ route('payments') }}"class="button flex text-sm text-gray-700 ml-8 focus:outline-none"><span class="flex items-center justify-center border-2 border-blue-500 rounded-full h-5 w-5 mr-2">2</span>Payments</a>
                                <a class="button flex text-sm text-gray-500 ml-8 focus:outline-none" disabled><span class="flex items-center justify-center border-2 border-gray-500 rounded-full h-5 w-5 mr-2">3</span>Confirm</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 flex -mx-2">
                        <div class="px-2">
                            <label for="type1" class="flex items-center">
                                <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                            </label>
                        </div>
                    </div>
                    <form action="{{ route('confirmOrder') }}" method="POST">
                        @csrf
                        <div class="mb-3 mx-2 flex items-end">
                            <div class="px-2 w-1/2">
                                <label class="font-semibold text-gray-500 text-sm mb-2 ml-1">Name on card</label>
                                <div>
                                    <x-input type="hidden" name="address" value="{{ request()->address }}"/>
                                    <x-input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md" name="name" id="name" placeholder="John Smith" type="text" required/>
                                </div>
                            </div>
                            <div class="px-2 w-1/2">
                                <label class="font-semibold text-gray-500 text-sm mb-2 ml-1">Card number</label>
                                <div>
                                    <x-input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md" name="card_number" id="card_number" placeholder="0000 0000 0000 0000" type="text" required/>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mx-2 flex items-end">
                            <div class="px-2 w-1/2">
                                <label class="font-semibold text-gray-500 text-sm mb-2 ml-1">Expiration date</label>
                                <div>
                                    <x-select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md cursor-pointer" name="expiration_month" id="expiration_month">
                                        <option value="01">01 - January</option>
                                        <option value="02">02 - February</option>
                                        <option value="03">03 - March</option>
                                        <option value="04">04 - April</option>
                                        <option value="05">05 - May</option>
                                        <option value="06">06 - June</option>
                                        <option value="07">07 - July</option>
                                        <option value="08">08 - August</option>
                                        <option value="09">09 - September</option>
                                        <option value="10">10 - October</option>
                                        <option value="11">11 - November</option>
                                        <option value="12">12 - December</option>
                                    </x-select>
                                </div>
                            </div>
                            <div class="px-2 w-1/2">
                                <x-select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md cursor-pointer" name="expiration_year" id="expiration_year">
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                </x-select>
                            </div>
                        </div>
                        <div class="mb-10 mx-2 px-2">
                            <label class="font-semibold text-gray-500 text-sm mb-2 ml-1">Security code</label>
                            <div>
                                <x-input class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md" name="security_code" id="security_code" placeholder="000" type="text" required/>
                            </div>
                        </div>
                        <div class="py-3">
                            <button class="block w-full max-w-xs mx-auto bg-amber-400 text-gray-700 text-sm font-medium rounded-md focus:outline-none px-3 py-3">Pay now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>