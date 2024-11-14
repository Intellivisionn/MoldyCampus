<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-black hover:text-gray-500">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="container mx-auto max-w-3xl p-6 bg-white shadow-lg rounded-lg">
            <div class="max-w-xl mx-auto">
                <h1 class="text-2xl font-bold mb-4 text-center"></h1>
                <p class="mt-4 text-center">We're here to help and answer any questions you might have. We look forward to hearing from you!</p>

                <h2 class="mt-6 text-lg font-semibold">Contact Information</h2>
                <p class="mt-2">If you need assistance, feel free to reach out to us through the following contact methods:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li><strong>Email:</strong> <a href="mailto:{{ config('app.support_email') }}" class="text-indigo-600 hover:text-indigo-500">{{ config('app.support_email') }}</a></li>
                    <li><strong>Phone:</strong> (123) 456-7890</li>
                    <li><strong>Address:</strong> 123 Office Street, City, Country</li>
                </ul>

                <h2 class="mt-6 text-lg font-semibold">Support Hours</h2>
                <p class="mt-2">Our support team is available during the following hours:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li><strong>Monday - Friday:</strong> 9:00 AM - 5:00 PM</li>
                    <li><strong>Saturday - Sunday:</strong> Closed</li>
                </ul>

                <h2 class="mt-6 text-lg font-semibold">Frequently Asked Questions</h2>
                <p class="mt-2">For quick answers, please refer to our FAQ section available on our website.</p>

                <h2 class="mt-6 text-lg font-semibold">Stay Connected</h2>
                <p class="mt-2">Follow us on social media for updates:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li><a href="https://twitter.com" target="_blank" class="text-indigo-600 hover:text-indigo-500">Twitter</a></li>
                    <li><a href="https://facebook.com" target="_blank" class="text-indigo-600 hover:text-indigo-500">Facebook</a></li>
                    <li><a href="https://linkedin.com" target="_blank" class="text-indigo-600 hover:text-indigo-500">LinkedIn</a></li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
