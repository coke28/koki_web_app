<x-base-layout>

    {{ theme()->getView('pages/account/_navbar', array('class' => 'mb-5 mb-xl-10', 'info' => $info)) }}

    {{ theme()->getView('pages/account/settings/_profile-details', array('class' => 'mb-5 mb-xl-10', 'info' => $info)) }}

    {{ theme()->getView('pages/account/settings/_resetPassword', array('class' => 'mb-5 mb-xl-10', 'info' => $info)) }}

    {{-- {{ theme()->getView('pages/account/settings/_signin-method', array('class' => 'mb-5 mb-xl-10', 'info' => $info)) }} --}}
    
    <!--start::Include your scripts here-->
    @section('scripts')
    <script type="text/javascript" src="{{ "/".'custom/userSettings/userSettings.js?v='. rvndev()->getRandom(30) }}"></script>
    @endsection
</x-base-layout>
