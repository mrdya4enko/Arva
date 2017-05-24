<div class="col m7">
    <div id="forFogging"></div>
    <div class="row-padding">
        <div class="col m12">
            <div class="card-2 round white">
                <div id="addAlbumBlock">
                    <a id="cancelAlbumBlock" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <label for="albumName">New album name: </label>
                        <input type="text" id="albumName" name="newAlbumName" placeholder="New name" title="New name">
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </form>
                </div>
                <div id="addPhotoBlock">
                    <a id="cancelAddPhotoBlock" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="file" name='uploadPhoto[]' multiple>
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </form>
                </div>
                <div class="container padding">
                    <a href="#" id="addAlbum" class="btn theme"><i class="fa fa-pencil"></i>   Edit album</a>
                    <a href="#" id="addPhotos" class="btn theme"><i class="fa fa-pencil"></i>   Add new photos</a>
                    <a href="/albums/" class="linkAllAlbums btn theme">All albums</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container card-2 white round margin">
        <p><h3>123</h3></p>
        <div class="photo">
            <img src="{{ asset('img/nature.jpg') }}" class="photoInAlbum margin-bottom">
            <a href="#"><i class="fa fa-trash deleteIcon" aria-hidden="true"></i></a>
        </div>
        <div class="photo">
            <img src="{{ asset('img/nature.jpg') }}" class="photoInAlbum margin-bottom">
            <a href="#"><i class="fa fa-trash deleteIcon" aria-hidden="true"></i></a>
        </div>
        <div class="photo">
            <img src="{{ asset('img/nature.jpg') }}" class="photoInAlbum margin-bottom">
            <a href="#"><i class="fa fa-trash deleteIcon" aria-hidden="true"></i></a>
        </div>
        <div class="photo">
            <img src="{{ asset('img/nature.jpg') }}" class="photoInAlbum margin-bottom">
            <a href="#"><i class="fa fa-trash deleteIcon" aria-hidden="true"></i></a>
        </div>
        <div class="photo">
            <img src="{{ asset('img/nature.jpg') }}" class="photoInAlbum margin-bottom">
            <a href="#"><i class="fa fa-trash deleteIcon" aria-hidden="true"></i></a>
        </div>
    </div>
</div>