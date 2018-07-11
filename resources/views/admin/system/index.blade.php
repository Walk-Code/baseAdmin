@extends("admin.dashboard")
@section("content")
    <style type="text/css">
        .list-table-sort-td input {
            width: 50px;
            text-align: center;
            font-size: 12px;
            line-height: 14px;
            padding: 2px;
            border: 1px solid #e6e6e6;
        }

        .sort-btn {
            width: 50px;
            border-radius: 0 !important;
        }
    </style>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">标题</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="折叠">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="移除">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form onsubmit="return false;" data-auto="true" method="post">
                <input type="hidden" value="resort" name="action"/>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class='list-table-check-td'>
                            <input id='11' indeterminate="true" type='checkbox'/>
                        </th>
                        <th class='list-table-sort-td'>
                            <button type="submit" class="sort-btn btn btn-block btn-primary btn-xs">排 序</button>
                        </th>
                        <th class='text-center'></th>
                        <th>菜单名称</th>
                        <th class='visible-lg'>菜单链接</th>
                        <th class='text-center'>状态</th>
                        <th class='text-center'>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $key=>$vo)
                        <tr>
                            <td class='list-table-check-td'>
                                <input class="list-check-box" value='' type='checkbox'/>
                            </td>
                            <td class='list-table-sort-td'>
                                <input name="" value="" class="list-sort-input"/>
                            </td>
                            <td class='text-center'>
                                <i style="font-size:18px;" class=""></i>
                            </td>
                            <td>{!! $vo['sul'] !!}{{$vo['name']}}</td>
                            <td class='visible-lg'>https://3vshej.cn/AdminLTE/AdminLTE-2.3.11/pages/tables/simple.html
                            </td>
                            <td class='text-center'>
                                {{--{if $vo.status eq 0}--}}
                                <span class="label label-danger">禁用</span>
                                {{--{elseif $vo.status eq 1}--}}
                                {{--<span style="color:#090">使用中</span>--}}
                                {{--{/if}--}}
                            </td>
                            <td class='text-center nowrap'>
                                {{--{if auth("$classuri/edit")}--}}
                                {{--<span class="text-explode">|</span>--}}
                                <a data-modal='' href="javascript:void(0)">编辑</a>
                                {{--{/if}--}}
                                {{--{if $vo.status eq 1 and auth("$classuri/forbid")}--}}
                                <span class="text-explode">|</span>
                                {{--<a data-update="" data-field='status' data-value='0'
                                   data-action='' href="javascript:void(0)">禁用</a>--}}
                                {{--{elseif auth("$classuri/resume")}--}}
                                {{--<span class="text-explode">|</span>--}}
                                <a data-update="" data-field='status' data-value='1'
                                   data-action='' href="javascript:void(0)">启用</a>
                                {{--{/if}--}}
                                {{--{if auth("$classuri/del")}--}}
                                <span class="text-explode">|</span>
                                <a data-update="" data-field='delete' data-action=''
                                   href="javascript:void(0)">删除</a>
                                {{--{/if}--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
    </div>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#11').iCheck({
                labelHover: false,
                cursor: true,
                handle: 'checkbox',
                checkboxClass: 'checkbox_flat'
            });
        });
    </script>
@endsection