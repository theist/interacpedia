<?php if ( !isset( $label ) )$label = Lang::get( 'general/labels.new' ) . ' ' . trans_choice( 'general/labels.messages', 1 ) ?>
<?php if(!isset($from))$from = Auth::user()->id ?>
<?php if(!isset($suffix))$suffix = "";?>
<?php if(!isset($parent))$parent = null;?>
<button class="btn btn-purple" data-toggle="modal" data-target="#addMessage{{ $suffix }}">
    {{ $label }}
</button>

<div class="modal fade" id="addMessage{{ $suffix }}" tabindex="-1" role="dialog" aria-labelledby="addMessageLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="myModalLabel{{ $suffix }}">@lang('general/labels.new') {{ trans_choice('general/labels.messages', 1 ) }}</h4>
            </div>
            {!! Form::model( $message = new \App\Interacpedia\Message, ['url' => 'messages','id'=>'addmessage-form'.$suffix] ) !!}
            <input type="hidden" name="from_user{{ $suffix }}" id="from_user{{ $suffix }}" value="{{ $from }}">

            <div class="modal-body">
                <input type="hidden" name="parent{{ $suffix }}" id="parent{{ $suffix }}" value="{{ $parent }}">
                @if(isset($to) && $to >0)
                    <div class="row">
                        <div class="col-md-12">Para: {{ \App\Interacpedia\User::findOrNew($to)->name }}<br /><br /></div>
                    </div>
                    <input type="hidden" name="to_user{{ $suffix }}" id="to_user{{ $suffix }}" value="{{ $to }}">
                @else
                    @include('partials.forms.select',['name'=>'to_user'.$suffix,'id'=>'to_user'.$suffix,'list'=>$users,'value'=>''])
                @endif
                @if(isset($parent) && $parent >0)
                    {!! Form::input('text','title','Re: '. \App\Interacpedia\Message::findOrNew($parent)->title,['id' => 'title'.$suffix, 'maxlength' => 100,'placeholder'=>'Asunto del mensaje','class' =>'form-control input-sm maxlength']) !!}
                @else
                    {!! Form::input('text','title',null,['id' => 'title'.$suffix, 'maxlength' => 100,'placeholder'=>'Asunto del mensaje','class' =>'form-control input-sm maxlength']) !!}
                @endif

                <br/>
                {!! Form::textarea('content',null,['id' => 'content'.$suffix, 'maxlength' => 600, 'placeholder'=>'Escriba su mensaje','class' => 'form-control maxlength','rows'=>'15']) !!}
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-default" value="@lang('general/labels.send')">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@section('footer')
    @parent
    <script>
        $('.maxlength').maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            appendToParent: true,
            placement: "bottom-right"
        });
        $('.select2').select2({
            placeholder: "Escoja una opción",
            allowClear: true,
            language: "es"
        });
        $('#addmessage-form{{ $suffix }}').on('submit', function (e) {
            e.preventDefault();
            $.post(
                    $(this).prop('action'),
                    {
                        "_token": $(this).find('input[name=_token]').val(),
                        "from_user": $('#from_user{{ $suffix }}').val(),
                        "to_user": $('#to_user{{ $suffix }}').val(),
                        "title": $('#title{{ $suffix }}').val(),
                        "content": $('#content{{ $suffix }}').val(),
                        "message_id": $('#parent{{ $suffix }}').val()
                    },
                    function (data) {
                        if (data.fail) {
                            ;
                        } else {
                            $('#addMessage{{ $suffix }}').modal('hide');
                            $('#title{{ $suffix }}').val('');
                            $('#content{{ $suffix }}').val('');
                            document.location.reload();
                        }
                    }
            );
            return false;
        });
    </script>
@stop