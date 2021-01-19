<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                @if(empty($rows[0]->row))


                    <form action="{{route('layout.post')}}" class="form-edit-add" method="post">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group col-md-6 ">
                                <label class="control-label" for="name">Horizontal</label>
                                <input type="number" class="form-control" name="x">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="control-label" for="name">Vertical</label>
                                <input type="number" class="form-control" name="y">
                            </div>

                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary save">Save</button>
                            </div>
                        </div>
                    </form>

                @else
                    <form action="" class="form-edit-add" >
                        <div class="panel-body">
                            <div class="form-group col-md-6 ">
                                <label class="control-label" for="name">Horizontal</label>
                                <input type="number" class="form-control" name="x" value="{{count($cols)}}" disabled>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="control-label" for="name">Vertical</label>
                                <input type="number" class="form-control" name="y" value="{{count($rows)}}" disabled>
                            </div>

                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>