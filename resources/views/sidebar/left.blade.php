<div class="col m3">
    <!-- Profile -->
    <div class="card-2 round white">
        <div class="container">
            <h4 class="center">{{ $info['all']->first_name . ' ' . $info['all']->last_name }}</h4>
            <p class="center"><img src="http://arva.local/img/avatar/{{  $info['all']->avatar }}" class="circle" style="height:106px;width:106px" alt="Avatar"></p>
            <hr>
            <p><i class="fa fa-pencil fa-fw margin-right text-theme"></i>{{ $info['all']->phone }}</p>
            <p><i class="fa fa-home fa-fw margin-right text-theme"></i>{{ $info['city']->name . ', ' . $info['country']->name}}</p>
            <p><i class="fa fa-birthday-cake fa-fw margin-right text-theme"></i>{{ $info['all']->birthday }}</p>
        </div>
    </div>
    <br>

    <!-- Accordion -->
    <div class="card-2 round">
        <div class="white">
            <a href="#">
                <button class="button block theme-l1 left-align"><i class="fa fa-circle-o-notch fa-fw margin-right"></i> My Groups</button>
            </a>
            <a href="#">
                <button class="button block theme-l1 left-align"><i class="fa fa-calendar-check-o fa-fw margin-right"></i> My Events</button>
            </a>
            <a href="/albums">
                <button class="button block theme-l1 left-align"><i class="fa fa-users fa-fw margin-right"></i> My Photos</button>
            </a>
        </div>
    </div>
    <br>

    <!-- Interests -->
    <div class="card-2 round white hide-small">
        <div class="container">
            <p>Interests</p>
            <p>
                <span class="tag small theme-d5">News</span>
                <span class="tag small theme-d4">W3Schools</span>
                <span class="tag small theme-d3">Labels</span>
                <span class="tag small theme-d2">Games</span>
                <span class="tag small theme-d1">Friends</span>
                <span class="tag small theme">Games</span>
                <span class="tag small theme-l1">Friends</span>
                <span class="tag small theme-l2">Food</span>
                <span class="tag small theme-l3">Design</span>
                <span class="tag small theme-l4">Art</span>
                <span class="tag small theme-l5">Photos</span>
            </p>
        </div>
    </div>
    <br>

    <!-- Alert Box -->
    <div class="container display-container round theme-l4 border theme-border margin-bottom hide-small">
        <span onclick="this.parentElement.style.display='none'" class="button theme-l3 display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
    </div>
</div>