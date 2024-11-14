<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-black hover:text-gray-500">
            {{ __('Privacy Policy') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="container mx-auto max-w-3xl p-6 bg-white shadow-lg rounded-lg">
            <div class="max-w-xl mx-auto">
                <h1 class="text-2xl font-bold mb-4 text-center"></h1>
                <p><strong>Last updated:</strong> {{ now()->format('F d, Y') }}</p>

                <h2 class="mt-6 text-lg font-semibold">1. Introduction</h2>
                <p class="mt-2">We respect your privacy and are committed to protecting it. This Privacy Policy explains how we collect, use, and share your information in connection with our app, which is built to enhance desk usage supervision and promote health and productivity in office environments. By using our app, you agree to this Privacy Policy.</p>

                <h2 class="mt-6 text-lg font-semibold">2. Data Collection</h2>
                <p class="mt-2">We collect information to provide and improve our services. This includes:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li><strong>Personal Information:</strong> Information such as your name and email address for authentication purposes.</li>
                    <li><strong>Usage Data:</strong> Data related to your interaction with desks, such as the time spent at each desk, table height settings, and preferred usage habits, to deliver insights on health and productivity.</li>
                </ul>

                <h2 class="mt-6 text-lg font-semibold">3. How We Use Your Data</h2>
                <p class="mt-2">Data collected is used in the following ways:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li><strong>To personalize user experience</strong> by recommending settings and notifying you about health limits.</li>
                    <li><strong>To analyze desk usage</strong> and generate insights on time spent sitting versus standing and other metrics.</li>
                    <li><strong>For troubleshooting and support,</strong> to help diagnose and resolve issues in the app.</li>
                </ul>

                <h2 class="mt-6 text-lg font-semibold">4. Data Sharing</h2>
                <p class="mt-2">Your data is stored securely using third-party providers like Supabase. We do not share your data with any other third parties unless legally required.</p>

                <h2 class="mt-6 text-lg font-semibold">5. User Rights</h2>
                <p class="mt-2">You have the right to access, update, or request deletion of your data. If you need assistance with your data, please contact us at <a href="mailto:{{ config('app.support_email') }}" class="text-indigo-600 hover:text-indigo-500">{{ config('app.support_email') }}</a>.</p>

                <h2 class="mt-6 text-lg font-semibold">6. Security Measures</h2>
                <p class="mt-2">We implement measures such as encryption and access restrictions to secure your data. However, no method of transmission over the internet is completely secure, and we cannot guarantee absolute security.</p>

                <h2 class="mt-6 text-lg font-semibold">7. Policy Changes</h2>
                <p class="mt-2">We may update this Privacy Policy occasionally. Changes will be posted on this page with an updated date. By continuing to use the app, you agree to the revised policy.</p>

                <p class="mt-4">If you have any questions, please contact us at <a href="mailto:{{ config('app.support_email') }}" class="text-indigo-600 hover:text-indigo-500">{{ config('app.support_email') }}</a>.</p>
            </div>
        </div>
    </div>
</x-app-layout>
