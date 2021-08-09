<?php
    ?>
{{--Thua ke tu app.blade template--}}
@extends('layouts.app')

{{--Noi dung trang con--}}
{{--Dung app.css--}}
@section('content')
    {{--Dinh nghia phan noi dung cua trang table--}}
    <div class="panel-body">
        {{--hien thi thong bao loi--}}
        @include('errors.503')

        {{--form nhap table moi--}}
        <form action="{{url('table')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            {{--Ten table--}}
            <div class="form-group">
                <label for="table" class="col-sm-3 control-label">Table</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="table-name" class="form-control">
                </div>
            </div>

            {{--Nut Table--}}
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Add Table
                    </button>
                </div>
            </div>
        </form>
        {{--Hien thi table hien tai co trong database--}}
        @if(count($table) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Table
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        {{--Tao tieu de cua cac cot--}}
                        <thead>
                        <td>Table</td>
                        <td>&nbsp</td>
                        </thead>
                        {{--Tao cac dong de hien thi noi dung--}}
                        <tbody>
                            @foreach($table as $table)
                                <tr>
                                    {{--Hien thi ten table--}}
                                    <td class="table-text">
                                        <div>{{$table->name}}</div>
                                    </td>
                                    {{--Them nut xoa--}}
                                    <td>
                                        <form action="/table/{{$table->id}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button>Delete Task</button>
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
