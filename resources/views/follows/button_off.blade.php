{!! Form::model( $follow = new \App\Interacpedia\Follow, ['url' => 'follows','id'=>'follows-form'] ) !!}
<input type="hidden" name="model_id" id="model_id" value="{{ $model->id }}"/>
<input type="hidden" name="model_type" id="model_type" value="{{ get_class($model) }}"/>
<a class="btn btn-fixed-purple submit"><i class="fa fa-share"></i> @lang('general/labels.follow')</a>
{!! Form::close() !!}

