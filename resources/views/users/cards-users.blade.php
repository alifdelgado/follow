@forelse ($users as $user)
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('user.show', $user->id) }}">
                    {{ $user->name }}
                </a>
            </h5>
            Following: <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span>
            Followers: <span class="badge badge-info">{{ $user->followers()->get()->count() }}</span>
            <p class="card-text"><small class="text-muted">{{ $user->created_at->diffForHumans() }}</small></p>
            <form action="{{ route('ajax') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button type="submit" class="btn btn-primary">
                        @if (auth()->user()->isFollowing($user))
                            Unfollow
                        @else
                            Follow
                        @endif
                </button>
            </form>
        </div>
    </div>
@empty
<div class="card shadow">
    <div class="card-body">
        <h5 class="card-title">No people yet</h5>
    </div>
</div>
@endforelse
