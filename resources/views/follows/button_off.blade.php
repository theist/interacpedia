{!! Form::model( $follow = new \App\Interacpedia\Follow, ['url' => 'follows','id'=>'follows-form'.$formid_suffix] ) !!}
<input type="hidden" name="model_id{{ $formid_suffix }}" id="model_id{{ $formid_suffix }}" value="{{ $model->id }}"/>
<input type="hidden" name="model_type{{ $formid_suffix }}" id="model_type{{ $formid_suffix }}" value="{{ get_class($model) }}"/>
<a class="btn btn-fixed-purple submit"><i class="fa fa-share"></i> @lang('general/labels.follow')</a>
{!! Form::close() !!}

