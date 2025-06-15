<form method="POST" action="{{ route('logout') }}">
    @csrf
    {{ $slot }}
</form>
