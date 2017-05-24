<div class="col m7">
    <div id="forFogging"></div>
    <div class="row-padding">
        <div class="col m12">
            <div class="card-2 round white">
                <div class="container padding">
                    <form class="form-find-friend" action="{{ route('findUsers') }}" method="get">
                        {{ csrf_field() }}
                        <label for="findUsers">Find users: </label>
                        <input id="findUsers" class="form-control find-friend" type="text" name="findUsers" placeholder="Find" title="Find" value="{{ old('findUsers') }}">
                        <input class="btn theme" type="submit" value="Find">
                        <input class="btn theme" type="reset" value="Reset">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @foreach($users as $user)
        <div class="container card-2 white round margin">
            <div class="friend">
                <img src="{{ asset('img/avatar/' . $user->avatar) }}" class="circle" alt="Avatar">
                <ul>
                    <li>{{ $user->first_name }} {{$user->last_name}}</li>
                    @if($user->birthday != '')
                        <li>Birthday: {{ $user->birthday }}</li>
                    @endif
                    @if($user->city_id != '')
                        <li>City: {{ $cities[$user->city_id] ?? '' }}</li>
                    @endif
                    @if($user->phone != '')
                        <li>Phone: {{ $user->phone }}</li>
                    @endif
                </ul>
                <form action="#">
                    <input class="btn theme" type="button" value="Send message">
                        @if (in_array($user->id, $friends))
                            <a href="{{ route('deleteFriend', ['id' => $user->id]) }}" class="btn theme">Delete friend</a>
                        @elseif (in_array($user->id, $receivers))
                            <span class="btn theme">Send request</span>
                        @elseif (in_array($user->id, $senders))
                            <a href="{{ route('acceptRequest', ['id' => $user->id]) }}" class="btn theme">Subscriber</a>
                        @else
                            <a href="{{ route('sendingRequest', ['id' => $user->id]) }}" class="btn theme">Add friend</a>
                        @endif
                </form>
            </div>
        </div>
    @endforeach
    {{ $users->render() }}
</div>