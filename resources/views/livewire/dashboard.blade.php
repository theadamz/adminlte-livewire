<div>
    <h1>Dashboard</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </button>
    </form>
</div>
