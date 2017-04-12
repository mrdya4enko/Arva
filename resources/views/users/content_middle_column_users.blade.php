<div class="col m7">
    <div id="forFogging"></div>
    <div class="row-padding">
        <div class="col m12">
            <div class="card-2 round white">
                <div class="container padding">
                    <form class="form-find-friend" action="{{ route('findUsers') }}" method="post">
                        {{ csrf_field() }}
                        <label for="findUsers">Find users: </label>
                        <input id="findUsers" class="form-control find-friend" type="text" name="findUsers" placeholder="Find" title="Find">
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
                    <li>Birthday {{ $user->birthday }}</li>
                    <li>{{ $user->city_id }}</li>
                </ul>
                <form action="#">
                    <input class="btn theme" type="button" value="Send mesage">
                    <input class="btn theme" type="button" value="Delete">
                </form>
            </div>
        </div>
    @endforeach
</div>