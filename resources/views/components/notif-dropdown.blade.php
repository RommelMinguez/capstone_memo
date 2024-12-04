
<div id="notif-dropdown" class="w-[100%] hidden absolute z-50 right-0 bg-gray-50 rounded-md overflow-hidden shadow-md border">
    <div class="p-4 flex items-center justify-between">
        <div class="font-bold">
            Notifications
        </div>
        <div class="text-blue-500 text-sm cursor-pointer">
            Mark All as Read
        </div>
    </div>

    <ul class="max-h-96 overflow-auto">
        @php
            $user = Auth::user();
            $header_notifs = App\Models\CustomDatabaseNotification::where('notifiable_id', $user->id)
                ->with('sender')
                ->latest()
                ->limit(10)
                ->get();
        @endphp
        @foreach($header_notifs as $notif)
            <li>
                <div class="border-b border-gray-300 p-4 flex gap-2 {{ $notif->read_at ? '':'bg-gray-100' }}">
                    <div class="w-10 h-10 rounded-full border shadow-sm overflow-hidden">
                        <img src="{{ Storage::url($notif->sender->image_src) }}" alt="profile pic" class="object-cover">
                    </div>
                    <div class="flex-1">
                        <a href="{{ $notif->data['url'] }}">
                            <div class="font-semibold">
                                {{ $notif->sender->first_name.' '.$notif->sender->last_name }}
                            </div>
                        </a>
                        <div>
                            {{ $notif->data['message'] }}
                        </div>
                        <div class="text-sm text-gray-400 mt-2">
                            {{ \Carbon\Carbon::parse($notif->created_at)->format('F j, Y \a\t g:i A') }}
                        </div>
                    </div>
                    {{-- <div class="text-blue-500 text-sm">
                        clear
                    </div> --}}
                </div>
            </li>
        @endforeach

        @if ($header_notifs->isEmpty())
            <li class="p-4">You have no notifications at the moment</li>
        @endif
    </ul>

    <div class="text-center p-2 border-t border-gray-400 font-semibold text-blue-500">
        <a href="/notification">
            View All
        </a>
    </div>
</div>


<script src="/js/notif-dropdown.js" defer></script>
