<x-app-layout>
    <main class="container mx-auto p-5">
        <h1 class="text-gray-50 text-3xl mt-5">Posts</h1>
        <div class="mt-10 p-5 grid gr-cols-1 md:grid-cols-2 gap-6">
            <a href="/" class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <h2 class="font-bold text-xl mb-2">title</h2>
                    <p class="text-gray-700 text-sm mb-4">body</p>
                    <div class="flex justify-between items-center text-gray-500 text-sm">
                        <span>user name</span>
                        <span>created at</span>
                    </div>
                    <h2 class="font-bold text-xl mt-5">comments</h2>
                </div>
            </a>
        </div>
    </main>
</x-app-layout>