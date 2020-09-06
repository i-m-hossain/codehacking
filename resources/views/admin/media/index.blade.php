@extends('layouts.admin')


@section('content')

    <h1>Media</h1>
    @if($photos)
        <form action="delete/media" method="post" class="form-inline">
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value=" ">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn btn-primary">
            </div>
            <div></div>


            <table class="table">
                <thead>
                  <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>

                  </tr>
                </thead>
                @foreach($photos as $photo)
                    <tbody>
                      <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                        <td>{{$photo->id}}</td>
                        <td><img src="{{$photo->file}}" alt="" width="50" height="50" ></td>
                        <td>{{$photo->created_at ? $photo->created_at : 'No date'}}</td>
                        <td>

                                {!!Form::model($photo,['method' => 'DELETE', 'action' => ['AdminMediasController@destroy',$photo->id]])!!}

                                    <div class="form-group">
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    </div>
                                {!! Form::close() !!}
                        </td>
                      </tr>
                 @endforeach
                 </tbody>
            </table>
        </form>
    @endif



@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#options').click(function () {
                console.log("it works");
                if(this.checked){
                    $('.checkBoxes').each(function () {
                        this.checked=true;
                    })
                }else{
                    $('.checkBoxes').each(function () {
                        this.checked=false;
                    })
                }
            })

        })

    </script>

@stop
