@extends('main.master')

@section('content')
    <div class='row'>
        <div class='col-md-6'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Randomly Generated Tasks</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    @foreach($tasks as $task)
                        <h5>
                            {{ $task['name'] }}
                            <small class="label label-{{$task['color']}} pull-right">{{$task['progress']}}%</small>
                        </h5>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-{{$task['type']}}" style="width: {{$task['progress']}}%"></div>
                        </div>
                    @endforeach

                </div><!-- /.box-body -->
                <div class="box-footer">
                  <h2>New Task</h2>
                    <form action='{{url('task/store')}}' method="post" enctype="multipart/form-data" id="createTask">
                        {{ csrf_field() }}
                        <input type='text' placeholder='Task name' class='form-control input-sm' name="name" id="task-name"/>
                        <br>
                          <div class="pull-left">
                              <p class="text-left text-muted">Progress</p>
                          </div>
                          <div class="col-md-10 col-md-push-1">
                            <input type="text" name="progress" data-slider-id='taskSlider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0" id="task-slider">
                            <p id="task-value">0%</p>
                          </div>
                          <div class="clear"></div>
                          <div class="pull-left">
                              <p class="text-left text-muted">Type</p>
                          </div>
                          <div class="form-group col-md-10 col-md-push-1">
                            <label>
                              <input type="radio" name="type" class="danger" value="danger" >
                              Urgent
                            </label>
                            <div class="clear"></div>
                            <label>
                              <input type="radio" name="type" class="warning" value="warning">
                              Need Atttention
                            </label>
                            <div class="clear"></div>
                            <label>
                              <input type="radio" name="type" class="success" value="success">
                              Normal
                            </label>
                            <div class="clear"></div>
                            <label>
                              <input type="radio" name="type" class="info" value="info">
                              Low Priority
                            </label>
                          </div>
                          <div class="clear"></div>
                          <div class="pull-right">
                            <input type="submit" class="btn btn-primary btn-flat">
                          </div>
                    </form>
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div>
        <div class='col-md-6'>
          ngudud asyique
            <!-- Box -->
            {{-- <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Second Box</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    A separate section to add any kind of widget. Feel free
                    to explore all of AdminLTE widgets by visiting the demo page
                    on <a href="https://almsaeedstudio.com">Almsaeed Studio</a>.
                </div><!-- /.box-body -->
            </div><!-- /.box --> --}}
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection
