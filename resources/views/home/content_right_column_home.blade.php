<div class="col m2">
    <div class="card-2 round white center">
        <div class="container">
            <p>Upcoming Events:</p>
            <img src="{{ asset('img/forest.jpg') }}" alt="Forest" style="width:100%;">
            <p><strong>Holiday</strong></p>
            <p>Friday 15:00</p>
            <p><button class="button block theme-l4">Info</button></p>
        </div>
    </div>
    <br>

    @if(!empty($dataUser))

        <div class="card-2 round white center">
            <div class="container">
                <p>Friend Request</p>
                <img src="http://arva.local/img/avatar/{{ $dataUser[0]['avatar'] }}" alt="Avatar" style="width:50%"><br>
                <span>{{ $dataUser[0]['first_name'] . ' ' . $dataUser[0]['last_name'] }}</span>
                <div class="row opacity">
                    <div class="half">
                        <a class="button block green section" href="{{ route('acceptRequest', ['id' => $dataUser[0]['id']]) }}"><i class="fa fa-check"></i></a>
                        <!--<button class="button block green section" title="Accept"><i class="fa fa-check"></i></button>-->
                    </div>
                    <div class="half">
                        <a class="button block red section" href="{{ route('declineRequest', ['id' => $dataUser[0]['id']]) }}"><i class="fa fa-remove"></i></a>
                        <!--<button class="button block red section" title="Decline"><i class="fa fa-remove"></i></button>-->
                    </div>
                </div>
            </div>
        </div>
    <br>
    @endif
    <!--<div class="card-2 round white padding-16 center">
        <p>ADS</p>
    </div>
    <br>

    <div class="card-2 round white padding-32 center">
        <p><i class="fa fa-bug xxlarge"></i></p>
    </div>-->
</div>