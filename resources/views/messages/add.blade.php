<?php if ( !isset( $label ) )$label = Lang::get( 'general/labels.new' ) . ' ' . trans_choice( 'general/labels.messages', 1 ) ?>
<?php if(!isset($from))$from = Auth::user()->id ?>
<button class="btn btn-purple" data-toggle="modal" data-target="#addMessage">
    {{ $label }}
</button>

<div class="modal fade" id="addMessage" tabindex="-1" role="dialog" aria-labelledby="addMessageLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="myModalLabel">@lang('general/labels.new') {{ trans_choice('general/labels.messages', 1 ) }}</h4>
            </div>
            {!! Form::model( $message = new \App\Interacpedia\Message, ['url' => 'messages','id'=>'addmessage-form'] ) !!}
            <input type="hidden" name="from_user" id="from_user" value="{{ $from }}">

            <div class="modal-body">
                @if(isset($to) && $to >0)
                    <input type="hidden" name="to_user" id="to_user" value="{{ $to }}">
                @else
                    @include('partials.forms.select',['name'=>'to_user','id'=>'to_user','list'=>$users,'value'=>''])
                @endif

                {!! Form::input('text','title',null,['id' => 'title', 'maxlength' => 100,'placeholder'=>'Asunto del mensaje','class' =>'form-control input-sm maxlength']) !!}
                <br/>
                {!! Form::textarea('content',null,['id' => 'content', 'maxlength' => 400, 'placeholder'=>'Ecriba su mensaje','class' => 'form-control maxlength','rows'=>'4']) !!}
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
        $('#addmessage-form').on('submit', function (e) {
            e.preventDefault();
            $.post(
                    $(this).prop('action'),
                    {
                        "_token": $(this).find('input[name=_token]').val(),
                        "from_user": $('#from_user').val(),
                        "to_user": $('#to_user').val(),
                        "title": $('#title').val(),
                        "content": $('#content').val()
                    },
                    function (data) {
                        if (data.fail) {
                            ;
                        } else {
                            $('#addMessage').modal('hide');
                            $('#from_user').val('');
                            $('#to_user').val('');
                            $('#title').val('');
                            $('#content').val('');
                            document.location.reload();
                        }
                    }
            );
            return false;
        });
    </script>
@stop