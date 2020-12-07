    <hr>

    @if(!empty($_GET['errorMsg']))
        <div class="alert alert-danger">
            {{$_GET['errorMsg']}}
        </div>
    @endif

    @if(!empty($_GET['success']))
        <div class="alert alert-success">
            {{$_GET['success']}}
        </div>
    @endif

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form method="POST" action="/createComment">
            <select class="form-group " name="item_id"  required>
                <option value="" >Izaberi sliku koju komentarišete</option>
                @foreach($items as $item)
                    <option class="form-controll" value="{{$item['id']}}">Slika: {{$item['product_title']}}, Kompanija: {{$item['company_name']}}</option>
                @endforeach
            </select>
            <div class="form-group ">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="" required>
            </div>
            <div class="form-group ">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Your email" value="" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="text" name="text" placeholder="Enter comment" rows="3"></textarea>
            </div>
            <div>
                <input type="hidden" id="usesr_id" name="user_id" value="{{$_SESSION['user']['id']}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    @if($comments)

        <!-- Comment -->
        <div class="row">
            <div class="col-md-12 text-center"><h3>Catalog comments</h3></div>
        </div>

        @foreach($comments as $comment)
            <div style="padding-bottom: 50px" class="media">
                <a class="pull-left" href="#">
                    <img style="width: 100px; height: 75px" class=" img-thumbnail img-responsive media-object" src="{{$comment['image']}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment['product_title']}}
                        <small>{{$comment['created_at']}}</small>
                    </h4>
                    {{$comment['text']}}
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div style="padding-bottom: 50px" class="col-md-12 text-center"><h3><b>Catalog doesnt have comments!</b></h3></div>
        </div>
    @endif


