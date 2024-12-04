<x-layout>
    <x-header></x-header>

    <!-- Main Content -->
    <div class="bg-[#F3D2C1] pt-20">

        <div class="min-h-96 p-5 md:px-20 md:py-10">
            <div class="bg-gray-50 rounded-md overflow-hidden shadow-md border">
                {{-- header --}}
                <div class="p-10 flex items-center justify-between">
                    <div class="font-bold text-2xl">
                        Notifications
                    </div>
                    <form action="" method="POST" class="text-blue-500 text-lg cursor-pointer">
                        @csrf
                        @method('PATCH')
                        <button>
                            Mark All as Read
                        </button>
                    </form>
                </div>

                {{-- notification list --}}
                <ul class="overflow-auto">
                    @foreach($notifications as $notif)
                        <li>
                            <div class="border-b border-gray-300 p-10 flex gap-2 {{ $notif->read_at ? '':'bg-gray-100' }}">
                                <div class="w-10 h-10 rounded-full border shadow-sm overflow-hidden">
                                    <img src="{{ Storage::url($notif->sender->image_src) }}" alt="profile pic" class="object-cover">
                                </div>
                                <div class="flex-1">
                                    <div class="font-semibold">
                                        {{ $notif->sender->first_name.' '.$notif->sender->last_name }}
                                    </div>
                                    <div>
                                        {{ $notif->data['message'] }}
                                    </div>
                                    <div class="text-sm text-gray-400">
                                        <br>
                                        {{ \Carbon\Carbon::parse($notif->created_at)->format('F j, Y \a\t g:i A') }}
                                    </div>
                                </div>
                                {{-- <div class="text-blue-500 text-sm">
                                    clear
                                </div> --}}
                            </div>
                        </li>
                    @endforeach

                    @if ($notifications->isEmpty())
                        <li class="text-center italic pb-10">You have no notifications at the moment</li>
                    @endif
                </ul>

            </div>
            {{-- pagination --}}
            <div class="my-20 px-20">{{ $notifications->links() }}</div>
        </div>

    </div>

    <x-footer></x-footer>
</x-layout>
