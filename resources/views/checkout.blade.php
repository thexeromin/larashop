<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <form action="" id="payment-form">
                        <div id="payment-element"></div>

                        <div class="mb-5"></div>
                        <x-button type="submit">Pay</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}")
        const elements = stripe.elements({
            clientSecret: "{{ $token }}"
        })
        const paymentElement = elements.create('payment')
        paymentElement.mount('#payment-element')

        const form = document.getElementById('payment-form')
        form.addEventListener('submit', async function(e) {
            e.preventDefault()
            
            // TODO: update success url
            const {error} = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    return_url: "{{ url('/') }}/complete }}"
                }
            })

            if(error) alert(error.message)
        })
    </script>
</x-app-layout>