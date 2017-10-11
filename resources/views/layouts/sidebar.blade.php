<!-- Blog Search Well -->
<div class="well">
    <h4>Search</h4>
    <div class="input-group">
        <input type="text" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4 style="display: inline" >Blog Categories</h4>
    <a href="/category/create"> <i style="font-size:x-small"> New</i> </a>

    <div class="row">

        @foreach( $categories as $row )
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach($row as $category)
                        <li><a href="{{ route('category.index' , ['category' => $category->name]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Tools</h4>
    <p>You can put you tools here!</p>
</div>