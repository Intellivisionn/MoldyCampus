<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-black hover:text-gray-500">
            {{ __('Terms of Service') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="container mx-auto max-w-3xl p-6 bg-white shadow-lg rounded-lg">
            <div class="max-w-xl mx-auto">
                <h1 class="text-2xl font-bold mb-4 text-center"></h1>
                <p><strong>Last updated:</strong> {{ now()->format('F d, Y') }}</p>

                <h2 class="mt-6 text-lg font-semibold">1. Acceptance of Terms</h2>
                <p class="mt-2">By using our app, you agree to these Terms of Service. If you do not agree, please do not use the app.</p>

                <h2 class="mt-6 text-lg font-semibold">2. User Responsibilities</h2>
                <p class="mt-2">You are responsible for:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li><strong>Keeping your account information secure</strong> and notifying us of unauthorized access.</li>
                    <li><strong>Using the app appropriately</strong> and refraining from tampering with data, accessing unauthorized areas, or otherwise misusing the app.</li>
                </ul>

                <h2 class="mt-6 text-lg font-semibold">3. Account Terms</h2>
                <p class="mt-2">You must provide accurate information when creating an account. Misuse of the app may result in account termination. You are responsible for activities that occur under your account.</p>

                <h2 class="mt-6 text-lg font-semibold">4. Intellectual Property</h2>
                <p class="mt-2">The app, including its design, content, and features, is owned by us. You may not copy, distribute, or modify any part of the app without our permission.</p>

                <h2 class="mt-6 text-lg font-semibold">5. Limitation of Liability</h2>
                <p class="mt-2">We are not liable for any damages, losses, or inconveniences caused by the app. Use the app at your own risk.</p>

                <h2 class="mt-6 text-lg font-semibold">6. Termination</h2>
                <p class="mt-2">We reserve the right to terminate or suspend your access to the app for violations of these terms, misuse, or for any reason deemed necessary to ensure the security and integrity of our system.</p>

                <h2 class="mt-6 text-lg font-semibold">7. Changes to Terms</h2>
                <p class="mt-2">We may update these terms occasionally. Changes will be posted on this page with an updated date. By continuing to use the app, you agree to the revised terms.</p>
            </div>
        </div>
    </div>
</x-app-layout>
