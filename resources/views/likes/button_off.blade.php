{!! Form::model( $like = new \App\Interacpedia\Like, ['url' => 'likes','id'=>'likes-form'.$formid_suffix] ) !!}
<input type="hidden" name="model_id{{ $formid_suffix }}" id="model_id{{ $formid_suffix }}" value="{{ $model->id }}"/>
<input type="hidden" name="model_type{{ $formid_suffix }}" id="model_type{{ $formid_suffix }}" value="{{ get_class($model) }}"/>
<a class="btn btn-fixed-blue submit"><i class="fa fa-thumbs-o-up"></i> @lang('general/labels.like')</a>
{!! Form::close() !!}

