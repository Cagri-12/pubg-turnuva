<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/player-dashboard.css') }}">
    @endpush

    <div class="player-dashboard">

        {{-- Hero --}}
        @include('player.partials.hero')

        {{-- Stats --}}
        @include('player.partials.stats')

        <div class="dashboard-content">

            <div class="dashboard-left">

                @include('player.partials.tournament')

                @include('player.partials.room')

                @include('player.partials.quick-actions')

            </div>

            <div class="dashboard-right">

                @include('player.partials.announcements')

                @include('player.partials.results')

                @include('player.partials.notifications')

                @include('player.partials.contact')

            </div>

        </div>

    </div>

    @push('scripts')
        <script src="{{ asset('js/player-dashboard.js') }}"></script>
    @endpush

</x-app-layout>