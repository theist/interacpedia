@foreach($groups as $group)
    @include('groups.show',array('group'=>$group))
    <hr/>
@endforeach
<div class="row group-create">
    @include('groups.create',['model'=>$model])
</div>

<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@lang('general/labels.add') {{ trans_choice('general/labels.users', 1 ) }}</h4>
            </div>
            <form method="POST" action="/groups/adduser" accept-charset="UTF-8" id="adduser-form">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="groupid" id="groupid" value="">
                    @include('partials.forms.select',['name'=>'userid','id'=>'userid','list'=>$users,'value'=>''])
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-default" value="@lang('general/labels.add')">
                </div>
            </form>
        </div>
    </div>
</div>
@section('footer')
    <script>
        $('#addUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) ;
            var groupid = button.data('groupid');
            var modal = $(this);
            modal.find('.modal-title').text('@lang('general/labels.add') {{ trans_choice('general/labels.users', 1 ) }}: Grupo ' + groupid);
            modal.find('#groupid').val(groupid);
        })
        $('#adduser-form').on('submit', function (e) {
            e.preventDefault();
            $.post(
                    $(this).prop('action'),
                    {
                        "_token": $(this).find('input[name=_token]').val(),
                        "groupid": $('#groupid').val(),
                        "userid": $('#userid').val()
                    },
                    function (data) {
                        if (data.fail) {
                            ;
                        } else {
                            $('#addUser').modal('hide');
                            document.location.reload();
                        }
                    }
            );
            return false;
        });
    </script>
@stop